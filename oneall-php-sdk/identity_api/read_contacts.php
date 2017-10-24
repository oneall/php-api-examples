<?php
/**
 * Copyright 2017 OneAll, LLC.
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

// Read contacts of an identity
// https://docs.oneall.com/api/resources/identities/read-contacts/

// The identity to read the contacts for
$identity_token = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';

// Read the contacts from cache?
$disable_cache = false;

// Make Request
$api        = new \Oneall\Api\Apis\Identity($client);
$pagination = new \Oneall\Api\Pagination(1, 20, 'asc');
$response   = $api->getContacts($identity_token, $pagination, $disable_cache);

displayResponse($response);
