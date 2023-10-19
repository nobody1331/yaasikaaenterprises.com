<?php

include('../middleware/adminMiddleware.php');

// Set the HTTP headers to force a file download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="Stockreport.csv"');

// Open a new file pointer connected to the output stream
$output = fopen('php://output', 'w');

// Write the CSV header row
fputcsv($output, ['ID', 'Name', 'Qty']);

// Get the data from the database
$products = getAll("products");

// Write the data rows to the CSV file
foreach ($products as $item) {
    fputcsv($output, [$item['id'], $item['name'], $item['qty']]);
}

// Close the file pointer
fclose($output);

?>
