<?php

// Require the Composer autoloader
require __DIR__ . '/vendor/autoload.php';

// Check if the .env file exists before attempting to load it
if (file_exists(__DIR__ . '/.env')) {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
}

// Now you can access the environment variables
$idpCertificate = $_ENV['IDP_CERTIFICATE'];
$idpTenantId = $_ENV['IDP_TENANT_ID'];

return $ssoConfig = [
    'sp' => [
        'entityId' => 'https://gopivot.quicklabs.in',
        'assertionConsumerService' => [
            'url' => 'https://gopivot.quicklabs.in/sso/reply.php',
        ],
        'singleLogoutService' => [
            'url' => 'https://gopivot.quicklabs.in/sso/logout.php',
        ],
    ],
    'idp' => [
        'entityId' => "https://sts.windows.net/{$idpTenantId}/",
        'singleSignOnService' => [
            'url' => "https://login.microsoftonline.com/{$idpTenantId}/saml2",
        ],
        'singleLogoutService' => [
            'url' => "https://login.microsoftonline.com/{$idpTenantId}/saml2",
        ],
        'x509cert' => $idpCertificate,
    ],
];