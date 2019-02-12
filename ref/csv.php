<?php

header("Content-type: text/csv");
header("Content-Disposition: attachment; filename=file.csv");
header("Pragma: no-cache");
header("Expires: 0");

outputCSV(array(
    array("name 1", "age 1", "city 1"),
    array("name 2", "age 2", "city 2"),
    array("name 3", "age 3", "city 3")
));

function outputCSV($data) {
    $output = fopen("php://output", "w");
    foreach ($data as $row) {
        fputcsv($output, $row); // here you can change delimiter/enclosure
    }
    fclose($output);
}
?>
