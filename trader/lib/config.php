<?php 
$config = new StdClass();
$consumer_key     = 'Jqup4HFa4khobE4Avl7sSeVUKB2HH5GHlY1QbIzr';
$consumer_secret  = 'XYCpQlDExKR2u6Oz7jU7h69TirwMpJ9kDZ6wlkUK';

define('CONSUMER_KEY',      $consumer_key);
define('CONSUMER_SECRET',   $consumer_secret);

$config->secret = array(
'consumer_key'      => CONSUMER_KEY,
'consumer_secret'   => CONSUMER_SECRET
);
$config->oauth_creds = array(
'access_token'     => 'w68seHlbKGkaEsMhmKgN2gpdgTxb9suOn73JCoXI ',
'access_secret'    => 'oKUVS2KYPdGacAUfgs7ztsKpuieXNSr7paI1Quzi'
);

/*
Consumer Key:       Jqup4HFa4khobE4Avl7sSeVUKB2HH5GHlY1QbIzr 
Consumer Secret:    XYCpQlDExKR2u6Oz7jU7h69TirwMpJ9kDZ6wlkUK 

OAuth Token:        w68seHlbKGkaEsMhmKgN2gpdgTxb9suOn73JCoXI 
OAuth Token Secret: oKUVS2KYPdGacAUfgs7ztsKpuieXNSr7paI1Quzi
*/
