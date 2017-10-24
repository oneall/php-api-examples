<?php

/**
 * @package      Oneall Api Example
 * @copyright    Copyright 2017-Present http://www.oneall.com
 * @license      GNU/GPL 2 or later
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307,USA.
 *
 * The "GNU General Public License" (GPL) is available at http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

// HTTP Handler and Configuration
include __DIR__ . '/../../bootstrap.php';

// Sharing Analytics API \ Initiate a new snapshot for shared content
// http://docs.oneall.com/api/resources/sharing-analytics/initiate-snapshot/

//The message to request a snapshot for
$sharing_message_token = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';

//The pingback uri
//	The OneAll API sends a request to this uri once the snapshot has been processed.
//	It has to be a public uri and you can use the snapshot_pingback_handler.php
//	from the examples to get an idea how it works
$pingback_uri = 'some_uri';

$api      = new \Oneall\Api\Apis\Analytics($client);
$response = $api->initiate($sharing_message_token, $pingback_uri);

displayResponse($response, [201 => 'Created', 102 => 'Being Processed']);
