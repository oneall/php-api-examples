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

// Social Sharing API \ Re-Publish a previously published message
// http://docs.oneall.com/api/resources/social-sharing/re-publish-message/

//Republish this message
$sharing_message_token = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';

//Publish message for this user_token
$user_token = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';

//Publish message to this networks
$providers = array ();
$providers [] = 'facebook';

// Make Request
$api = new \Oneall\Api\Apis\Sharing($client);
$response = $api->republish($sharing_message_token, $user_token, $providers);
displayResponse($response);


