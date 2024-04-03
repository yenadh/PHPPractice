<?php

include 'connection.php';
$id = $_POST['id'];
$query  = "DELETE FROM logindetails WHERE Id = $id";
$state = mysqli_query($con, $query);

if($state){
    echo "Deleted";
}
else{
    echo "Error".mysqli_error($con);
}

?>