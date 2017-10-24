<?php
/**
 * @package      API Examples
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

require_once 'vendor/autoload.php';
require __DIR__ . '/oneall_curly.php';
require __DIR__ . '/oneall_pretty_json.php';

parse_config_ini();

// Init curly client
$oneall_curly = new oneall_curly ();
$oneall_curly->set_option('USERPWD', SITE_PUBLIC_KEY . ':' . SITE_PRIVATE_KEY);
// Change to 1 to display the CURL output
$oneall_curly->set_option('VERBOSE', 0);
// Enable SSL checks
$oneall_curly->set_option('SSL_VERIFYPEER', 1);

// Init Client object for PHP-SDK
$client = new Oneall\Client\Adapter\Curl(SITE_SUBDOMAIN, SITE_PUBLIC_KEY, SITE_PRIVATE_KEY, false, 'oneall.com');

function parse_config_ini()
{
    // Current folder
    $current_folder = realpath(dirname(__FILE__));

    // Read configuration
    $config = parse_ini_file(__DIR__ . "/config.ini", true);

    // Select environment
    $environment = (isset ($config ['environment']) ? trim($config ['environment']) : null);
    if (empty ($environment))
    {
        die ("The environment needs to be set in the config.ini file");
    }

    // Read environment settings
    $settings = (isset ($config [$environment]) ? $config [$environment] : null);
    if (!is_array($config [$environment]))
    {
        die ("The environment [" . $environment . "] is not setup, please check the config.ini file");
    }

    // Site subdomain
    $site_subdomain = (isset ($settings ['oneall_site_subdomain']) ? trim($settings ['oneall_site_subdomain']) : null);
    if (empty ($site_subdomain))
    {
        die ("The [oneall_site_subdomain] is not setup for the environment [" . $environment . "], please check the config.ini file");
    }

    // Site private key
    $site_private_key = (isset ($settings ['oneall_site_private_key']) ? trim($settings ['oneall_site_private_key']) : null);
    if (empty ($site_private_key))
    {
        die ("The [oneall_site_private_key] is not setup for the environment [" . $environment . "], please check the config.ini file");
    }

    // Site public key
    $site_public_key = (isset ($settings ['oneall_site_public_key']) ? trim($settings ['oneall_site_public_key']) : null);
    if (empty ($site_public_key))
    {
        die ("The [oneall_site_public_key] is not setup for the environment [" . $environment . "], please check the config.ini file");
    }

    // Constants
    define('SITE_SUBDOMAIN', $site_subdomain);
    define('SITE_DOMAIN', 'https://' . $site_subdomain . '.api.oneall.com');
    define('SITE_PUBLIC_KEY', $site_public_key);
    define('SITE_PRIVATE_KEY', $site_private_key);
}

/**
 * Display a Response
 *
 * @param \Oneall\Client\Response $response
 */
function displayResponse(\Oneall\Client\Response $response, array $codesLabels = [])
{

    $state = 'Success';
    if ($response->getStatusCode() >= 400)
    {
        $state = 'Error';
    }

    // test if we have a specific label for a given code.
    foreach ($codesLabels as $code => $label)
    {
        if ($response->getStatusCode() == $code)
        {
            $state = $label;
            break;
        }
    }

    echo '<h1>' . $state . ' ' . $response->getStatusCode() . '</h1>';
    echo '<pre>' . oneall_pretty_json::format_string($response->getBody()) . '</pre>';
}
