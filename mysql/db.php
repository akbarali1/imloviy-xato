<?php
//Kod Akbarali tomonidan 2020 yil 10-mart sanasida ysaldi va githubga qo`yildi
// https://github.com/Akbar9705/imloviy-xato
// Github profil https://github.com/Akbar9705
//Site https://uzhackersw.uz

$url_adres = trim($_POST['url_address']);
$hato_soz  = trim($_POST['error_text']);
$tuzailgan = trim($_POST['fixed_text']);
if ($url_adres && $hato_soz && $tuzailgan) {
    $token          = '<token>';
    $user_id        = '<telegram_id_raqamingiz>';
    $xabar          = 'Salom guruh azolari sayt imloviy xato bo`lgani uchun sizga xabar yozishdi. 
Sahifa manzili: '.$url_adres.' 
Xato soz: '.$hato_soz.'
Taklif qilingan matn: '.$tuzailgan.' 
Xatoni tezda tuzatasizlar deb umid qilaman';
    $request_params = ['chat_id' => $user_id, 'text' => $xabar];
    $request_url    = 'https://api.telegram.org/bot'.$token.'/sendMessage?'.http_build_query($request_params);
    file_get_contents($request_url);
    $out = [
        'success' => 'true',
        'message' => 'Yordam berganingiz uchun tashakkur! <br>Tez orada ushbu imloviy xatoi tuzatamiz.',
    ];
} else {
    $out = ['fail' => 'false', 'message' => 'aniq bilmadim lekin bu xato'];
}
header('Content-Type: text/json; charset=utf-8');
echo json_encode($out);