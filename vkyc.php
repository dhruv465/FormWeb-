<?php
include 'dbconnection.php';

// SQL query to fetch data from your database
$sql = 'SELECT * FROM users';
$result = $conn->query($sql);

include 'delete.php';

?>

<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FormApp Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/css/tailwind.output.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="./assets/js/init-alpine.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>

    <script src="./assets/js/style.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Include Tailwind CSS and jQuery libraries -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">

    <!-- Import tailwind css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Desktop sidebar -->
        <aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
            <div class="py-4 text-gray-500 dark:text-gray-400">
                <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
                    FormApp
                </a>
                <ul class="mt-6">
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="index.php">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            <span class="ml-4">Dashboard</span>
                        </a>
                    </li>
                </ul>
                <ul>
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="forms.php">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                            </svg>
                            <span class="ml-4">Register New User</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="upload.php">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                            <span class="ml-4">Upload Data</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="export.php">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                            </svg>
                            <span class="ml-4">Export Data</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100" href="vkyc.php">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                            </svg>
                            <span class="ml-4">Vkyc Bucket</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- Mobile sidebar -->
        <!-- Backdrop -->
        <div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
        <aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden" x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu" @keydown.escape="closeSideMenu">
            <div class="py-4 text-gray-500 dark:text-gray-400">
                <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
                    FormApp
                </a>

                <ul class="mt-6">
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="index.php">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            <span class="ml-4">Dashboard</span>
                        </a>
                    </li>
                </ul>
                <ul>
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="forms.php">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                            </svg>
                            <span class="ml-4">Register New User</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="upload.php">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                            <span class="ml-4">Upload Data</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="export.php">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                            </svg>
                            <span class="ml-4">Export Data</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100" href="vkyc.php">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                            </svg>
                            <span class="ml-4">Vkyc Bucket</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="flex flex-col flex-1 w-full">
            <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
                <div class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300">
                    <!-- Mobile hamburger -->
                    <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple" @click="toggleSideMenu" aria-label="Menu">
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div class="flex justify-center flex-1 lg:mr-32">

                    </div>

                    <script>
                        $(document).ready(function() {
                            $("#search").keyup(function() {
                                let searchText = $(this).val();
                                if (searchText != '') {
                                    $.ajax({
                                        url: 'vkycSearch.php',
                                        method: 'post',
                                        data: {
                                            query: searchText
                                        },
                                        success: function(response) {
                                            $("#search-results").html(response);
                                        }
                                    });
                                } else {
                                    $("#search-results").html('');
                                }
                            });
                        });
                    </script>

                    <ul class="flex items-center flex-shrink-0 space-x-6">
                        <!-- Theme toggler -->
                        <li class="flex">
                            <button class="rounded-md focus:outline-none focus:shadow-outline-purple" @click="toggleTheme" aria-label="Toggle color mode">
                                <template x-if="!dark">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                                    </svg>
                                </template>
                                <template x-if="dark">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
                                    </svg>
                                </template>
                            </button>
                        </li>

                        </li>
                        <!-- Profile menu -->
                        <li class="relative">
                            <button class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none" @click="toggleProfileMenu" @keydown.escape="closeProfileMenu" aria-label="Account" aria-haspopup="true">
                                <img class="object-cover w-8 h-8 rounded-full" src="https://img.freepik.com/free-psd/3d-illustration-human-avatar-profile_23-2150671142.jpg?w=740&t=st=1696344988~exp=1696345588~hmac=a7e8d545403cf1911749ba50ee7db3395893bd0a603f2e090ae6f46b1015c6ab" alt="" aria-hidden="true" />
                            </button>
                            <template x-if="isProfileMenuOpen">
                                <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click.away="closeProfileMenu" @keydown.escape="closeProfileMenu" class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700" aria-label="submenu">

                                    <li class="flex">
                                        <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="#">
                                            <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                                <path d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                                </path>
                                            </svg>
                                            <span>Log out</span>
                                        </a>
                                    </li>
                                </ul>
                            </template>
                        </li>
                    </ul>
                </div>
            </header>
            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Vkyc Bucket
                    </h2>

                    <form action="" method="GET" id="ResetFilter">
                        <div class="flex">
                            <div class="relative max-w-sm mr-4" required>
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input datepicker datepicker-autohide datepicker-buttons datepicker-format="yyyy/mm/dd" name="date" required value="<?php echo isset($_GET['date']) == true ? $_GET['date'] : ''; ?>" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500" placeholder="Select date">
                            </div>
                            <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your Email</label>
                            <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border-0 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">
                                All categories <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg></button>
                            <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-48 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                                    <select name="ipa_status" required class="w-32 ml-6 outline-none hover:bg-gray-200 border-none flex-shrink-0 z-10 inline-flex items-center py-2 px-2 text-sm font-medium dark:text-gray-300 form-select focus:border-none focus:outline-purple focus:shadow-outline-purple dark:focus:shadow-outline-purple">
                                        <option value="" disabled selected>IPA Status</option>
                                        <option value="declined" <?php echo isset($_GET['ipa_status']) == true ? ($_GET['ipa_status'] == 'declined' ? 'selected' : '') : ''; ?>>
                                            Declined
                                        </option>
                                        <option value="approved" <?php echo isset($_GET['ipa_status']) == true ? ($_GET['ipa_status'] == 'approved' ? 'selected' : '') : ''; ?>>
                                            Approved
                                        </option>
                                        <option value="incomplete" <?php echo isset($_GET['ipa_status']) == true ? ($_GET['ipa_status'] == 'incomplete' ? 'selected' : '') : ''; ?>>
                                            Incomplete
                                        </option>
                                    </select>
                                    <select name="office_name" required class="w-32 ml-6 mt-2 outline-none hover:bg-gray-200 border-none flex-shrink-0 z-10 inline-flex items-center py-2 px-2 text-sm font-medium dark:text-gray-300 form-select focus:border-none focus:outline-purple focus:shadow-outline-purple dark:focus:shadow-outline-purple">
                                        <option value="" disabled selected>Office Name</option>
                                        <option value="gt1" <?php echo isset($_GET['office_name']) == true ? ($_GET['office_name'] == 'gt1' ? 'selected' : '') : ''; ?>>
                                            GT1
                                        </option>
                                        <option value="gt2" <?php echo isset($_GET['office_name']) == true ? ($_GET['office_name'] == 'gt2' ? 'selected' : '') : ''; ?>>
                                            GT2
                                        </option>
                                        <option value="gt3" <?php echo isset($_GET['office_name']) == true ? ($_GET['office_name'] == 'gt3' ? 'selected' : '') : ''; ?>>
                                            GT3
                                        </option>
                                        <option value="gt4" <?php echo isset($_GET['office_name']) == true ? ($_GET['office_name'] == 'gt4' ? 'selected' : '') : ''; ?>>
                                            GT4
                                        </option>
                                    </select>
                                    <select name="application_status" required class="w-32 ml-6 mt-2 outline-none hover:bg-gray-200 border-none flex-shrink-0 z-10 inline-flex items-center py-2 px-2 text-sm font-medium dark:text-gray-300 form-select focus:border-none focus:outline-purple focus:shadow-outline-purple dark:focus:shadow-outline-purple">
                                        <option value="" disabled selected>App's Status</option>
                                        <option value="complete" <?php echo isset($_GET['application_status']) == true ? ($_GET['application_status'] == 'complete' ? 'selected' : '') : ''; ?>>
                                            Complete
                                        </option>
                                        <option value="Incomplete" <?php echo isset($_GET['application_status']) == true ? ($_GET['application_status'] == 'Incomplete' ? 'selected' : '') : ''; ?>>
                                            Incomplete
                                        </option>
                                    </select>
                                </ul>
                            </div>
          
                            <div class="relative w-1/2">
                                <input id="search" class="w-full pl-8 pr-2 h-full text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-r-lg dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white  focus:outline-none ring-purple-600  form-input" type="text" placeholder="Search for Data" aria-label="Search" />
                                <button type="submit" class="absolute top-0 right-0 p-2.5  text-sm font-medium h-full text-white rounded-r-lg transition-colors duration-150 bg-purple-600 border border-transparent active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple ">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                    <span class="sr-only">Search</span>
                                </button>
                                
                            </div>
                             <a href="vkyc.php">
                                    <button name="export_data_btn" type="reset" data-te-ripple-init data-te-ripple-color="light" class="ripple-btn ml-6 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple px-4 py-2 rounded" data-aos="fade-up" data-aos-duration="3000">
                                        Reset
                                    </button>
                                </a>
                               
                            <!-- <div class="relative  ml-16">
                                <a href="vkyc.php">
                                    <button type="submit" class="absolute top-0 right-0 p-2.5  text-sm font-medium h-full text-white rounded-lg transition-colors duration-150 bg-purple-600 border border-transparent active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple ">

                                        <svg class="w-4 h-4 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                                        </svg>
                                        <span class="sr-only">trash-bin</span>
                                    </button>
                                </a>
                            </div> -->

                        </div>
                    </form>
                    <!-- component -->
                    <div class="overflow-x-auto">
                        <div class="w-full lg:w-5/6">
                            <div class="bg-white shadow-md rounded ml-8 my-6">
                                <?php
                                include 'dbconnection.php';

