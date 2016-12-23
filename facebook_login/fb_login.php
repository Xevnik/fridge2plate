<?php
    require_once __DIR__.'/../vendor/autoload.php';

    $fb = new Facebook\Facebook([
        'app_id' => '1836003869992015', // Replace {app-id} with your app id
        'app_secret' => '9b4a3fb96f7690f65ea298d9018ea9a7',
        'default_graph_version' => 'v2.2',
    ]);

    $helper = $fb->getRedirectLoginHelper();

    $permissions = ['email']; // Optional permissions
    $loginUrl = $helper->getLoginUrl('https://localhost:8888/lfz/c11_recipe/google_login/g_login.php', $permissions);

    echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
?>