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

// User Cloud Storage \ User Lookup
// https://docs.oneall.com/api/resources/storage/users/lookup-user/

$externalId = 123456;
$api      = new \Oneall\Api\Apis\Storage($client);
$response = $api->lookUpById($externalId);

displayResponse($response);
