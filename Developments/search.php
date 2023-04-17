<?php
// Get the filter criteria from the form
$name = isset($_GET['name']) ? $_GET['name'] : array();
// Get the search term criteria from the form
$search_term = isset($_GET['search_term']) ? $_GET['search_term'] : '';

// Create a MySQL connection
$conn = mysqli_connect("localhost", "root", "", "onbookstore_db");

// Check if the connection was successful
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Build the query string based on the selected filters
$query = "SELECT * FROM book";

if (count($name) > 0) {
  $query .= " WHERE book_name IN ('" . implode("','", $name) . "')";
}

if ($search_term != '') {
  $query .= " AND (book_name LIKE '%$search_term%' OR book_author LIKE '%$search_term%')";
}

// Execute the query
$result = mysqli_query($conn, $query);

// Display the filtered data
while ($row = mysqli_fetch_assoc($result)) {
  echo "<p>ID: " . $row['book_id'] . "</p>";
  echo "<p>Author: " . $row['book_author'] . "</p>";
  echo "<p>Name: " . $row['book_name'] . "</p>";
}

// Close the connection
mysqli_close($conn);
?>
