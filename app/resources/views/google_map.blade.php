@extends('layouts.layout')
@section('content')
<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        height: 100vh;
        margin: 10px;
    }
    .content {
        text-align: center;
    }
    .title {
        font-size: 34px;
    }
    #map {
        height: 500px;
        width:80%;
        border: 1px dotted #636b6f;
    }
</style>

<div class="container">
    <div class="title">
        Google Map
    </div>
    <div id="map"></div>
</div>

<script>
    function initMap() {
        let info = @json($info);
        let position = new google.maps.LatLng(info.lat,info.lng);

        const map = new google.maps.Map(document.getElementById('map'), {
            center: position,
            zoom: 19
        });

        const infoWindow = new google.maps.InfoWindow({
            content: "",
            disableAutoPan: true,
        });

        const marker = new google.maps.Marker({
            position: position,
            map: map,
        });

        marker.addListener("click", () => {
            infoWindow.setContent(info.name);
            infoWindow.open(map, marker);
        });
    }
</script>

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfAlMhY_R3gcDLvTq4zN0l6Ry0tTUC_aQ&callback=initMap&v=weekly"
        async
    ></script>

</body>
</html>

@endsection
