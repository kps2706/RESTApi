<?php


try {
    //code...
    header('Content-type : application/json');
    header('Acess-Control-Allow-Origin: *');

    include_once 'connectdb.php';

    $sql = "SELECT * FROM tbl_users";

    $result = mysqli_query($conn, $sql) or die("SQL Query failed");

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode($row);
    } else {
        echo json_encode(array('message' => 'No Record Found.', 'status' => false));
    }
} catch (PDOException $e) {
    //throw $th;
    echo $e->getMessage();
}