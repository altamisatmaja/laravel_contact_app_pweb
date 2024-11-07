<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="container mx-auto flex justify-center items-center h-screen">
        <div class="w-full max-w-sm bg-white p-6 rounded-lg shadow-lg">
            <div class="text-center mb-4">
                <h5 class="text-xl text-[#112D55] font-semibold mb-2">
                    <span class="text-3xl font-bold">Selamat Datang @yield('role')</span>
                </h5>
            </div>

            <button type="submit" id="btnLogout" class="w-full py-3 bg-red-600 text-white font-semibold rounded-md hover:bg-red-700 focus:ring-4 focus:ring-red-300">
                Logout
            </button>
        </div>
    </div>
</body>

</html>
