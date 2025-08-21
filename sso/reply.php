<?php
    require_once '../vendor/autoload.php';

    use OneLogin\Saml2\Auth;

    $settings = require('../ssoConfig.php');
    $auth = new Auth($settings);

    // Process SAML Response from IdP
    $auth->processResponse();

    if (!$auth->isAuthenticated()) {
        echo "Not authenticated!";
        exit;
    }

    echo "User is authenticated successfully!<br>Data given to us is:<br>";
    $userData = $auth->getAttributes();
    print_r($userData);
?>
