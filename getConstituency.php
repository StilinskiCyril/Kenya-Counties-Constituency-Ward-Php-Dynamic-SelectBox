<?php
//database connection file
require_once 'connect.php';

if(isset($_POST['county_id'])) {
    $county_id = $_POST['county_id'];
    $query = $conn->query("select constituency_name from constituencies where county_id ='$county_id'");
    while ($row = $query->fetch()) {
        echo "<option>" . $row['constituency_name'] . "</option>";
    }
    exit;
}