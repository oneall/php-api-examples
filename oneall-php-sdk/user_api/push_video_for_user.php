<?php
/**
 * Copyright 2015 OneAll, LLC.
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

// User \ Publish content to a user's social network account
// http://docs.oneall.com/api/resources/users/write-to-users-wall/

// Publish message for this user
$user_token = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';

$providers = array('facebook');
$url       = 'http://hubblesource.stsci.edu/sources/video/clips/details/images/hale_bopp_2.mpg';
$caption   = 'Comet Hale-Bopp Nucleus Animation';

// Make Request
$api      = new \Oneall\Api\Apis\User($client);
$response = $api->pushVideo($userToken, $providers, $url, $caption);

displayResponse($response);
