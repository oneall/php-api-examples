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

// Example for a Pingback Handler
// http://docs.oneall.com/api/resources/sharing-analytics/initiate-snapshot/

// This script is used by the example initiate_snapshot_with_pingback.php

// Debugging
$debug = true;
$debug_email = 'debug@oneall.com';

// Raw Result
$result_raw = file_get_contents ('php://input');
if ($debug)
{
	mail ($debug_email, '[OneAll] Snapshot Result Raw', print_r ($result_raw, true));
}

// Decoded Result
$result = json_decode ($result_raw);
if ($debug)
{
	mail ($debug_email, '[OneAll] Snapshot Result Decoded', print_r ($result, true));
}

// Check Result
if (is_object ($result) and property_exists ($result, 'response') and $result->response->request->status->code == 200)
{
	// Read Snapshot Token
	$sharing_analytics_snapshot = $result->response->result->data->sharing_analytics_snapshot->sharing_analytics_snapshot_token;

	// With this token you can now query the details of the snapshot - an example is provided in read_snapshot.php
	if ($debug)
	{
		mail ($debug_email, '[OneAll] Snapshot Ready', 'The snapshot ' . $sharing_analytics_snapshot . ' is ready');
	}
}

?>
