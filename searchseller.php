<?php
session_start();
require "connection.php";

if(isset($_GET["s"])){

$text = $_GET["s"];
 
if(!empty($text)){

$usersrs=Database::search("SELECT * FROM `seller` WHERE  `email` LIKE '%".$text."%' OR `fname` LIKE '%".$text."%'");
$n=$usersrs->num_rows;
$row = $usersrs->fetch_assoc();


    $_SESSION["seller"]=$row;



// if(empty($_SESSION["k"])){
//     echo "empty";
// }else{

echo "success";
// }
// echo $n;

}else{
    echo "Please add a name to search";
}


}


?>