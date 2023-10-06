<?php
include('dbconnection.php');

// Initialize variables
$updateSuccess = false;
$updateError = false;

if (isset($_POST['submit'])) {
    $eid = $_GET['editid'];

    // Update query
    $query = mysqli_query($con, "UPDATE users SET 
                customer_name='$_POST[customer_name]',
                mobile_no='$_POST[mobile_no]',
                alternate_no='$_POST[alternate_no]',
                city='$_POST[city]',
                customer_pan='$_POST[customer_pan]',
                vkyc_link='$_POST[vkyc_link]',
                application_no='$_POST[application_no]',
                application_status='$_POST[application_status]',
                account_incomplete_reason='$_POST[account_incomplete_reason]',
                backend_name='$_POST[backend_name]',
                caller_name='$_POST[caller_name]',
                office_name='$_POST[office_name]',
                mgr_name='$_POST[mgr_name]',
                form_filed_date='$_POST[form_filed_date]',
                surrogate_type='$_POST[surrogate_type]',
                ipa_status='$_POST[ipa_status]',
                pickup_remark='$_POST[pickup_remark]',
                extra2='$_POST[extra2]',
                extra3='$_POST[extra3]'
                WHERE id='$eid'");

    if ($query) {
        $updateSuccess = true;
    } else {
        $updateError = true;
    }
}

?>

<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FormApp Dashboard - Register New User</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/css/tailwind.output.css" />
    <link rel="stylesheet" href="./assets/css/style.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="./assets/js/init-alpine.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Include Tailwind CSS and jQuery libraries -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">

    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Import tailwind css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen}">
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
                                <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                            <span class="ml-4">Dashboard</span>
                        </a>
                    </li>
                </ul>
                <ul>
                    <li class="relative px-6 py-3">
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100" href="forms.php">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                </path>
                            </svg>
                            <span class="ml-4">Register New User</span>
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
                        <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100" href="index.php">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                            <span class="ml-4">Dashboard</span>
                        </a>
                    </li>
                </ul>
                <ul>

                    <li class="relative px-6 py-3">
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="forms.php">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                </path>
                            </svg>
                            <span class="ml-4">Register New User</span>
                        </a>
                    </li>

                </ul>
            </div>
        </aside>
        <div class="flex flex-col flex-1">
            <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
                <div class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300">
                    <!-- Mobile hamburger -->
                    <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple" @click="toggleSideMenu" aria-label="Menu">
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <!-- Search input -->
                    <div class="flex justify-center flex-1 lg:mr-32">
                       
                    </div>

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

            <?php
            $eid = $_GET['editid'];
            $ret = mysqli_query($con, "SELECT * FROM users WHERE id='$eid'");
            $row = mysqli_fetch_array($ret);
            ?>
            <main class="h-full pb-16 overflow-y-auto">

                <div class="container px-6 mx-auto grid">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Update User Details
                    </h2>
                    <?php
                    if ($updateSuccess) {
                        echo '<div class="mb-4 rounded-lg bg-success-100 p-2 text-base text-success-700">You have successfully updated the data</div>';
                        echo "<script type='text/javascript'> setTimeout(function(){ document.location ='index.php'; }, 2000); </script>";
                    } elseif ($updateError) {
                        echo '<div class="mb-4 rounded-lg bg-danger-100 p-2 text-base text-danger-700">Something Went Wrong. Please try again</div>';
                    }
                    ?>
                    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <form method="post">
                            <label class="block text-sm mt-4 mr-4">
                                <span class="text-gray-700 dark:text-gray-400">Customer Name</span>
                                <input type="text" name="customer_name" required class="block mt- w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Jane Doe" value="<?php echo isset($row['customer_name']) ? $row['customer_name'] : ''; ?>" />
                            </label>
                            <label class="block text-sm mt-4">
                                <span class="text-gray-700 dark:text-gray-400">Mobile No</span>
                                <input type="number" name="mobile_no" required class="block mt- w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="+91 98900*****" value="<?php echo isset($row['mobile_no']) ? $row['mobile_no'] : ''; ?>" />
                            </label>
                            <label class="block text-sm mt-4">
                                <span class="text-gray-700 dark:text-gray-400">Alternate No</span>
                                <input type="number" name="alternate_no" required class="block mt- w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="+91 **********" value="<?php echo isset($row['alternate_no']) ? $row['alternate_no'] : ''; ?>" />
                            </label>
                            <label class="block text-sm mt-4">
                                <span class="text-gray-700 dark:text-gray-400">City</span>
                                <input type="text" name="city" required class="block mt- w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Los Engles" value="<?php echo isset($row['city']) ? $row['city'] : ''; ?>" />
                            </label>
                            <label class="block text-sm mt-4">
                                <span class="text-gray-700 dark:text-gray-400">Customer Pan</span>
                                <input type="text" name="customer_pan" required class="block mt- w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="AEDPP80OL" value="<?php echo isset($row['customer_pan']) ? $row['customer_pan'] : ''; ?>" />
                            </label>
                            <label class="block text-sm mt-4">
                                <span class="text-gray-700 dark:text-gray-400">Vkyc Link</span>
                                <input type="text" name="vkyc_link" required class="block mt- w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="https://example.com/" value="<?php echo isset($row['customer_pan']) ? $row['customer_pan'] : ''; ?>" />
                            </label>
                            <label class="block text-sm mt-4">
                                <span class="text-gray-700 dark:text-gray-400">Application No</span>
                                <input type="number" name="application_no" required class="block mt- w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="12465" value="<?php echo isset($row['application_no']) ? $row['application_no'] : ''; ?>" />
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Application Status</span>
                                <select name="application_status" required class="block w-full mt- text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                    <option value="" disabled selected>Select Application Status</option>
                                    <option required>Complete</option>
                                    <option required>Incomplete</option>
                                </select>
                            </label>
                            <div class="mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Account Incomplete Reason</span>
                                <div class="mt-2">
                                    <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                                        <input type="radio" required class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="account_incomplete_reason" value="Otp Issue" />
                                        <span class="ml-2">Otp Issue</span>
                                    </label>
                                    <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                        <input type="radio" required class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="account_incomplete_reason" value="Customer Ringing" />
                                        <span class="ml-2">Customer Ringing</span>
                                    </label>
                                </div>
                            </div>
                            <label class="block text-sm mt-4 mr-4">
                                <span class="text-gray-700 dark:text-gray-400">Backend Name</span>
                                <input type="text" name="backend_name" required class="block mt- w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Jane Doe" value="<?php echo isset($row['backend_name']) ? $row['backend_name'] : ''; ?>" />
                            </label>

                            <label class="block text-sm mt-4 mr-4">
                                <span class="text-gray-700 dark:text-gray-400">Caller Name</span>
                                <input type="text" name="caller_name" required class="block mt- w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="John" value="<?php echo isset($row['caller_name']) ? $row['caller_name'] : ''; ?>" />
                            </label>

                            <label class="block text-sm mt-4 mr-4">
                                <span class="text-gray-700 dark:text-gray-400">Office Name</span>
                                <input type="text" name="office_name" required class="block mt- w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="GT1" value="<?php echo isset($row['office_name']) ? $row['office_name'] : ''; ?>" />
                            </label>

                            <label class="block text-sm mt-4 mr-4">
                                <span class="text-gray-700 dark:text-gray-400">Mgr Name</span>
                                <input type="text" name="mgr_name" required class="block mt- w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="--" value="<?php echo isset($row['mgr_name']) ? $row['mgr_name'] : ''; ?>" />
                            </label>

                            <label class="block text-sm mt-4 mr-4">
                                <span class="text-gray-700 dark:text-gray-400">Form Filed Date</span>
                                <input type="date" name="form_filed_date" required class="block mt- w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Jane Doe" value="<?php echo isset($row['form_filed_date']) ? $row['form_filed_date'] : ''; ?>" />
                            </label>
                            <div class="mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Surrogate Type</span>
                                <div class="mt-2">
                                    <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                                        <input type="radio" required class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="surrogate_type" value="LB" />
                                        <span class="ml-2">LB</span>
                                    </label>
                                    <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                        <input type="radio" required class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="surrogate_type" value="C2C" />
                                        <span class="ml-2">C2C</span>
                                    </label>
                                    <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                        <input type="radio" required class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="surrogate_type" value="Salary" />
                                        <span class="ml-2">Salary</span>
                                    </label>
                                    <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                        <input type="radio" required class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="surrogate_type" value="ITR" />
                                        <span class="ml-2">ITR</span>
                                    </label>
                                </div>
                            </div>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">IPA Status</span>
                                <select name="ipa_status" required class="block w-full mt- text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray 
                                            value=" <?php echo isset($row['ipa_status']) ? $row['ipa_status'] : ''; ?>"">
                                    <option value="" disabled selected>Select IPA Status</option>
                                    <option>Declined</option>
                                    <option>Approved</option>
                                </select>
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Pickup Remark</span>
                                <select name="pickup_remark" required class="block w-full mt- text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray 
                                            value=" <?php echo isset($row['pickup_remark']) ? $row['pickup_remark'] : ''; ?>"">
                                    <option value="" disabled selected>Select Pickup Remark</option>
                                    <option>Bio</option>
                                    <option>Vkyc</option>
                                </select>
                            </label>
                            <label class="block text-sm mt-4 mr-4">
                                <span class="text-gray-700 dark:text-gray-400">Extra2</span>
                                <input type="text" name="extra2" required class="block mt- w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="--" value="<?php echo isset($row['extra2']) ? $row['extra2'] : ''; ?>" />
                            </label>
                            <label class="block text-sm mt-4 mr-4">
                                <span class="text-gray-700 dark:text-gray-400">Extra3</span>
                                <input type="text" name="extra3" required class="block mt- w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="--" value="<?php echo isset($row['extra3']) ? $row['extra3'] : ''; ?>" />
                            </label>
                            <div class="flex justify-end">
                                <button type="submit" name="submit" class="text-white mt-4 transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple px-4 py-2 rounded">
                                    Update
                                </button>
                            </div>
                    </div>
                </div>
            </main>

        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Assuming your form has the ID 'insertForm'
            $('#insertForm').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: 'insert.php', // Replace with the actual PHP script URL
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            // Display success message
                            $("#alert-message").html('<div class="mb-4 rounded-lg bg-success-100 p-2 text-base text-success-700">' + response.message + '</div>').removeClass('hidden');

                            // Reset form fields
                            $('#insertForm')[0].reset();

                            // Hide success message after 3 seconds (3000 milliseconds)
                            setTimeout(function() {
                                $("#alert-message").addClass('hidden').html('');
                            }, 3000);
                        } else {
                            // Display error message
                            $("#alert-message").html('<div class="mb-4 rounded-lg bg-danger-100 p-2 text-base text-danger-700">' + response.message + '</div>').removeClass('hidden');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle AJAX errors
                        console.error(xhr.responseText);
                        $("#alert-message").html('<div class="mb-4 rounded-lg bg-danger-100 p-2 text-base text-danger-700">An error occurred. Please try again.</div>').removeClass('hidden');
                    }
                });
            });
        });
    </script>
</body>

</html>