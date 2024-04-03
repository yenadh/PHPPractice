<?php
include 'connection.php';
    if(!empty($_SESSION["Id"])){
        $id = $_SESSION["Id"];
        $query = "SELECT * FROM `logindetails` WHERE Id = '$id'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
    }
    else{
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

    <body class="h-auto bg-[Gray]">

        <div class=" relative top-[50px]">
            <h1 class="text-[38px] text-[White] font-bold text-center pt-[60px]">View Employee</h1>
            <div class="relative top-[70px] left-[240px]">
                <label class="text-[16px] text-[white] font-semibold pr-[30px]">Search</label>
                <input id='txtSearch' onkeyup='searchTable()' type='text'>
            </div>

            <div class="relative top-[30px] left-[1080px]  bg-green-500 w-[150px] h-[50px] rounded-full cursor-pointer">
                <a class="text-[16px] text-[white] font-semibold text-center relative top-[13px] left-[20px]" href="addEmp.php">Add Employee</a>
            </div>

            <div class="w-[1000px] mx-auto flex justify-center pb-[100px] pt-[60px]">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3" onclick="sorting(dataTable, 0)">Id</th>
                            <th scope="col" class="px-6 py-3">Name</th>
                            <th scope="col" class="px-6 py-3">Charge</th>
                            <th scope="col" class="px-6 py-3">Total</th>
                            <th scope="col" class="px-6 py-3">Operation</th>
                        </tr>

                    </thead>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <tbody id="dataTable">                           
                            <?php
                                    $query = "select * from employee";
                                    $state = mysqli_query($con, $query);
                                    while ($row = mysqli_fetch_array($state, MYSQLI_ASSOC)) {
                                    ?>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $row['Id']; ?></th>
                                    <td class="px-6 py-4"><?php echo $row['Name']; ?></td>
                                    <td class="px-6 py-4">Rs.<?php echo $row['Charge']; ?></td>
                                    <td class="px-6 py-4" s>Rs.<?php echo $row['Total']; ?></td>
                                    <td class="px-6 py-4">
                                        <a href="edit.php?id=<?php echo $row['Id']; ?>" onclick="return confirmUpdate();">Update</a>
                                        <button class="px-6" type="submit" onclick="deleteData(<?php echo $row['Id']; ?>)">Delete</button>
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