<?php
/**
 * Templet File Doc Comment
 * 
 * PHP version /
 * 
 * @category Tenplete_Class
 * @package  Templete_Class
 * @author   Author <author@domain.com>
 * @license  http://opensource.org/MIT MIT License
 * @link     http://localhost/
 */
session_start();
include("config1.php");
$errors = array();
$message = "";

if (isset($_POST['submit'])) {
    $username = isset($_POST['username'])?$_POST['username']:'';
    $password = isset($_POST['password'])?$_POST['password']:'';
   
    if (sizeof($errors)==0) {
        $sql = "SELECT * FROM user WHERE `username`='".$username."' AND `password`='".$password."'";
        $result=$conn->query($sql);
        if ($result ->num_rows > 0) {
            //output 
            while ($row=$result->fetch_assoc()) {
                // print_r($row);
                $_SESSION['userdata'] = array('username'=>$row['username'],'email'=>$row['email']);
                header('Location:dashboard.php'); 
            }        
        } else {
            $message = "Login in details invalid!" ;
            
 
        }
        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>
Login
</title>
<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
     

<div  id="m1" style="color:red;" ><?php echo $message; ?>
</div>
<h2>Login</h2>
<form action="index.php" method="POST">
<p>
<label for="username">Username: <input type="text" name="username" required></label>
</p>
<p>
<label for="password">Password: <input type="text" name="password" required></label>
</p>
<p>
<input type="submit" name="submit" value="Submit">
<a href="signup.php">Register here ...</a>
</p>
</form>

</body>
</html>