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
include __DIR__ . '/../../bootstrap.php';

// SSO API \ Start SSO session for identity
// https://docs.oneall.com/api/resources/sso/identity/start-session/

// The identity for which you want to start the SSO session
$identity_token = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';

// options
$top_realm = 'example1';
$sub_realm = 'example2';
$lifetime  = 7200;

$api      = new \Oneall\Api\Apis\Sso($client);
$response = $api->startIdentitySession($identity_token, $top_realm, $sub_realm, $lifetime);

displayResponse($response);
