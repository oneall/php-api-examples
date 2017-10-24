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

$identityToken = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';
$videoUri      = 'http://www.sample-videos.com/video/mp4/720/big_buck_bunny_720p_1mb.mp4';
$description   = 'Sample Video';

// Make Request
$api      = new \Oneall\Api\Apis\Provider\LinkedIn($client);
$response = $api->publish($identityToken, $pagination);

displayResponse($response);
