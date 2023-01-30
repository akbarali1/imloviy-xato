<?php
// Kod Akbarali tomonidan 2020-yil 10-mart sanasida yasaldi va github'ga qo`yildi
// https://github.com/Akbar9705/imloviy-xato
// Github profil https://github.com/Akbar9705
// Sayt https://uzhackersw.uz
$url_addres = trim($_POST['url_address']);
$error_text = trim($_POST['error_text']);
$fixed_text = trim($_POST['fixed_text']);
if ($url_addres && $error_text && $fixed_text) {
    $token          = '<BOT_TOKEN>';
    $user_id        = '<ADMIN_TELEGRAM_ID>';
    $message        = '<b>Salom guruh a\'zolari, saytda imloviy xato bo`lgani uchun sizga xabar yozishdi.</b>'.PHP_EOL;
    $message        .= '<b>Sahifa manzili:</b> <code>'.$url_addres.'</code>'.PHP_EOL;
    $message        .= '<b>Xato so`z:</b> <u>'.$error_text.'</u>'.PHP_EOL;
    $message        .= '<b>Taklif qilingan matn:</b> <u>'.$fixed_text.'</u>'.PHP_EOL;
    $message        .= 'Xatoni tezda tuzatasizlar deb umid qilaman.';
    $request_params = ['chat_id' => $user_id, 'text' => $message, 'parse_mode' => 'HTML'];
    $request_url    = 'https://api.telegram.org/bot'.$token.'/sendMessage?'.http_build_query($request_params);
    file_get_contents($request_url);
    $out = [
        'success' => true,
        'message' => 'Yordam berganingiz uchun tashakkur!<br>Tez orada ushbu imloviy xatoni tuzatamiz.',
    ];
} else {
    $out = ['success' => false, 'message' => 'Aniq bilmadim, lekin bu xato.'];
}
header('Content-Type: text/json; charset=utf-8');
echo json_encode($out);
