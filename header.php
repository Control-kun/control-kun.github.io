<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();

$dgData = [
  'SRC_DG'  => SITE_TEMPLATE_PATH . '/dg/',
  'SRC_IMG' => SITE_TEMPLATE_PATH . '/img/',

  'NAV_ROOT'    => '/',
  'NAV_HOME'    => '/'
];
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?$APPLICATION->ShowHead();?>

    <?// $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery-1.11.2.min.js'); ?>
    <? //$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/common.js'); ?>
    <?// $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/slick.min.js'); ?>

    <link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/css/fonts.css">
    <link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/css/primary.css">
    <link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/css/default.css">
    <link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/css/media.css">
    <link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/css/navmenumobile.css">

    <link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/css/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/css/slick.css">

    <title><?$APPLICATION->ShowTitle();?></title>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />

<!--    <script>-->
<!--        function initMap() {-->
<!--            var map = new google.maps.Map(document.getElementById('map'), {-->
<!--                center: {lat: -34.397, lng: 150.644},-->
<!--                zoom: 6-->
<!--            });-->
<!--            var infoWindow = new google.maps.InfoWindow({map: map});-->
<!---->
<!--            // Try HTML5 geolocation.-->
<!--            if (navigator.geolocation) {-->
<!--                navigator.geolocation.getCurrentPosition(function(position) {-->
<!--                    var pos = {-->
<!--                        lat: position.coords.latitude,-->
<!--                        lng: position.coords.longitude-->
<!--                    };-->
<!---->
<!--                    infoWindow.setPosition(pos);-->
<!--                    infoWindow.setContent('Location found.');-->
<!--                    map.setCenter(pos);-->
<!--                }, function() {-->
<!--                    handleLocationError(true, infoWindow, map.getCenter());-->
<!--                });-->
<!--            } else {-->
<!--                // Browser doesn't support Geolocation-->
<!--                handleLocationError(false, infoWindow, map.getCenter());-->
<!--            }-->
<!--        }-->
<!---->
<!--        function handleLocationError(browserHasGeolocation, infoWindow, pos) {-->
<!--            infoWindow.setPosition(pos);-->
<!--            infoWindow.setContent(browserHasGeolocation ?-->
<!--                'Error: The Geolocation service failed.' :-->
<!--                'Error: Your browser doesn\'t support geolocation.');-->
<!--        }-->
<!--    </script>-->

    <script type="text/javascript">

        function initMap() {
            var myLatLng = {lat: 59.9407752, lng: 30.3918844};

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 16,
                center: myLatLng,
                scrollwheel: false
            });

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'СПб, ул. Новгородская, д. 23 (БЦ "Базель"), офис 111'
            });
        }

    </script>
</head>
<body>
<div id="panel">
    <?$APPLICATION->ShowPanel();?>
</div>
    <header>
        <div class="header-container">
            <a href="/" class="dg-link--wrap header-logo"></a>

            <div class="header-phone"><a class="header-phone__link" href="tel:88005553524">8-800-555-35-24</a></div>

            <nav class="menu-container">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "top-menu",
                    array(
                        "ROOT_MENU_TYPE" => "top",
                        "MAX_LEVEL" => "2",
                        "CHILD_MENU_TYPE" => "top-sub",
                        "USE_EXT" => "Y",
                        "DELAY" => "N",
                        "ALLOW_MULTI_SELECT" => "Y",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_CACHE_GET_VARS" => array(
                        ),
                        "COMPONENT_TEMPLATE" => ""
                    ),
                    false
                );?>
            </nav>
        </div>
    </header>


