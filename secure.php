<?php



$hello = "this is hello";
$decryption_iv = random_bytes($iv_length); 

// Store the decryption key 
$decryption_key = openssl_digest(php_uname(), 'MD5', TRUE); 

?>