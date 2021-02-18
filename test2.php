<?php
// Store the cipher method 
$ciphering = "AES-128-CTR"; 
$u = $_GET["u"];

// Use OpenSSl Encryption method 
$iv_length = openssl_cipher_iv_length($ciphering); 
$options = 0; 
// Non-NULL Initialization Vector for encryption 
$encryption_iv = '1234567891011121'; 

// Store the encryption key 
$encryption_key = "GeeksforGeeks"; 
// Non-NULL Initialization Vector for decryption 
$decryption_iv = '1234567891011121'; 

// Store the decryption key 
$decryption_key = "GeeksforGeeks"; 
// Use openssl_decrypt() function to decrypt the data 
$decryption=openssl_decrypt ($u, $ciphering, 
		$decryption_key, $options, $decryption_iv); 

// Display the decrypted string 
echo $decryption; 

?>