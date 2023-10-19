// Generate a private and public key pair
$res = openssl_pkey_new(array(
"private_key_bits" => 2048,
"private_key_type" => OPENSSL_KEYTYPE_RSA,
));

// Extract the private key
openssl_pkey_export($res, $privateKey);

// Extract the public key
$publicKey = openssl_pkey_get_details($res)['key'];

// Data to be encrypted
$data = 'This is the data to be encrypted';

// Encrypt the data using the public key
openssl_public_encrypt($data, $encryptedData, $publicKey);

// Decrypt the data using the private key
openssl_private_decrypt($encryptedData, $decryptedData, $privateKey);

echo 'Original data: ' . $data . "\n";
echo 'Encrypted data: ' . $encryptedData . "\n";
echo 'Decrypted data: ' . $decryptedData . "\n";
