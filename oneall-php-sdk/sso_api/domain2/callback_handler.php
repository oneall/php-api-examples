<?php
/**
 * Copyright 2011-2017 OneAll, LLC.
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
include '../../../bootstrap.php';

// init sso php client
$connectionApi = new \Oneall\Api\Apis\Connection($client);

// Connection API \ Read connection details
// http://docs.oneall.com/api/resources/connections/read-connection-details/

?>
	<h2><a href="check_sso_session.php">Click here to re-check the SSO session</a></h2>
<?php 

// Get the details of this connection
if ( ! empty ($_POST['connection_token']) && ! empty ($_POST['oa_action']) && $_POST['oa_action'] == 'single_sign_on')
{
	// Make Request
    $result = $connectionApi->get($_POST['connection_token']);
	
	// Success
	if ($result->getStatusCode() == 200)
	{
		echo "<h1>Success " . $result->getStatusCode() . "</h1>";
		echo "<h2>The following user data has been received through SSO</h2>";
		echo "<pre>" . oneall_pretty_json::format_string ($result->getBody()) . "</pre>";
	}
	// Error
	else
	{
		echo "<h1>Error " . $result->getStatusCode() . "</h1>";
		echo "<pre>" . oneall_pretty_json::format_string ($result->getBody()) . "</pre>";
	}
}
else
{
	echo "<h1>Error (Invalid Request)</h1>";
	echo "<pre>" . print_r($_REQUEST, true) . "</pre>";
}
