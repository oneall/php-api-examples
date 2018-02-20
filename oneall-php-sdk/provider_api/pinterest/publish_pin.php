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
include __DIR__ . '/../../../bootstrap.php';

// Get the Pinterest posts of this identity
$identityToken = '88888888-4444-4444-4444-121212121212';
$board    = 'averyskyler352/test';
$note    = 'User Integration Platform';
$image_uri    = 'http://public.oneallcdn.com/img/presentation/photos/offices.jpg';
$link    = 'http://www.oneall.com/company/imprint/';

// Make Request
$api      = new \Oneall\Api\Apis\Provider\Pinterest($client);
$response = $api->publishPin($identityToken, $board, $note, $image_uri, $link);

displayResponse($response);
