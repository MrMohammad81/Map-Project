
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map</title>

    <!------- Css File -------->
    <link href="favicon.png" rel="shortcut icon" type="image/png">
    <link rel="stylesheet" href="assets/css/styles.css" />
    <link rel="stylesheet" href="assets/css/leaflet.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-------- js File ---->
    <script src="assets/js/leaflet.js"></script>
</head>

<body>
    <div class="main">
        <div class="head">
            <input type="text" id="search" placeholder="دنبال کجا می گردی؟">
        </div>
        <div class="container-fluid">
            <div id="map"></div>
        </div>
    </div>

    <script>

        var map = L.map('map').setView([29.5852794,52.5773799], 15);

        var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: 'Map; <a href="http://localhost/Map">Map Project</a>'
        }).addTo(map);

        document.getElementById('map').style.setProperty('height' , window.innerHeight + 'px');
    </script>
</body>

</html>