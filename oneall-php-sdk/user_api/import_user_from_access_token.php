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

// Users \ Import a user using his access token from a social network
// http://docs.oneall.com/api/resources/users/import-user/

// Facebook
// $provider_key = 'facebook';
// $provider_access_token_key = '<replace_by_your_access_token>';
// $provider_access_token_secret = ''; //Not used by Facebook

// Twitter
$provider_key                 = 'twitter';
$provider_access_token_key    = ''; // Insert the access token> (Required)
$provider_access_token_secret = ''; // Insert the access token secret (Required)

//User
$user_token = ''; // Link the social network profile to this user_token (Optional)

$api      = new \Oneall\Api\Apis\User($client);
$response = $api->createUser($provider_key, $provider_access_token_key, $user_token, $provider_access_token_secret);

displayResponse($response, [
    200 => 'Existing user updated',
    201 => 'New user created',
]);
