<?php
// Koneksi Database
$koneksi = mysqli_connect("localhost", "root", "", "phpdasar");

// membuat fungsi query dalam bentuk array
function query($query)
{
    // Koneksi database
    global $koneksi;

    $result = mysqli_query($koneksi, $query);

    // membuat varibale array
    $rows = [];

    // mengambil semua data dalam bentuk array
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// Membuat fungsi tambah
function tambah($data)
{
    global $koneksi;

    $customer = htmlspecialchars($data['customer']);
    $nama = htmlspecialchars($data['nama']);
    $credit = enkripsi(htmlspecialchars($data['credit']));
    $phone = htmlspecialchars($data['phone']);
    $company = htmlspecialchars($data['company']);
    $country = htmlspecialchars($data['country']);

    $credit = mysqli_real_escape_string($koneksi, $credit);
    $sql = "INSERT INTO siswa VALUES ('$customer','$nama','$credit','$phone','$company','$country')";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi hapus
function hapus($customer)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM siswa WHERE customer = $customer");
    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi ubah
function ubah($data)
{
    global $koneksi;

    $customer = htmlspecialchars($data['customer']);
    $nama = htmlspecialchars($data['nama']);
    $credit = enkripsi(htmlspecialchars($data['credit']));
    $phone = htmlspecialchars($data['phone']);
    $company = htmlspecialchars($data['company']);
    $country = htmlspecialchars($data['country']);

    $credit = mysqli_real_escape_string($koneksi, $credit);
    $sql = "UPDATE siswa SET customer = '$customer', nama = '$nama', credit = '$credit', phone = '$phone', company = '$company', country = '$country' WHERE customer = $customer";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

function enkripsi($data)
{
    $key = "12345678901234567890123456789012";
    $cipher = "AES-256-CBC";
    $options = 0;
    $iv = str_repeat("0", openssl_cipher_iv_length($cipher));

    $encryptedString = openssl_encrypt($data, $cipher, $key, $options, $iv);

    $publicKeyFilePath = 'C:\xampp\htdocs\siswa\key\public.pem';

    // Read the contents of the public key file
    $publicKeyContents = file_get_contents($publicKeyFilePath);

    // Load the public key from the file contents
    $publicKey = openssl_pkey_get_public($publicKeyContents);

    if (!$publicKey) {
        die('Failed to load public key');
    }

    $encryptedData = false;
    if (openssl_public_encrypt($encryptedString, $encryptedData, $publicKey)) {
        // Return value of latest encryption (RSA)
        return $encryptedData;
    } else {
        throw new \Exception('Failed to encrypt with public key');
    }
}

function dekripsi($encryptedData)
{
    // Path to the .pem private key file
    $privateKeyFilePath = 'C:\xampp\htdocs\siswa\key\private.pem';

    // Read the contents of the private key file
    $privateKeyContents = file_get_contents($privateKeyFilePath);

    // Load the private key from the file contents
    $privateKey = openssl_pkey_get_private($privateKeyContents);

    $decryptedRSA = false;
    if (openssl_private_decrypt($encryptedData, $decryptedRSA, $privateKey)) {
        // Return value of latest encryption (RSA)
    } else {
        throw new \Exception('Failed to decrypt with private key');
    }
    

    // Decrypt AES-256
    $key = '12345678901234567890123456789012';
    $cipher = "AES-256-CBC";
    $option = 0;
    $iv = str_repeat('0', openssl_cipher_iv_length($cipher));
    $decryptedAES = openssl_decrypt($decryptedRSA, $cipher, $key, $option, $iv);

    return $decryptedAES;
}