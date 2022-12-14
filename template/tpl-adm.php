<?php

use Hekmatinasser\Verta\Verta;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map Panel</title>
    <link href="favicon.png" rel="shortcut icon" type="image/png">
    <link href="<?=site_url('assets/css/font-awesome.min.css')?>">
    <link rel="stylesheet" href="assets/css/styles.css<?="?v=" . rand(99, 9999999)?>" />
    <style>
    body{
        background:#f2f2f2;
        font-size: 19px;
    }
    a{
        text-decoration: none;
    }
    h1{
        text-align: center;
    }

    .main-panel{
        width:1300px;
        margin:30px auto;
    }
    .box {
        background: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        box-shadow: 0px 3px 3px #EEE;
        margin-bottom: 20px;
    }
    table.tabe-locations {
        width: 100%;
        border-collapse: collapse;
    }
    .statusToggle {
        background: #eee;
        min-width: 70px;
        color: #686868;
        border: 0;
        padding: 3px 12px;
        border-radius: 20px;
        cursor: pointer;
        font-size: 13px;
        font-weight: 400;
        font-family: sahel, serif !important;
        display:inline-block;
        margin:0 3px;
        text-align: center;
    }
    .statusToggle.active {
        background: #0c8f10;
        color: #ffffff;
    }
    .statusToggle.all {
        background: #005cbf;
        color: #ffffff;
    }
    .statusToggle:hover,button.preview:hover {
        opacity: 0.7;
    }
    button.preview {
        padding: 0 10px;
        background: none;
        border: none;
        font-size: 20px;
        cursor: pointer;
    }
    tr {
        line-height: 36px;
    }
    tr:nth-child(2n) {
        background:#f7f7f7;
    }
    td{
        padding:0 5px;
    }
    iframe#mapWivdow {
        width: 100%;
        height: 500px;
    }
    .text-center{
        text-align: center;
    }
    .remove{

    }
    </style>
</head>
<body>
    <div class="main-panel">
        <h1>?????? ???????????? <span style="color:#007bec">????</span></h1>
        <div class="box">
            <a class="statusToggle" href="<?=BASE_URL?>" target="_blank">????</a>
            <a class="statusToggle all" href="<?=site_url('adm.php')?>">?????? ???????? ????</a>
            <a class="statusToggle active" href="?verified=1">????????</a>
            <a class="statusToggle" href="?verified=0">??????????????</a>
            <a class="statusToggle" href="?logout=1" style="float:left">????????</a>
        </div>
        <div class="box">
        <table class="tabe-locations">
        <thead>
        <tr>
        <th style="width:40%">?????????? ????????</th>
        <th style="width:15%" class="text-center">?????????? ??????</th>
        <th style="width:10%" class="text-center">lat</th>
        <th style="width:10%" class="text-center">lng</th>
        <th style="width:25%">??????????</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($locations as $location): ?>
        <tr>
            <td><?=$location -> Title?></td>
            <td class="text-center"><?= Verta::instance($location -> created_at)-> format('%d %B %Y') ?></td>
            <td class="text-center"><?= $location -> lat?></td>
            <td class="text-center"><?= $location -> lng?></td>
            <td>
                <button class="statusToggle <?= $location -> verified ? 'active' : '' ?>" data-loc='<?=$location -> ID?>>'>
                    <?=$location -> verified ? '????????' : '??????????????'?>
                </button>
                <button class="preview" data-loc='<?= $location -> ID ?>'>?????????????????</button>
                <a href="?delete_loc=<?=$location -> ID?>">
                   <button class="remove" onclick="return confirm('?????? ???? ?????? ?????? ???????? ?????????????? ????????????\n<?=$location->Title?>')" >??????</button>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
        </div>

    </div>

    <div class="modal-overlay" style="display: none;">
        <div class="modal">
            <span class="close">x</span>
            <div class="modal-content">
                <iframe id='mapWivdow' src="#" frameborder="0"></iframe>
            </div>
        </div>
    </div>



    <script src="assets/js/jquery.min.js"></script>
    <script>
    $(document).ready(function()
    {
        $('.preview').click(function()
        {
            $('.modal-overlay').fadeIn();
            $('#mapWivdow').attr('src','<?=BASE_URL?>?loc=' + $(this).attr('data-loc'));
        });

        // change Status Toggle
        $('.statusToggle').click(function (){
            var locId = $(this).attr('data-loc');
            $.ajax({
                url : '<?=site_url("process/statusToggle.php")?>',
                method : 'post',
                data : {loc:locId},
                success : function (response)
                {
                    if (response == 1)
                    {
                        location.reload();
                    }
                }
            })
        })

        // close modal
        $('.modal-overlay .close').click(function()
        {
            $('.modal-overlay').fadeOut();
        });
    });
    </script>
</body>
</html>
