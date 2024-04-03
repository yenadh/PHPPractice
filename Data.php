<?php
function GetData()
{
    include 'connection.php';
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
};

function UpdateData()
{
    include 'connection.php';
    if (isset($_POST['submit'])) {
        $id = $_GET['id'];
        $Name = $_POST['txtName'];
        $Charge = $_POST['txtCharge'];

        $query = "UPDATE `employee` SET `Name`= '$Name' ,`Charge`= '$Charge' WHERE Id = $id";

        $state = mysqli_query($con, $query);
        if ($state) {
            echo "New record Added";
        } else {
            echo "Failed: " . mysqli_error($con);
        }
    };
}


function addEmp()
{
    include 'connection.php';
    if (isset($_POST['submit'])) {
        $Name = $_POST['txtName'];
        $Charge = $_POST['txtCharge'];

        $query = "INSERT INTO `employee`(`Name`, `Charge`) VALUES ('$Name','$Charge')";

        $result = mysqli_query($con, $query);

        if ($result) { ?>
            <script>
                alert("New Employee Added Successfully")
            </script>
        <?php
        } else {
            $ErrMsg = "Failed: " . mysqli_error($con);
        }
    }
}


function login()
{
    include 'connection.php';
    if (isset($_POST['submit'])) {
        $userName = $_POST['txtuserName'];
        $Password = $_POST['txtPassword'];

        $query = "SELECT * FROM `logindetails` WHERE userName = '$userName'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) > 0) {
            if ($row['userName'] == "Admin") {
                if ($Password == $row['password']) {
                    $_SESSION["login"] = true;
                    $_SESSION["Id"] = $row["Id"];
                    header("Location: index.php");
                } else {
                    echo "<script>alert('UserName or Password Incorrect')</script>";
                }
            }
            else{
                if ($Password == $row['password']) {
                    $_SESSION["login"] = true;
                    $_SESSION["Id"] = $row["Id"];
                    header("Location: index.php");
                } else {
                    echo "<script>alert('UserName or Password Incorrect')</script>";
                }
            }
        }
    }
}

function addLogin()
{
    include 'connection.php';
    if (isset($_POST['submit'])) {
        $UName = $_POST['txtUserName'];
        $Password = $_POST['txtPassword'];

        $query = "INSERT INTO `logindetails`(`userName`, `password`) VALUES ('$UName','$Password')";

        $result = mysqli_query($con, $query);

        if ($result) { ?>
            <script>
                alert("New User Added Successfully")
            </script>
<?php
        } else {
            $ErrMsg = "Failed: " . mysqli_error($con);
        }
    }
}

function UpdateLoginData()
{
    include 'connection.php';
    if (isset($_POST['submit'])) {
        $id = $_GET['id'];
        $userName = $_POST['txtUserName'];
        $Password = $_POST['txtPassword'];

        $query = "UPDATE `logindetails` SET `userName`= '$userName' ,`password`= '$Password' WHERE id = $id";

        $state = mysqli_query($con, $query);
        if ($state) {
            echo "<script> alert('New Employee Added Successfully')</script>";
        } else {
            echo "Failed: " . mysqli_error($con);
        }
    };
}

?>