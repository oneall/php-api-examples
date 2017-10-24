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

//Get the details of this message
$message_token = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';

// Shorturl API \ Read Shorturl details
// http://docs.oneall.com/api/resources/shorturls/read-shorturl-details/

//The shorturl_token to get the details from
$shorturl_token = '1c9gR';

$api      = new \Oneall\Api\Apis\ShortUrl($client);
$response = $api->get($shorturl_token);

displayResponse($response);
