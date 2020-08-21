<?php

namespace App\Http\Controllers;

use App\Models\Interest;
use App\Models\User;
use App\Models\UserDislike;
use App\Models\UserLike;
use App\Models\UserSetting;
use App\Notifications\NewMatchFound;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

class MyAccountController extends Controller
{
    /**
     * @param $username
     * @return Application|Factory|View
     */
    public function profile($username)
    {
        list($my_likes, $my_dislikes) = $this->myLikesDislikes();

        // ROUTE MODEL BINDING WAS NOT WORKING HERE
        $user = User::where('username', $username)->first();
        if (!$user) {
            abort('404');
        }

        $show_publicly = 0;

        if (isset($user->setting) && count($user->setting)) {
            $show_publicly = $user->setting()->first()->show_publicly;
        }

        if (!Auth::check() && ($show_publicly !== 1)) {
            abort('404');
        }

        return view('front.pages.profile', compact('user', 'my_dislikes', 'my_likes'));
    }

    /**
     * @return array
     */
    private function myLikesDislikes(): array
    {
        $my_likes = UserLike::where('user_id', auth()->id())
            ->pluck('liked_user_id')
            ->toArray();


        $my_dislikes = UserDislike::where('user_id', auth()->id())
            ->pluck('disliked_user_id')
            ->toArray();

        return array($my_likes, $my_dislikes);
    }

    /**
     * @return Application|Factory|View
     */
    public function matches()
    {
        $matches = auth()->user()->mutualLikes()
            ->get();
        return view('front.pages.my-matches', compact('matches'));
    }

    /**
     * @return Application|Factory|View
     */
    public function settings()
    {
        $user = auth()
            ->user();

        $interests = Interest::get()
            ->pluck('name', 'id');

        $user_interests = $user
            ->interests()
            ->pluck('interests.id')
            ->toArray();

        $user_settings = UserSetting::where('user_id', $user->id)
            ->first();

        return view('front.pages.my-settings', compact('interests', 'user_interests', 'user_settings', 'user'));
    }

    /**
     * @param Request $request
     * @return Application|ResponseFactory|JsonResponse|Response
     */
    public function changeImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'profile_image' => 'required|image|max:1000'
        ]);
        if ($validator->fails()) {
            return response([
                'validation' => $validator->errors()
            ]);
        }
        if ($request->has('profile_image')) {
            auth()->user()->update([
                'image' => $request->profile_image->store('uploads', 'public')
            ]);
            $image = Image::make(public_path('storage/' . auth()->user()->image))->crop(300, 300);
            $image->save();
        }
        return response(['success' => "Uploaded Successfully!", 'image' => auth()->user()->image]);
    }

    /**
     * @param Request $request
     * @return Application|ResponseFactory|RedirectResponse|Response
     */
    public function changeSettings(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'phone' => 'numeric',
        ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        $settings = [
            'show_age' => $request->show_age,
            'show_bio' => $request->show_bio,
            'show_publicly' => $request->show_publicly,
            'interested_in' => $request->interested_in,
        ];
        DB::beginTransaction();
        try {
            auth()->user()->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'bio' => $request->bio,
                'date_of_birth' => $request->date_of_birth,
                'city' => $request->city,
                'country' => $request->country,
            ]);

            if (count(auth()->user()->setting)) {
                auth()->user()->setting()->update($settings);
            } else {
                auth()->user()->setting()->create($settings);
            }
            if ($request->has('interests')) {
                auth()->user()->interests()->sync($request->interests);
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
        return redirect()
            ->back()
            ->with('success', 'Settings Updated!');
    }

    /**
     * @return Application|Factory|View
     */
    public function findMatches()
    {
        list($my_likes, $my_dislikes) = $this->myLikesDislikes();

        $lat = auth()->user()->lat;
        $lng = auth()->user()->lng;
        $radius = 5;
        $interested_in = count(auth()->user()->setting) ? auth()->user()->setting()->first()->interested_in : null;
        $matches = User::findWithinRadius($lat, $lng, $radius)
            ->when(isset($interested_in),
                function ($q) use ($interested_in) {
                    return $q->where('gender', $interested_in);
                }
            )
            ->orderBy("distance", 'asc')
            ->inRandomOrder()
            ->simplePaginate(1);
        return view('front.pages.find-matches', compact('matches', 'my_likes', 'my_dislikes'));
    }

    /**
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function likeSomeone(Request $request)
    {
        $liked_user_id = $request->liked_user_id;

        if ($liked_user_id == auth()->id()) {
            abort('404');
        }

        $liked_by_the_person = UserLike::where([
            'user_id' => $liked_user_id,
            'liked_user_id' => auth()->id()
        ])
            ->first();

        $already_liked = UserLike::where([
            'user_id' => auth()->id(),
            'liked_user_id' => $liked_user_id
        ])
            ->first();

        if (!$already_liked) {
            UserLike::create([
                'user_id' => auth()->id(),
                'liked_user_id' => $liked_user_id,
                'is_mutual' => $liked_by_the_person ? 1 : 0
            ]);
            if ($liked_by_the_person) {
                $person1 = User::find($liked_user_id);
                $person2 = Auth::user();
                $liked_by_the_person->is_mutual = 1;
                $liked_by_the_person->save();
                Notification::send([$person1, $person2], new NewMatchFound($person1));
            }
            return response(['success' => "Success"]);
        }

        if ($liked_by_the_person) {
            $liked_by_the_person->is_mutual = 0;
            $liked_by_the_person->save();
        }
        $already_liked->delete();

        return response(['deleted' => "Deleted"]);
    }

    /**
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function dislikeSomeone(Request $request)
    {
        $disliked_user_id = $request->disliked_user_id;

        if ($disliked_user_id == auth()->id()) {
            abort('404');
        }

        $already_disliked = UserDislike::where([
            'user_id' => auth()->id(),
            'disliked_user_id' => $disliked_user_id
        ])
            ->first();

        if (!$already_disliked) {
            UserDislike::create([
                'user_id' => auth()->id(),
                'disliked_user_id' => $disliked_user_id,
            ]);
            return response(['success' => "Success"]);
        }

        $already_disliked->delete();

        return response(['deleted' => "Deleted"]);
    }
}
