<?php

//server side
header("Content-Type:text/xml; charset=utf-8");
header("Cache-Control:no-cache");

//get coountry name
$country = $_POST['country'];
//file_put_contents("d:/mylog.log",$country."\r\n", FILE_APPEND );
$info = "";
if ($country == "China") {
    $info = "<country><state>Hebei</state><state>Beijing</state><state>Hubei</state></country>";
} else if ($country == "United States") {
    $info = "<country><state>PA</state><state>CA</state><state>FL</state></country>";
}
//line 3
echo $info;
?>