// Function to validate input data
function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

// Number of rows to display per page
$rowsPerPage = 10;

// Your code to fetch all data
$resultAll = mysqli_query($conn, 'SELECT * FROM users ORDER BY id DESC');

// Your code to fetch filtered data
if (isset($_GET['date']) && $_GET['date'] != '' && isset($_GET['ipa_status']) && $_GET['ipa_status'] != '') {
    $date = validate($_GET['date']);
    $ipa_status = validate($_GET['ipa_status']);
    $office_name = isset($_GET['office_name']) ? validate($_GET['office_name']) : '';
    $application_status = isset($_GET['application_status']) ? validate($_GET['application_status']) : '';
    // Use prepared statements to prevent SQL injection
    $sql = 'SELECT * FROM users WHERE created_at=? AND ipa_status=? AND application_status=?';

    // Add office_name to the SQL query if it's provided
    if (!empty($office_name)) {
        $sql .= ' AND office_name=?';
    }

    $sql .= ' ORDER BY id DESC';

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssss', $date, $ipa_status, $office_name, $application_status);
    $stmt->execute();
    $resultFiltered = $stmt->get_result();
} else {
    $resultFiltered = $resultAll; // Display all data if no filter is applied
}

// Number of rows to display based on whether it's filtered or not
$totalRows = $resultFiltered->num_rows;

