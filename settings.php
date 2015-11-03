<?php
$update_free_access = FALSE;

$local_settings = dirname(__FILE__) . '/settings.local.php';
if (file_exists($local_settings)) {
  require_once($local_settings);
}


// MongoDB Settings
if (!empty($relationships['mongodb'][0])) {

	$mongodb_connection = json_decode(base64_decode(getenv('PLATFORM_RELATIONSHIPS')))->mongodb[0];
	
    // Omit USER:PASS@ if Mongo isn't configured to use authentication.
	$mongo_db_url = sprintf('mongodb://%s:%s@%s:%s/%s',  
		$mongodb_connection->username,
		$mongodb_connection->password,
		$mongodb_connection->host,
		$mongodb_connection->port,
		$mongodb_connection->path
	);
	
    $conf['mongodb_connections'] = array(
      // Connection name/alias
      'default' => array(
        'host' => $mongo_db_url,
        // Database name
        'db' => $mongodb_connection->path,
      ),
    );
}
