<?php
return array(
    'basePath' => dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'ds' => DIRECTORY_SEPARATOR,
    'resourceFolder' => 'public',
    'name' => 'Camia Resort & Spa',
    'shortcut' => 'Camia',
    'logo' => 'logo.png',
    'isTextShortcut' => false,
    'sourceLanguage' => 'vi',
    'language' => 'vi',
    'defaultModule' => 'Default',
    'defaultController' => 'Index',
    'defaultAction' => 'index',
    'defaultTemplate' => 'main',
    'db' => array(
        'connectionString'=>'mysql:host=localhost;dbname=mysql_camia_resort;charset=utf8',
        'emulatePrepare'=>true,
        'username'=>'root',
        'password'=>'root',
        'charset'=>'utf8',
    ),
    'module' => array(
        'default' => 1,
        'new' => 2,
        'comic' => 3
    ),
    'routers' => array(
        'tin-tuc' => 'news',
    ), 
    'recordPerPage' => 2,
    'pageRank' => 2,
    'mail' => array(
        'Host' => 'smtp.gmail.com',
        'Port' => 465,
        'SMTPDebug' => 2,
        'Debugoutput' => 'html',
        'SMTPSecure' => 'ssl',
        'SMTPAuth' => true,
        'Username' => 'gmail_cua_ban@gmail.com',
        'Password' => 'pass_word_ung_dung'
    ),
    'ogFb' => array(
        'title' => 'Camia Resort & Spa - Luxury Beach Resort, Hotel, Bar and Spa in Phu Quoc',
        'description' => 'Camia Resort & Spa - an island retreat where the natural beauty of Phu Quoc meets contemporary vietnamese luxury. Welcome to Nam Nghi Resort!',
        'image' => 'avatar.jpg',
        'type' => 'website'
        )     
);
?>