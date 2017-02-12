<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'homevisit';
//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $db->query("SELECT * FROM icd10 WHERE icd10_id LIKE '%".$searchTerm."%'  ORDER BY icd10_id ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['icd10_id'].' '.$row['icd10_name'] ;
}

//return json data
echo json_encode($data);
?>