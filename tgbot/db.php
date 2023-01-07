<?php
//Kod Akbarali tomonidan 2020 yil 10-mart sanasida ysaldi va githubga qo`yildi
// https://github.com/Akbar9705/imloviy-xato
// Github profil https://github.com/Akbar9705
//Site https://uzhackersw.uz
$mysqli = new Mysqli('localhost', 'ajax', '', 'ajax');
$mysqli->set_charset("utf8");

$url       = trim($_POST['url_address']);
$hato_soz  = trim($_POST['error_text']);
$tuzailgan = trim($_POST['fixed_text']);

if ($url && $hato_soz && $tuzailgan) {
    $mysqli->query("INSERT INTO users (url,hato_soz,tuzailgan) VALUES('$url', '$hato_soz', '$tuzailgan')");
    $out = ['success' => 'true', 'message' => 'ordam berganingiz uchun tashakkur!'];
} else {
    $out = ['fail' => 'false', 'message' => 'aniq bilmadim lekin bu xato'];
}
header('Content-Type: text/json; charset=utf-8');
echo json_encode($out);