// Calculate the total number of pages
$totalPages = ceil($totalRows / $rowsPerPage);

// Get the current page from the URL parameter or set it to 1
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

// Calculate the SQL LIMIT clause for pagination
$offset = ($page - 1) * $rowsPerPage;

// Your code to fetch data with pagination
if (isset($_GET['date']) && $_GET['date'] != '' && isset($_GET['ipa_status']) && $_GET['ipa_status'] != '' && isset($_GET['office_name']) && $_GET['office_name'] != '' && isset($_GET['application_status']) && $_GET['application_status'] != '') {
    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare('SELECT * FROM users WHERE created_at=? AND ipa_status=? AND office_name=?  AND application_status=? ORDER BY id DESC LIMIT ?, ?');
    $stmt->bind_param('sssssi', $date, $ipa_status, $office_name, $application_status, $offset, $rowsPerPage);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $sql = "SELECT * FROM users ORDER BY id DESC LIMIT $offset, $rowsPerPage";
    $result = $conn->query($sql);
}

?>

                                <!-- Your HTML code for rendering the table -->
                                <table id="dataTable" class="min-w-max w-full table-auto">
                                    <thead>
                                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                            <th class="py-3 px-6 text-left">#</th>
                                            <th class="py-3 px-6 text-left">Office Name</th>
                                            <th class="py-3 px-6 text-left">Mobile No</th>
                                            <th class="py-3 px-6 text-center">Vkyc Link</th>
                                            <th class="py-3 px-6 text-center">Application Status</th>
                                            <th class="py-3 px-6 text-center">IPA Status</th>
                                            <th class="py-3 px-6 text-center">Date</th>
                                            <th class="py-3 px-6 text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="search-results" class="text-gray-600 text-sm font-light">
                                        <?php
        if ($result->num_rows > 0) {
            // Loop through each row in the result
            while ($row = $result->fetch_assoc()) {
                echo '<tr id="row-'.$row['id'].'" class="border-b w-full border-gray-200 hover:bg-gray-100">';
                // Output your table data for each row
                echo '<td class="py-3 px-6 text-left">'.$row['id'].'</td>';
                echo '<td class="py-3 px-6 text-left whitespace-nowrap">';
                echo '<div class="flex items-center">';
                echo '<span class="font-medium">'.$row['office_name'].'</span>';
                echo '</div>';
                echo '</td>';
                echo '<td class="py-3 px-6 text-left">';
                echo '<div class="flex items-center">';
                echo '<span>'.$row['mobile_no'].'</span>';
                echo '</div>';
                echo '</td>';
                echo '<td class="py-3 px-6 text-center">';
                echo '<div class="flex items-center justify-center">';
                echo $row['vkyc_link'];
                echo '</div>';
                echo '</td>';
                echo '<td class="py-3 px-6 text-center">';
                echo '<span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">'.$row['application_status'].'</span>';
                echo '</td>';
                echo '<td class="py-3 px-6 text-center">';
                echo '<span class="text-orange-700 bg-orange-100 py-1 px-3 rounded-full text-xs">'.$row['ipa_status'].'</span>';
                echo '</td>';
                echo '<td class="py-3 px-6 text-center">';
                echo '<span class="px-4 py-3 text-sm">'.$row['created_at'].'</span>';
                echo '</td>';
                echo '<td class="py-3 px-6 text-center">';
                echo '<div class="flex item-center justify-center">';
                echo '<div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer">';
                echo '<a href="view.php?viewid='.$row['id'].'" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer">';
                echo '<svg xmlns="http://www.w3.org/2000/svg" class="view" title="View" type="button" fill="none" viewBox="0 0 24 24" stroke="currentColor">';
                echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />';
                echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />';
                echo '</svg>';
                echo '</a>';
                echo '</div>';

                echo '<a href="edit.php?editid='.$row['id'].'" title="Edit" class="edit w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer">';
                echo '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">';
                echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />';
                echo '</svg>';
                echo '</a>';

                // echo '<a href="dashboard.php?delid=' . $row['id'] . '"  class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer">';
                // echo '    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">';
                // echo '        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />';
                // echo '    </svg>';
                // echo '</a>';
                echo '</div>';
                echo '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>
                                    <td colspan="8" class="py-6 px-6 text-center font-semibold">NO Data Inserted Yet</td>
                                </tr>';
        }
?>
                                    </tbody>
                                </table>

                                <?php
                                // Output the pagination links
                                echo '<nav aria-label="Page navigation example" class="flex-end  p-2.5">';
echo '<ul class="flex items-center -space-x-px h-8 text-sm">';

// Previous page link
echo '<li>';
if ($page > 1) {
    echo '<a href="vkyc.php?page='.($page - 1).'" class="flex items-center justify-center px-3 h-8 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">';
    echo '<span class="sr-only">Previous</span>';
    echo '<svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">';
    echo '<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>';
    echo '</svg>';
    echo '</a>';
}
echo '</li>';

// Page links
for (
    $i = 1;
    $i <= $totalPages;
    ++$i
) {
    echo '<li>';
    echo '<a href="vkyc.php?page='.$i.'" class="flex items-center justify-center px-3 h-8 leading-tight ';
    if ($i == $page) {
        echo 'text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white';
    } else {
        echo 'text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white';
    }
    echo '">'.$i.'</a>';
    echo '</li>';
}

// Next page link
echo '<li>';
if ($page < $totalPages) {
    echo '<a href="vkyc.php?page='.($page + 1).'" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">';
    echo '<span class="sr-only">Next</span>';
    echo '<svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">';
    echo '<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>';
    echo '</svg>';
    echo '</a>';
}
echo '</li>';

echo '</ul>';
echo '</nav>';
?>


                            </div>

                        </div>
                    </div>
                </div>
        </div>
        </main>
    </div>
    </div>
    <script>
        function searchData() {
            var input = document.getElementById('searchInput').value.toLowerCase();
            var rows = document.querySelectorAll('.data-row');

            rows.forEach(function(row) {
                var data = row.innerText.toLowerCase();
                if (data.includes(input)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#updateButton').click(function(e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: 'update.php', // Replace with the actual PHP script URL
                    data: $('#insertForm').serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            // Display success message
                            $("#alert-message").html('<div class="mb-4 rounded-lg bg-success-100 p-2 text-base text-success-700">' + response.message + '</div>').removeClass('hidden');

                            // Reset form fields
                            $('#insertForm')[0].reset();

                            // Hide success message after 3 seconds (3000 milliseconds)
                            setTimeout(function() {
                                $("#alert-message").addClass('hidden');
                            }, 3000);
                        } else {
                            // Display error message
                            $("#alert-message").html('<div class="mb-4 rounded-lg bg-error-100 p-2 text-base text-error-700">' + response.message + '</div>').removeClass('hidden');
                        }
                    }
                });
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</body>

</html>