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
// Single Sign-On \ Destroy SSO Session for identity
// https://docs.oneall.com/api/resources/sso/identity/destroy-session/

// Identity token
$identity_token = (!empty ($_REQUEST['identity_token']) ? $_REQUEST['identity_token'] : '');

echo '<h2><a href="start_sso_session.php">Start New SSO Session</a></h2>';

// Make Request
if (!empty ($identity_token))
{
    // Make request
    $result = $sso->destroyIdentitySession($identity_token);
    displayResponse($result);
}
// No Token given
else
{
    echo '<h1>Error</h1>';
    echo '<pre>No identity_token received: cannot remove SSO session</pre>';
}
