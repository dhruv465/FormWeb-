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
            // Number of rows to display per page
            $rowsPerPage = 10;

            // Calculate the total number of pages
            $totalPages = ceil($result->num_rows / $rowsPerPage);

            // Get the current page from the URL parameter or set it to 1
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

            // Calculate the SQL LIMIT clause for pagination
            $offset = ($page - 1) * $rowsPerPage;

            // Modify your SQL query to include the LIMIT clause
            $sql = "SELECT * FROM users LIMIT $offset, $rowsPerPage";

            // Execute the modified query
            $result = $conn->query($sql);

            // Check if there are rows in the result
            if ($result->num_rows > 0) {
                // Loop through each row in the result
                while ($row = $result->fetch_assoc()) {
                    echo '<tr id="row-' . $row['id'] . '" class="border-b w-full border-gray-200 hover:bg-gray-100">';
                    // Output your table data for each row
                    echo '<td class="py-3 px-6 text-left">' . $row['id'] . '</td>';
                    echo '<td class="py-3 px-6 text-left whitespace-nowrap">';
                    echo '<div class="flex items-center">';
                    echo '<span class="font-medium">' . $row['office_name'] . '</span>';
                    echo '</div>';
                    echo '</td>';
                    echo '<td class="py-3 px-6 text-left">';
                    echo '<div class="flex items-center">';
                    echo '<span>' . $row['mobile_no'] . '</span>';
                    echo '</div>';
                    echo '</td>';
                    echo '<td class="py-3 px-6 text-center">';
                    echo '<div class="flex items-center justify-center">';
                    echo $row['vkyc_link'];
                    echo '</div>';
                    echo '</td>';
                    echo '<td class="py-3 px-6 text-center">';
                    echo '<span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">' . $row['application_status'] . '</span>';
                    echo '</td>';
                    echo '<td class="py-3 px-6 text-center">';
                    echo '<span class="text-orange-700 bg-orange-100 py-1 px-3 rounded-full text-xs">' . $row['ipa_status'] . '</span>';
                    echo '</td>';
                    echo '<td class="py-3 px-6 text-center">';
                    echo '<span class="px-4 py-3 text-sm">' . $row['created_at'] . '</span>';
                    echo '</td>';
                    echo '<td class="py-3 px-6 text-center">';
                    echo '<div class="flex item-center justify-center">';
                    echo '<div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer">';
                    echo '<a href="view.php?viewid=' . $row['id'] . '" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer">';
                    echo '<svg xmlns="http://www.w3.org/2000/svg" class="view" title="View" type="button" fill="none" viewBox="0 0 24 24" stroke="currentColor">';
                    echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />';
                    echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />';
                    echo '</svg>';
                    echo '</a>';
                    echo '</div>';

                    echo '<a href="edit.php?editid=' . $row['id'] . '" title="Edit" class="edit w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer">';
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
                // Display a message if there is no data
                echo '<tr>
                                    <td colspan="6" class="py-3 px-6 text-center">NO Data Inserted Yet</td>
                                </tr>';
            }
            ?>
       </tbody>
   </table>