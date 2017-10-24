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

// User \ Publish content to a user's social network account
// http://docs.oneall.com/api/resources/users/write-to-users-wall/

// Publish message for this user
$userToken = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';

// Publish message by using a publish_token (available on mobile devices)
$publishToken = '';

// Publish message on these social networks
$providers = array(
    'facebook'
);

$myTextToPublish = 'Test';

//
// Optionnal elements to publish
//
$pictureUrl = 'http://public.oneallcdn.com/img/oneall_header_logo.png';
$videoUrl   = '... a video uri ...';
$link       = array(
    'url' => 'http://www.oneall.com/',
    'name' => 'oneall.com',
    'caption' => 'Social Media Integration',
    'description' => 'Test Post'
);
$uploads    = [
    [
        'name' => '...image_path...',
        'data' => base64_encode(file_get_contents('...image_path...'))
    ]
];

// Make Request
$api      = new \Oneall\Api\Apis\User($client);
$response = $api->publish($userToken, $providers, $myTextToPublish, $videoUrl, $pictureUrl, $link, $uploads);

displayResponse($response);
