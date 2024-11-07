<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Belajar PWEB - Week 11</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-100 font-poppins">
    <div class="container mx-auto flex justify-center items-center h-screen">
        <div class="w-full max-w-sm bg-white p-6 rounded-lg shadow-lg">
            <div class="text-center mb-4">
                <h5 class="text-xl text-[#112D55] font-semibold mb-2">
                    <span class="text-3xl font-bold">Masuk</span>
                </h5>
            </div>

            <form id="loginForm" class="space-y-4">
                <div>
                    <input type="text" id="Username" name="Username" placeholder="Nama Pengguna"
                        class="w-full p-3 border border-gray-300 rounded-md text-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#112D55] focus:border-transparent">
                </div>
                <div>
                    <input type="password" id="Password" name="Password" placeholder="Kata Sandi"
                        class="w-full p-3 border border-gray-300 rounded-md text-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#112D55] focus:border-transparent">
                </div>
                <button type="button" id="btnLoginAdmin"
                        class="w-full py-3 bg-[#112D55] text-white font-semibold rounded-md hover:bg-gray-700 focus:ring-4 focus:ring-blue-300" onclick="window.location.href='{{ route('dashboard') }}'">
                    Masuk
                </button>
            </form>
        </div>
    </div>
</body>
</html>
