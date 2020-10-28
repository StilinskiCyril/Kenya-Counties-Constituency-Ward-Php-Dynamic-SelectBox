<?php
//database connection file
require_once 'connect.php';

if(isset($_POST['constituency_name'])) {
    $constituency_name = $_POST['constituency_name'];
    $query = "select id from constituencies where constituency_name ='$constituency_name'";
    $data = $conn->query($query);
        while ($row = $data->fetch()) {
                $results = $conn->query('select ward_name from wards where constituency_id = '.$row["id"]);
                while ($row = $results->fetch()) {
                    echo "<option>" . $row['ward_name'] . "</option>";
                }
        }
    exit;
}