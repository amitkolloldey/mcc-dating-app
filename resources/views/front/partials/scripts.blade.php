<script>
    function likeSomeone(liked_user_id) {
        let data = new FormData();
        data.append('liked_user_id', liked_user_id);
        let url = "{{route('like_someone')}}"
        axios.post(url, data)
            .then(function (response) {
                if (response.data.success) {

                    let liked = document.getElementById('like')
                    liked.innerHTML = '<i class="fa fa-thumbs-up "></i>  Liked'
                }
                else{
                    let liked = document.getElementById('like')
                    liked.innerHTML = '<i class="fa fa-thumbs-o-up "></i>  Like'
                }
            })
            .catch(function (error) {
                console.log(error)
            });
    }

    function dislikeSomeone(disliked_user_id) {
        let data = new FormData();
        data.append('disliked_user_id', disliked_user_id);
        let url = "{{route('dislike_someone')}}"
        axios.post(url, data)
            .then(function (response) {
                if (response.data.success) {
                    let disliked = document.getElementById('dislike')
                    disliked.innerHTML = '<i class="fa fa-thumbs-down "></i>  Disliked'
                }else{
                    let disliked = document.getElementById('dislike')
                    disliked.innerHTML = '<i class="fa fa-thumbs-o-down "></i>  Dislike'
                }
            })
            .catch(function (error) {
                console.log(error)
            });
    }
</script>
