<?php
/**
 * Copyright 2012 OneAll, LLC.
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

// User API \ Read a user's social network contacts
// http://docs.oneall.com/api/resources/users/read-contacts/

// The user to read the contacts from
$userToken = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';

// Read from cache?
$disable_cache = true;

// Make Request
$api      = new \Oneall\Api\Apis\User($client);
$response = $api->getContacts($userToken, $disable_cache);

displayResponse($response);
