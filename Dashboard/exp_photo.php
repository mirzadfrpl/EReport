<?php

include_once ('../utils/connection.php');
global $conn;
$query = "SELECT * FROM photos";
$result = mysqli_query($conn, $query);

$rows = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<nav class="bg-blue-300 border-gray-200 mt-10 m-32 rounded-xl">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="https://i.fbcd.co/products/resized/resized-750-500/563d0201e4359c2e890569e254ea14790eb370b71d08b6de5052511cc0352313.jpg" class="h-8" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap">E-Photo</span>
        </a>
        <button data-collapse-toggle="navbar-multi-level" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-multi-level" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-multi-level">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border  rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                <li>
                    <a href="../Dashboard/user_dash.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0" aria-current="page">Home</a>
                </li>
               
                <li>
                    <a href="../Dashboard/exp_photo.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Explore</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Favorite</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0"></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

        
    <div class="px-6 py-8">
      <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-3xl p-8 mb-5">
          <h1 class="text-3xl font-bold mb-10">Website E-Photo</h1>
          <div class="flex items-center justify-between">
            <div class="flex items-stretch">
              <div class="text-gray-400 text-xs">Website<br>E-Photo</div>
              <div class="h-100 border-l mx-4"></div>
              <div class="flex flex-nowrap -space-x-3">
                <div class="h-9 w-9">
                  <img class="object-cover w-full h-full" src="https://i.fbcd.co/products/resized/resized-750-500/563d0201e4359c2e890569e254ea14790eb370b71d08b6de5052511cc0352313.jpg">
                </div>
              </div>
            </div>
          </div>
          <hr class="my-10">

          <div class="grid grid-cols-3 gap-x-5">
          <?php 
          foreach ($rows as $photo):
          ?>
          <div class="w-full max-w-xs overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800 mb-10">
            <div class="m-10">
            <img class="object-cover w-full h-56" alt="" src="<?= $photo ['photo_path'] ?>">
            <div class="py-5 text-center">
                <a href="#" class="block text-xl font-bold text-gray-800 dark:text-white" tabindex="0" role="link"><?= $photo ['photo_name'] ?></a>
                <span class="text-sm text-gray-700 dark:text-gray-200"><?= $photo ['description'] ?></span>
                <br>
                <span class="text-sm text-gray-700 dark:text-gray-200"><?= $photo ['uploaded_at'] ?></span>
            </div>
            </div>
            </div>
            <?php endforeach ?>
          </div>
          </div>
        </div>
      </div>

      <footer class="bg-white rounded-lg shadow m-4 mt-40">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="https://flowbite.com/" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                <img src="https://i.fbcd.co/products/resized/resized-750-500/563d0201e4359c2e890569e254ea14790eb370b71d08b6de5052511cc0352313.jpg" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap">E-Photo</span>
            </a>
            <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0">
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">About</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
                </li>
                <li>
                    <a href="#" class="hover:underline">Contact</a>
                </li>
            </ul>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />
        <span class="block text-sm text-gray-500 sm:text-center">© 2024 <a href="https://flowbite.com/" class="hover:underline">E-Photo™</a>. All Rights Reserved.</span>
    </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>