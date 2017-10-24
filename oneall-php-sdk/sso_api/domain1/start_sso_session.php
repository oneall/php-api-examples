<?php
/**
 * Copyright 2011-2017 OneAll, LLC.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may
 * not use this file except in compliance with the License. You may obtain
 * a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 *
 */

// HTTP Handler and Configuration
include '../../../bootstrap.php';

$sso = new \Oneall\Api\Apis\Sso($client);

// Single Sign-On \ Start SSO Session for identity
// https://docs.oneall.com/api/resources/sso/identity/start-session/

// Identity token
$identity_token = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';

// SSO Realm (If changed, they have also to be modified in check_sso_session.php on domain2)
$top_realm = 'vegetables';
$sub_realm = 'tomato';
// SSO session lifetime in seconds
$lifetime = 86400;

// Make Request
$result = $sso->startIdentitySession($identity_token, $top_realm, $sub_realm, $lifetime);

// Success
if ($result->getStatusCode() == 201)
{
    // Read the result
    $body = json_decode($result->getBody());

    // Extract the SSO session token
    $sso_session_token = $body->response->result->data->sso_session->sso_session_token;

    // Build the redirect url
    $protocol = (!empty ($_SERVER ['HTTPS']) && $_SERVER ['HTTPS'] !== 'off' || $_SERVER ['SERVER_PORT'] == 443) ? "https://" : "http://";
    $url      = $protocol . ($_SERVER ['HTTP_HOST'] . dirname($_SERVER ['REQUEST_URI'])) . '/set_sso_session_cookie.php?sso_session_token=' . $sso_session_token;

    // Redirect to the page that sets the SSO cookie
    header("Location: " . $url);
}
// Error
else
{
    echo "<h1>Error " . $result->getStatusCode() . "</h1>";
    echo "<pre>" . oneall_pretty_json::format_string($result->getBody()) . "</pre>";
}
