<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map</title>

    <!------- Css File -------->
    <link href="favicon.png" rel="shortcut icon" type="image/png">
    <link rel="stylesheet" href="assets/css/styles.css<?="?v=".rand(99,9999)?>"/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css">
    <link href="assets/css/font-awesome.min.css">
    <!-------- js File ---->
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"></script>

</head>

<body>
<div class="main">
    <div class="head">
        <div class="search-box">
            <input type="text" id="search" placeholder="دنبال کجا می گردی؟" autocomplete="off">
            <div class="clear"></div>
            <div class="search-results" style="display:none"></div>
        </div>
    </div>
    <div class="mapContainer">
        <div id="map"></div>
    </div>
    <img src="assets/img/current.png" class="currentLoc">
</div>

<div class="modal-overlay" style="display: none;">
    <div class="modal">
        <span class="close">X</span>
        <h3 class="modal-title">ثبت لوکیشن</h3>
        <div class="modal-content">
            <form  action="<?=site_url('process/addLocation.php')?>" id='addLocationForm' method="post">
                <div class="field-row">
                    <div class="field-title">مختصات</div>
                    <div class="field-content">
                        <input id="lat-display" name="lat" readonly style="width: 190px; text-align: center"> ,
                        <input id="lng-display" name="lng" readonly style="width: 190px; text-align: center">
                    </div>
                </div>
                <div class="field-row">
                    <div class="field-title">نام مکان</div>
                    <div class="field-content">
                        <input type="text" name="title" id='l-title' placeholder="مثلا: دفتر مرکزی ">
                    </div>
                </div>
                <div class="field-row">
                    <div class="field-title">نوع</div>
                    <div class="field-content">
                        <select name="type" id="l-type">
                            <?php foreach (locationTypes as $key=>$value): ?>
                            <option value="<?= $key ?>"><?= $value ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="field-row">
                    <div class="field-title">ذخیره نهایی</div>
                    <div class="field-content">
                        <input type="submit" class="submit" value=" ثبت ">
                    </div>
                </div>
                <div class="ajax-result"></div>
            </form>
        </div>
    </div>
</body>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/script.js <?= '?v=' . rand(99,9999) ?>"></script>
<script>
    <?php if ($location): ?>
         L.marker([<?= $location -> lat?> , <?= $location -> lng?>]).addTo(map).bindPopup("<?= $location -> Title?>").openPopup();
    <?php endif; ?>
    $(document).ready(function (){
       $('.mapContainer').click(function (){
           locate();
       })
    });
</script>
</html>