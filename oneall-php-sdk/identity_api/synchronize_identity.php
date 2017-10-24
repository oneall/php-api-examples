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

// Synchronize an identity
// http://docs.oneall.com/api/resources/identities/synchronize-identity/

// The identity to synchronize
$identity_token = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';

// Update the user data?
$update_user_data = true;

// Enfore token update?
$force_token_update = true;

// Make Request
$api      = new \Oneall\Api\Apis\Identity($client);
$response = $api->synchronize($identity_token, $update_user_data, $force_token_update);

displayResponse($response);
