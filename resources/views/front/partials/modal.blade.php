@auth
    @if (auth()->check() && count(auth()->user()->unreadNotifications))
    @php
        $notify = auth()->user()->unreadNotifications()->first();
    @endphp
        <div class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" id="match_modal">
            <div class="modal_wrapper">
                <div class="modal-body text-center">
                    <h2>{{isset($notify->data['message']) ? $notify->data['message'] : ''}}</h2>
                    <div class="row modal_image_wrap">
                        <div class="col-md-6 text-center modal_left">
                            <img class="img-thumbnail"
                                 src="{{isset($notify->data['person1']['image']) ? asset('storage').'/'.$notify->data['person1']['image'] : asset('img/default.jpg')}}"
                                 alt="{{$notify->data['person1']['name']}}">
                            <p>{{$notify->data['person1']['name']}}</p>
                            <p>From {{$notify->data['person1']['city']}}, {{$notify->data['person1']['country']}}</p>
                        </div>
                        <div class="col-md-6 text-center modal_left">
                            <img class="img-thumbnail"
                                 src="{{isset($notify->data['person2']['image']) ? asset('storage').'/'.$notify->data['person2']['image'] : asset('img/default.jpg')}}"
                                 alt="{{$notify->data['person2']['name']}}">
                            <p>{{$notify->data['person2']['name']}}</p>
                            <p>From {{$notify->data['person2']['city']}}, {{$notify->data['person2']['country']}}</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-primary" onclick="markAsRead('{{$notify->id}}')">Ok</a>
                </div>
            </div>
        </div>
    <script>
        function markAsRead(notification_id) {
            let data = new FormData();
            data.append('notification_id', notification_id);
            let url = "{{route('mark_as_read')}}"
            axios.post(url, data)
                .then(function (response) {
                    if (response.data.success) {
                        window.location.reload()
                    }
                })
                .catch(function (error) {
                    console.log(error)
                });
        }
    </script>
        <script type="text/javascript">
            $('#match_modal').modal({
                show: true
            })
        </script>
    @endif
@endauth
