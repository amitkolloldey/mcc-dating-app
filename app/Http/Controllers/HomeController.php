<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('front.pages.home');
    }

    public function markAsRead(Request $request)
    {
        auth()
            ->user()
            ->unreadNotifications
            ->where('id', $request->notification_id)
            ->markAsRead();
        return response(['success' => "Success"]);
    }
}
