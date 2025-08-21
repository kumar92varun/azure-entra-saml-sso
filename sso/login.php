<?php
    require_once '../vendor/autoload.php';

    use OneLogin\Saml2\Auth;
    $settings = require('../ssoConfig.php');
    $auth = new Auth($settings);
    $ssoLoginUrl = $auth->login(null, [], false, false, true);
?>

Login page to redirect user from application to Azure for SSO authentication.
<br>
<a href="<?php echo $ssoLoginUrl; ?>"><?php echo $ssoLoginUrl; ?></a>