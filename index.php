<?php
include 'Data.php';
include 'count.php';

include 'connection.php';
if (!empty($_SESSION["Id"])) {
    $id = $_SESSION["Id"];
    $query = "SELECT * FROM `logindetails` WHERE Id = '$id'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: Login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>

</head>

<body class="h-auto bg-[Gray]">
    <div>
        <?php include 'Containers/navbar.php' ?>
    </div>
    <div>
        <h1 class="text-[white] text-[70px] text-center relative top-[250px] font-bold">Welcome <?php echo $row["userName"] ?></h1>
    </div>

    <div class="relative flex flex-row justify-center top-[450px] space-x-[100px]">
        <div class="w-[300px] h-[120px] bg-slate-800 rounded-3xl">
            <h1 class="text-[20px] text-[white] text-center font-semibold pt-[20px]">Total No.of Employee</h1>
            <h1 class="text-[20px] text-[white] text-center font-Normal pt-[16px]"><?php GetCountEmp(); ?></h1>
        </div>

        <div class="w-[300px] h-[120px] bg-slate-800 rounded-3xl">
            <h1 class="text-[20px] text-[white] text-center font-semibold pt-[20px]">Total Expence Amount</h1>
            <h1 class="text-[20px] text-[white] text-center font-Normal pt-[16px]">Rs. <?php GetTotalSalary(); ?></h1>
        </div>

        <?php
        if ($row["userName"] == "Admin") { ?>
            <div class="w-[300px] h-[120px] bg-slate-800 rounded-3xl">
                <h1 class="text-[20px] text-[white] text-center font-semibold pt-[20px]">Total No.of Users</h1>
                <h1 class="text-[20px] text-[white] text-center font-Normal pt-[16px]"><?php GetCountUsers(); ?></h1>
            </div>
        <?php
        }
        ?>


    </div>

</body>

</html>