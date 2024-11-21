<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></link>
    <script>
        function validateForm() {
            const nama = document.forms["dataForm"]["nama"].value;
            const nim = document.forms["dataForm"]["nim"].value;
            const prodi = document.forms["dataForm"]["prodi"].value;
            const asal = document.forms["dataForm"]["asal"].value;
            const file = document.forms["dataForm"]["file"].files[0];

            if (nama.length < 3) {
                alert("Nama harus terdiri dari minimal 3 karakter.");
                return false;
            }
            if (!/^\d{9}$/.test(nim)) {
                alert("NIM harus berupa angka dengan panjang 9 karakter.");
                return false;
            }
            if (prodi === "") {
                alert("Prodi tidak boleh kosong.");
                return false;
            }
            if (asal.length < 3) {
                alert("Asal harus terdiri dari minimal 3 karakter.");
                return false;
            }
            if (!file) {
                alert("File harus diunggah.");
                return false;
            }
            if (file.size > 1024 * 1024) {
                alert("Ukuran file tidak boleh lebih dari 1MB.");
                return false;
            }
            if (file.type !== "text/plain") {
                alert("File harus berupa teks.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Formulir Input Data</h2>
        <form class="space-y-4" name="dataForm" action="process.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama:</label>
                <input type="text" id="nama" name="nama" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>
            <div>
                <label for="nim" class="block text-sm font-medium text-gray-700">NIM:</label>
                <input type="text" id="nim" name="nim" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>
            <div>
                <label for="prodi" class="block text-sm font-medium text-gray-700">Prodi:</label>
                <input type="text" id="prodi" name="prodi" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>
            <div>
                <label for="asal" class="block text-sm font-medium text-gray-700">Asal:</label>
                <input type="text" id="asal" name="asal" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>
            <div>
                <label for="file" class="block text-sm font-medium text-gray-700">File Upload (teks):</label>
                <input type="file" id="file" name="file" accept=".txt" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" required>
            </div>
            <div class="flex justify-center">
                <button type="submit" class="w-full py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
