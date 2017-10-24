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

// List all identities
// http://docs.oneall.com/api/resources/identities/list-all-identities/

// The page to retrieve
$page = 1;

// Entries per page
$entries_per_page = 5;

// Newest first
$order_direction = 'asc';

// Make Request
$api        = new \Oneall\Api\Apis\Identity($client);
$pagination = new \Oneall\Api\Pagination($page, $entries_per_page, $order_direction);
$response   = $api->getAll($pagination);

displayResponse($response);
