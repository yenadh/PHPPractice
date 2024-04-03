<?php
include 'Data.php';
include 'connection.php';
if (!empty($_SESSION["Id"])) {
    $id = $_SESSION["Id"];
    $query = "SELECT * FROM `logindetails` WHERE Id = '$id'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: Login.php");
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = mysqli_prepare($con, "SELECT * FROM `logindetails` WHERE Id = ? LIMIT 1");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
}

UpdateLoginData();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function confirmUpdate() {
            return confirm("Are you sure you want to update this data?");
        };
    </script>
    <title>Document</title>
</head>

<body class="h-auto bg-[Gray]">
    <div>
        <?php include 'Containers/navbar.php' ?>
    </div>
    <h1 class="text-[38px] text-[White] font-bold text-center relative top-[50px] pt-[60px]">Update Employee</h1>
    <div class="w-[1000px] mx-auto flex justify-center text-[20px] bg-slate-400 relative top-[100px] py-[80px] rounded-3xl">
        <div class="flex flex-col text-[20px]">
            <form method="post">
                <div class="py-[20px]">
                    <label class="pr-[30px]">Name</label>
                    <input type="text" name="txtUserName" value="<?php echo isset($row['userName']) ? $row['userName'] : '' ?>" class="w-[500px] h-[40px] text-[18px] pl-[10px] border-[2px] border-[#cccaca]">
                </div>

                <div class="py-[20px]">
                    <label class="pr-[20px]">Charge</label>
                    <input type="number" name="txtPassword" value="<?php echo isset($row['password']) ? $row['password'] : '' ?>" class="w-[500px] h-[40px] text-[18px] px-[10px] border-[2px] border-[#cccaca]">
                </div>

                <div class="py-[20px]">
                    <button class="bg-green-500 w-[150px] h-[50px] rounded-full cursor-pointer" type="submit" name="submit" onclick="return confirmUpdate();">Update</button>
                </div>
            </form>
        </div>

    </div>

</body>

</html>