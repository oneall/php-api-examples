<?php
/**
 * Copyright 2016-Present OneAll, LLC.
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

// User Cloud Storage \ Update User
// https://docs.oneall.com/api/resources/storage/users/update-user/

// Identitiy structure available here:
// https://docs.oneall.com/api/basic/identity-structure/

// User Token
$userToken = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';

// Replace Data or append ?
$replace_data = true;
$mode         = ($replace_data ? 'replace' : 'append');

// Message Structure
$identity   = [
    'name' => [
        'givenName' => 'Max',
        'familyName' => 'Miller'
    ],
    'customData' => [
        'whatever',
        'that' => [
            'will',
            'be'
        ],
        'store' => [
            'as' => 'json'
        ]
    ]
];
$externalId = $login = $password = null;
//you can search by external id
$externalId = 123456;
// or by credentials
//$login    = 'my-login';
//$password = 'my-password';

$api      = new \Oneall\Api\Apis\Storage($client);
$response = $api->updateUser($userToken, $externalId, $login, $password, $identity, $mode);

displayResponse($response, [
    200 => 'Existing cloud identity updated',
    201 => 'New cloud identity added',
]);


