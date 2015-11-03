<?php
$update_free_access = FALSE;

$local_settings = dirname(__FILE__) . '/settings.local.php';
if (file_exists($local_settings)) {
  require_once($local_settings);
}

// MongoDB Settings
if (!empty($relationships['mongodb'][0])) {
  $mongo_db_url = sprintf('mongodb://%s:%s@%s:%s/%s',  
    $relationships['mongodb'][0]['username'],
    $relationships['mongodb'][0]['password'],
    $relationships['mongodb'][0]['host'],
    $relationships['mongodb'][0]['port'],
    $relationships['mongodb'][0]['path']
  );

  $conf['mongodb_connections'] = array(
    'default' => array(
      'host' => $mongo_db_url,
      'db' => $relationships['mongodb'][0]['path'],
    ),
  );
}
