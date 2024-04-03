<?php
function GetCountEmp()
{
    include 'connection.php';
    $tableName = 'employee';
    $sql = "SELECT COUNT(*) FROM $tableName";
    $row = mysqli_fetch_assoc(mysqli_query($con, $sql));
    $row_count = $row['COUNT(*)'];
    echo $row_count;
}

function GetTotalSalary()
{
    include 'connection.php';
    $tableName = 'employee';
    $sql = "SELECT SUM(Total) AS total FROM $tableName";
    $result = $con->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();
        $total = $row['total']; 
        echo $total;
    } else {
        echo "Error executing query: " . $con->error;
    }
}

function GetCountUsers(){
    include 'connection.php';
    $tableName = 'logindetails';
    $sql = "SELECT COUNT(*) FROM $tableName";
    $row = mysqli_fetch_assoc(mysqli_query($con, $sql));
    $row_count = $row['COUNT(*)'];
    echo $row_count;
}



