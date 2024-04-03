<?php
include 'connection.php';
if(!empty($_SESSION["Id"])){
    $id = $_SESSION["Id"];
    $query = "SELECT * FROM `logindetails` WHERE Id = '$id'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    if ($row["userName"] !== "Admin"){
        header("Location: Login.php");
    }
}
else{
    header("Location: Login.php");
}

function encryptPassword($password) {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    return $hashedPassword;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login Details</title>

</head>

<body class="h-auto bg-[Gray]">
    <div>
        <?php include 'Containers/navbar.php' ?>
    </div>

    <body class="h-auto bg-[Gray]">

        <div class=" relative top-[50px]">
            <h1 class="text-[38px] text-[White] font-bold text-center pt-[60px]">View Login Details</h1>
            <div class="relative top-[70px] left-[240px]">
                <label class="text-[16px] text-[white] font-semibold pr-[30px]">Search</label>
                <input id='txtSearch' onkeyup='searchTable()' type='text'>
            </div>

            <div class="relative top-[30px] left-[1080px]  bg-green-500 w-[150px] h-[50px] rounded-full cursor-pointer">
                <a class="text-[16px] text-[white] font-semibold text-center relative top-[13px] left-[20px]" href="addLogin.php">Add Login</a>
            </div>

            <div class="w-[1000px] mx-auto flex justify-center pb-[100px] pt-[60px]">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3" onclick="sorting(dataTable, 0)">Id</th>
                            <th scope="col" class="px-6 py-3">User Name</th>
                            <th scope="col" class="px-6 py-3">Password</th>
                            <th scope="col" class="px-6 py-3">Operation</th>
                        </tr>

                    </thead>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <tbody id="dataTable">                           
                            <?php
                                    $query = "select * from logindetails";
                                    $state = mysqli_query($con, $query);
                                    while ($row = mysqli_fetch_array($state, MYSQLI_ASSOC)) {
                                    ?>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $row['Id']; ?></th>
                                    <td class="px-6 py-4"><?php echo $row['userName']; ?></td>
                                    <td class="px-6 py-4"><?php echo encryptPassword($row['password']); ?></td>                                    
                                    <td class="px-6 py-4">                                        
                                        <button class="px-6" type="submit" onclick="deleteLoginData(<?php echo $row['Id']; ?>)">Delete</button>
                                    </td>
                                </tr>

                                <script src="Js/main.js"></script>

                            <?php
                                    }
                            ?>
                        </tbody>
                    </form>

                </table>
            </div>

        </div>
    </body>

</body>

</html>