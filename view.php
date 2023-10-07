<?php
include('dbconnection.php');


// SQL query to fetch data from your database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

include('delete.php')
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Tailwind CSS and jQuery libraries -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">

    <!-- Import tailwind css -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script> -->
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
        <div class="flex flex-col flex-1 w-full">
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
            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        View Data
                    </h2>

                    <!-- component -->
                    <div class="overflow-x-auto">
                        <?php
                        // Check if viewid is set in the URL
                        if (isset($_GET['viewid'])) {
                            $vid = $_GET['viewid'];

                            // Use prepared statement to avoid SQL injection
                            $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE id = ?");
                            mysqli_stmt_bind_param($stmt, "i", $vid);
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);

                            // Fetch the first row
                            $row = mysqli_fetch_array($result);

                            // Define fields
                            $fields = [
                                'Customer name' => 'customer_name',
                                'Mobile No' => 'mobile_no',
                                'Alternate NO' => 'alternate_no',
                                'City' => 'city',
                                'Customer PAN' => 'customer_pan',
                                'VKYC Link' => 'vkyc_link',
                                'Application No' => 'application_no',
                                'Application Status' => 'application_status',
                                'Account Incomplete Reason' => 'account_incomplete_reason',
                                'Backend Name' => 'backend_name',
                                'Caller Name' => 'caller_name',
                                'Office Name' => 'office_name',
                                'Manager Name' => 'mgr_name',
                                'Form Filed Date' => 'form_filed_date',
                                'Surrogate Type' => 'surrogate_type',
                                'IPA Status' => 'ipa_status',
                                'Pickup Remark' => 'pickup_remark',
                                'Extra 2' => 'extra2',
                                'Extra 3' => 'extra3',
                                // Add more fields as needed
                            ];

                            // Output the container
                            echo '<div class="container mx-auto my-8 p-8 bg-white dark:bg-gray-800 rounded-lg shadow-md">';
                            echo '<p class="mb-4 text-lg font-semibold text-gray-700 dark:text-gray-300">User Details</p>';

                            // Output fields
                            echo '<div class="grid grid-cols-1 md:grid-cols-3 gap-4">';
                            foreach ($fields as $label => $fieldKey) {
                                echo '
        <div>
            <label for="' . $fieldKey . '" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">' . $label . '</label>
            <div class="flex">
                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                    </svg>
                    
                </span>
                <span type="text" id="' . $fieldKey . '" class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-1/2 text-sm border-gray-300 p-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="elonmusk">';

                                if ($row && isset($row[$fieldKey])) {
                                    echo '<span class="font-medium">' . $row[$fieldKey] . '</span>';
                                } else {
                                    echo '<span class="text-red-500">' . $label . ' not available</span>';
                                }

                                echo '
                </span>
            </div>
        </div>';
                            }
                            echo '</div>';

                            // Output additional content or controls as needed
                            echo '<a href="edit.php?editid=' . $row['id'] . '" title="Edit">';
                            echo '<div class="flex justify-end mt-4">';
                            echo      '<button type="button" data-te-ripple-init data-te-ripple-color="light" class="ripple-btn text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple px-4 py-2 rounded" data-te-toggle="modal" data-te-target="#exampleModalXl" data-aos="fade-up" data-aos-duration="3000">';
                            echo      ' Edit Details';
                            echo   '  </button>';
                            echo  '</div>';
                            echo '</a>';
                            echo '</div>'; // Close the container
                        } else {
                            // Handle the case when viewid is not set, e.g., redirect to an error page
                            echo 'View ID is not set.';
                        }
                        ?>

                    </div>
                </div>
        </div>
        </main>
    </div>
    </div>


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
        async function searchData() {
            // Get the search query from the input
            const query = document.getElementById('searchInput').value;

            try {
                // Make an AJAX request to your PHP script using fetch
                const response = await fetch(`Search.php?query=${encodeURIComponent(query)}`);

                if (response.ok) {
                    // Update the table with the search results
                    const results = await response.json();
                    updateTable(results);
                } else {
                    // Handle errors
                    console.error('Error fetching data:', response.status, response.statusText);
                }
            } catch (error) {
                // Handle network errors
                console.error('Network error:', error.message);
            }
        }


        function updateTable(results) {
            // Get the table body
            const tableBody = document.getElementById('searchResults');

            // Clear previous search results
            tableBody.innerHTML = '';

            // Iterate over the results and add rows to the table
            results.forEach(result => {
                const row = document.createElement('tr');
                // Customize this part based on your data structure
                row.innerHTML = `
        <td class="py-3 px-6 text-left whitespace-nowrap">
        <div class="flex items-center">
          <span class="font-medium">${result.id}</span>
        </div>
      </td>
      <td class="py-3 px-6 text-left whitespace-nowrap">
        <div class="flex items-center">
          <span class="font-medium">${result.customer_name}</span>
        </div>
      </td>
      <td class="py-3 px-6 text-left">
        <div class="flex items-center">
          <span>${result.mobile_no}</span>
        </div>
      </td>
      <td class="py-3 px-6 text-center">
        <div class="flex items-center justify-center">
          ${result.application_no}
        </div>
      </td>
      <td class="py-3 px-6 text-center">
        <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">${result.application_status}</span>
      </td>
      <td class="py-3 px-6 text-center">
        <div class="flex item-center justify-center">
          <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
          </div>
          
          <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
          </div>
        </div>
      </td>
    `;
                // Add a click event listener to the delete button
                const deleteButton = row.querySelector('.w-4');
                deleteButton.addEventListener('click', function() {
                    // Call the deleteRecord function
                    deleteRecord(result.id);
                });
                tableBody.appendChild(row);
            });
        }
    </script>

</body>

</html>