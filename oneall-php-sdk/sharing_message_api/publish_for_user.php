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

// Social Sharing API \ Publish a message to one or more social networks
// hhttp://docs.oneall.com/api/resources/social-sharing/publish-new-message/

//
// Mandatory elements
//
// Publish message for this user_token
$user_token = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';
// Publish message to this networks
$providers = array('twitter');
// text message
$text = 'testing link http://docs.oneall.com/';

//
// Optionnal elements
//
// picture url to post
$pictureUrl = 'http://public.oneallcdn.com/img/services/social_login.png';
// video url to post
$videoUrl = 'video.example.com';
// link to post
$link    = array(
    'name' => 'oneall.com',
    'url' => 'http://www.oneall.com/',
    'caption' => 'Social Media Integration',
    'description' => 'Easily integrate social services with your already-existing website.'
);
// upload some contents
$uploads =
    [
        [
            'name' => '...image_path...',
            'data' => base64_encode(file_get_contents('...image_path...'))
        ]
    ];
// use our url shortener (& tracker)
$enableTracking = true;


// Make Request
$api = new \Oneall\Api\Apis\Sharing($client);

//$response = $api->publish($user_token, $providers, $text);
$response = $api->publish($user_token, $providers, $text, $videoUrl, $pictureUrl, $link, $uploads, $enableTracking);
displayResponse($response);
