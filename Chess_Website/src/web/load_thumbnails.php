<?php

    session_start();

    use MongoDB\BSON\ObjectID;

    require_once 'business.php';

    $wyszukiwanie = $_POST['wyszukiwanie'];

    $wypisz = '<input type="text" id="wyszukiwarka" name="wyszukiwarka" value="' . $wyszukiwanie . '" onfocus="let value = this.value; this.value = null; this.value=value"/>';

    $wypisz = $wypisz . searchThumbnails($wyszukiwanie);

    $wypisz = $wypisz . '<script>

    $(document).ready(function(){

        document.getElementById("wyszukiwarka").focus();

        $("#wyszukiwarka").keyup(function(){
            $("#galeria2").load("load_thumbnails.php", {
                wyszukiwanie: $("#wyszukiwarka").val()
            });
        });
    });

    </script>';

    echo $wypisz;

?>