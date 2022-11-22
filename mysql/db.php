<?php
// Kod Akbarali tomonidan 2020-yil 10-mart sanasida yasaldi va github'ga qo`yildi
// https://github.com/Akbar9705/imloviy-xato
// Github profil https://github.com/Akbar9705
// Sayt https://uzhackersw.uz

$url_addres = trim($_POST['url_address']);
$xato_soz  = trim($_POST['error_text']);
$tuzatilgan = trim($_POST['fixed_text']);
if ($url_addres && $xato_soz && $tuzatilgan) {
    $token          = '<token>';
    $user_id        = '<telegram_id_raqamingiz>';
    $xabar          = 'Salom guruh a\'zolari, saytda imloviy xato bo`lgani uchun sizga xabar yozishdi. 
Sahifa manzili: '.$url_addres.' 
Xato so`z: '.$xato_soz.'
Taklif qilingan matn: '.$tuzatilgan.' 
Xatoni tezda tuzatasizlar deb umid qilaman.';
    $request_params = ['chat_id' => $user_id, 'text' => $xabar];
    $request_url    = 'https://api.telegram.org/bot'.$token.'/sendMessage?'.http_build_query($request_params);
    file_get_contents($request_url);
    $out = [
        'success' => 'true',
        'message' => 'Yordam berganingiz uchun tashakkur!<br>Tez orada ushbu imloviy xatoni tuzatamiz.',
    ];
} else {
    $out = ['fail' => 'false', 'message' => 'Aniq bilmadim, lekin bu xato.'];
}
header('Content-Type: text/json; charset=utf-8');
echo json_encode($out);
