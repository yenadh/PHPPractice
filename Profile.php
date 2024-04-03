<?php

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
    <script src="Js/main.js"></script>
    <title>Document</title>
</head>

<body class="h-auto bg-[Gray]">
    <div>
        <?php include 'Containers/navbar.php' ?>
    </div>
    <h1 class="text-[38px] text-[White] font-bold text-center relative top-[50px] pt-[60px]">Hello <?php echo $row["userName"] ?></h1>
    <div class="w-[500px] mx-auto flex justify-center text-[20px] bg-slate-400 relative top-[100px] py-[80px] rounded-3xl">
        <div class="flex flex-col text-[20px]">
            <div class="py-[20px]">
            <img src="images/round-account-button-with-user-inside_icon-icons.com_72596.png" class="w-[100px] mx-auto" alt="">
            </div>
            <div class="pt-[20px]">
                <label class="pr-[10px]">Name : </label>
                <label class="pr-[10px]"><?php echo $row["userName"] ?></label>
            </div>

            <div class="pt-[20px] pb-[30px]">
                <label class="pr-[10px]">Password : </label>
                <label class="pr-[10px]"><?php echo $row["password"] ?></label>
            </div>

            <div class="bg-green-500 w-[150px] h-[50px] rounded-full cursor-pointer mx-auto">
            <a href="ProfileEdit.php?id=<?php echo $row['Id']; ?>" onclick="return confirmUpdate();" class="mx-auto text-center relative top-[10px] left-[40px]">Update</a>
            </div>

        </div>

    </div>

</body>

</html>