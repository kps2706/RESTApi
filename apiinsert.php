<?php


try {
    //code...


    header('Content-Type: application/json; ');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

    $data = json_decode(file_get_contents("php://input"), true);

    $ref_symbol = $data['s_symbol'];

    include "connectdb.php";

    $sql = "SELECT * FROM tbl_nse WHERE symbol ='{$ref_symbol}'";

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