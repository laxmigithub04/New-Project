<?php
session_start();
$conn = mysqli_connect('localhost','root',"",'database')or die('Unable to connect');
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body{
                text-align:center;
            }

            .field{
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body>

    <h2>Login</h2>
    <div>
        <form action = "index.php" method = "post">
            <input type = "text" class = "field" name = "Username" placeholder = "Username" required = ""><br/>
            <input type = "password" class = "field" name = "Pass" placeholder = "Password" required = ""><br/>
            <input type = "submit" class = "field" name = "Login" value = "Login">
        </form>
    </div>

<?php
    if(isset($_POST['Login'])){
        $Username = $_POST['Username'];
        $Pass = $_POST['Pass'];

    $select = mysqli_query($conn, "SELECT * FROM `login` WHERE Username = '$Username' AND Pass = '$Pass' ");
    $row = mysqli_fetch_array($select);

    if(is_array($row)){
            $_SESSION["Username"] = $row['Username'];
            $_SESSION["Pass"] = $row['Pass'];
    }
        else {
            echo '<script type = "text/javascript">';
            echo 'alert("Invalid Username or Password");';
            echo 'window.location.href = "index.php" ';
            echo '</script>';
    }
    }
    if(isset($_SESSION["Username"])){
        header("Location:login.php");
    }
?>
</body>
</html>