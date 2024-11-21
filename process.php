<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];
    $asal = $_POST['asal'];
    $file = $_FILES['file'];

    $errors = [];

    // Validasi input teks
    if (strlen($nama) < 3) $errors[] = "Nama harus minimal 3 karakter.";
    if (!is_numeric($nim) || strlen($nim) !== 9) $errors[] = "NIM harus berupa angka dengan panjang 9 karakter.";
    if (empty($prodi)) $errors[] = "Prodi tidak boleh kosong.";
    if (strlen($asal) < 3) $errors[] = "Asal harus minimal 3 karakter.";

    // Validasi file
    if ($file['size'] == 0) $errors[] = "File harus diunggah.";
    if ($file['size'] > 1024 * 1024) $errors[] = "Ukuran file tidak boleh lebih dari 1MB.";
    if (mime_content_type($file['tmp_name']) !== "text/plain") $errors[] = "File harus berupa teks.";

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("Location: form.php");
        exit;
    }

    // Membaca isi file
    $fileContent = file($file['tmp_name'], FILE_IGNORE_NEW_LINES);

    // Menyimpan data ke sesi
    $_SESSION['data'] = [
        'nama' => $nama,
        'nim' => $nim,
        'prodi' => $prodi,
        'asal' => $asal,
        'fileContent' => $fileContent,
        'browser' => $_SERVER['HTTP_USER_AGENT']
    ];

    header("Location: result.php");
    exit;
}
?>
