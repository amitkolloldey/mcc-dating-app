<script>
    let geolocationSuccess = function (position) {
        let lat_long = document.getElementById('lat_long')
        lat_long.innerHTML += "<input type='hidden' name='user_lat' value='" + position.coords.latitude + "'>"
        lat_long.innerHTML += "<input type='hidden' name='user_lng' value='" + position.coords.longitude + "'>"
    };

    let geolocationFail = function (error) {
        alert("Can not get your location." + error)
    };

    let getUserGeoLocation = function () {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(geolocationSuccess, geolocationFail);
        }
    };
    getUserGeoLocation();
</script>
