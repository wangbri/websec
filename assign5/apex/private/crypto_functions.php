<?php

// Symmetric Encryption

// Cipher method to use for symmetric encryption
const CIPHER_METHOD = 'AES-256-CBC';

function key_encrypt($string, $key, $cipher_method=CIPHER_METHOD) {
  $key = padKey($key);
  $iv = createAESvector();
  $encrypted = openssl_encrypt($string, CIPHER_METHOD, $key, OPENSSL_RAW_DATA, $iv);
  $message = $iv . $encrypted;
  return base64_encode($message); 
}

function padKey($key) {
  return str_pad($key, 32, '*');
}

function createAESvector() {
  $iv_length = openssl_cipher_iv_length(CIPHER_METHOD);
  $iv = openssl_random_pseudo_bytes($iv_length);
  return $iv;
}       

function key_decrypt($string, $key, $cipher_method=CIPHER_METHOD) {
 $key = padKey($key);
 $iv_with_ciphertext = base64_decode($string);

 $iv_length = openssl_cipher_iv_length(CIPHER_METHOD);
 $iv = substr($iv_with_ciphertext, 0, $iv_length);
 $ciphertext = substr($iv_with_ciphertext, $iv_length);

 $plaintext = openssl_decrypt($ciphertext, CIPHER_METHOD, $key, OPENSSL_RAW_DATA, $iv);
 return $plaintext;
}


// Asymmetric Encryption / Public-Key Cryptography

// Cipher configuration to use for asymmetric encryption
const PUBLIC_KEY_CONFIG = array(
    "digest_alg" => "sha512",
    "private_key_bits" => 2048,
    "private_key_type" => OPENSSL_KEYTYPE_RSA,
);

function generate_keys($config=PUBLIC_KEY_CONFIG) {
  $keys = array('private' => "",
                'public' => "");
  $resource = openssl_pkey_new($config);
  openssl_pkey_export($resource, $private_key);
  
  $key_details = openssl_pkey_get_details($resource);
  $public_key = $key_details['key'];
 
  $keys['private'] = $private_key;
  $keys['public'] = $public_key;
 
  return $keys;
}

function pkey_encrypt($string, $public_key) {
  openssl_public_encrypt($string, $encrypted_message, $public_key);
  return base64_encode($encrypted_message); 
}

function pkey_decrypt($string, $private_key) {
  openssl_private_decrypt(base64_decode($string), $decrypted_message, $private_key);
  return $decrypted_message; 
}

// Digital signatures using public/private keys

function create_signature($data, $private_key) {
  openssl_sign($data, $raw_signature, $private_key);
  return base64_encode($raw_signature);
}

function verify_signature($data, $signature, $public_key) {
  $raw_signature = base64_decode($signature);
  $result = openssl_verify($data, $raw_signature, $public_key);
  return $result;
}

?>
