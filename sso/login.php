<?php
include_once '../config.php';
?>

Login page to redirect user from application to Azure for SSO authentication.
<br>
<a href="<?php echo $ssoConfig['sso']['loginUrl']; ?>"><?php echo $ssoConfig['sso']['loginUrl']; ?></a>