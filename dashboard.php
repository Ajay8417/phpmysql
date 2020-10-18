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
echo "<h1>Welcome to dashbord</h1>";
echo '<b>User Name &nbsp;&nbsp;&nbsp;&nbsp;</b>'.$_SESSION['userdata']['username']."<br>";
echo '<b>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>'.$_SESSION['userdata']['email'];
echo "<h2>";
echo "<a href='logout.php'>Logout here..</a>";
echo "</h2>";
?>