<?php
/**
 * copyright 2015 oneall, llc.
 *
 * licensed under the apache license, version 2.0 (the "license"); you may
 * not use this file except in compliance with the license. you may obtain
 * a copy of the license at
 *
 * http://www.apache.org/licenses/license-2.0
 *
 * unless required by applicable law or agreed to in writing, software
 * distributed under the license is distributed on an "as is" basis, without
 * warranties or conditions of any kind, either express or implied. see the
 * license for the specific language governing permissions and limitations
 * under the license.
 *
 */

// http handler and configuration
include __dir__ . '/../../bootstrap.php';

// user \ publish content to a user's social network account
// http://docs.oneall.com/api/resources/users/write-to-users-wall/

// publish message for this user
$user_token = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';

$providers = array('facebook');
$url       = 'http://public.oneallcdn.com/img/oneall_header_logo.png';
$caption   = 'my picture';
$target    = '10207703731045058';

// make request
$api      = new \oneall\api\apis\user($client);
$response = $api->pushpicture($user_token, $providers, $url, $caption, $target);

displayresponse($response);
