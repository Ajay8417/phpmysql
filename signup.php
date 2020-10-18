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
 
include("config1.php");
$errors = array();
$message = "";

if (isset($_POST['submit'])) {
    $username = isset($_POST['username'])?$_POST['username']:'';
    $password = isset($_POST['password'])?$_POST['password']:'';
    $repassword = isset($_POST['repassword'])?$_POST['repassword']:'';
    $email = isset($_POST['email'])?$_POST['email']:'';

    if ($password != $repassword) {
        $errors[] = array('input'=>'password','msg'=>'password doesnt match');
    }
 

    if (sizeof($errors)==0) {
        $sql = "INSERT INTO user(`username`, `password`, `email`) VALUES('".$username."', '".$password."', '".$email."')";

        if ($conn->query($sql) === true) {
            //echo "New record created successfully";
        } else {
            $errors[] = array('input'=>'form','msg'=>$conn->error);	
            //echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }    
}
?>
<!DOCTYPE html>
<html>
<head>
<title>
Register
</title>
<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
<div id="message"><?php echo $message; ?>
</div>
<div id="errors">
<?php if (sizeof($errors)>0) : ?>
<ul>
    <?php foreach ($errors as $error) : ?>
            <li><?php echo $error['msg']?></li>
    <?php endforeach;
    ?>
</ul>
<?php endif;?>
</div>
<h2>Sign Up</h2>
<form id="signupform" action="signup.php" method="POST">
<p>
<label for="username">Username: <input type="text" name="username" required></label>
</p>
<p>
<label for="password">Password: <input type="password" name="password" required></label>
</p>
<p>
<label for="repassword">Re-Password: <input type="password" name="repassword" required></label>
</p>
<p>
<label for="email">Email: <input type="email" name="email" required></label>
</p>
<p>
<input type="submit" name="submit" value="Submit">
<a href="index.php">Login here .... </a>
</p>
</form>


</body>
</html>
