<?php
session_start();

if (!isset($_SESSION['data'])) {
    header("Location: form.php");
    exit;
}

$data = $_SESSION['data'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Hasil Input</title>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
<div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-3xl">
    <h2 class="text-2xl font-bold mb-6 text-center text-indigo-600">Hasil Input Data</h2>
    <div class="overflow-x-auto">
        <table class="table-auto w-full mb-8 border-collapse border border-gray-300">
            <tbody>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium">Nama</th>
                    <td class="border border-gray-300 px-4 py-2 text-sm"><?= htmlspecialchars($data['nama']) ?></td>
                </tr>
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium">NIM</th>
                    <td class="border border-gray-300 px-4 py-2 text-sm"><?= htmlspecialchars($data['nim']) ?></td>
                </tr>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium">Prodi</th>
                    <td class="border border-gray-300 px-4 py-2 text-sm"><?= htmlspecialchars($data['prodi']) ?></td>
                </tr>
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium">Asal</th>
                    <td class="border border-gray-300 px-4 py-2 text-sm"><?= htmlspecialchars($data['asal']) ?></td>
                </tr>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium">Browser</th>
                    <td class="border border-gray-300 px-4 py-2 text-sm"><?= htmlspecialchars($data['browser']) ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <h3 class="text-xl font-semibold mb-4 text-indigo-600">Isi File</h3>
    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-indigo-600 text-white">
                    <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium">Baris</th>
                    <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium">Isi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['fileContent'] as $index => $line): ?>
                    <tr class="<?= $index % 2 === 0 ? 'bg-gray-200' : '' ?>">
                        <td class="border border-gray-300 px-4 py-2 text-sm"><?= $index + 1 ?></td>
                        <td class="border border-gray-300 px-4 py-2 text-sm"><?= htmlspecialchars($line) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <div class="mt-6 text-center">
        <a href="form.php" class="py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Kembali ke Form</a>
    </div>
</div>
</body>
</html>
