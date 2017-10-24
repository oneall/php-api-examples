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

// Publish content to a Facebook page
$page_token = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';

$text = 'The most powerful features of 35+ social networks consolidated in a single solution.';
$link = array(
    'url' => 'https://www.oneall.com/',
    'name' => 'OneAll',
    'caption' => 'Social Media Integration',
    'description' => ' OneAll is a technology company offering a set of web-delivered tools and a Unified Social Network API to simplify the integration of 30+ social networks into business and personal websites.'
);

$pictureUrl = 'https://secure.oneallcdn.com/img/oneall/128x128.png';

// Make request
$api        = new \Oneall\Api\Apis\Provider\Facebook($client);
$pagination = new \Oneall\Api\Pagination(2, 5, 'desc');
$response   = $api->publish($page_token, $text, $link, $pictureUrl);

displayResponse($response);
