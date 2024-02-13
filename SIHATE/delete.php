<?php   
@include 'connect.php';  

$conn=mysqli_connect('localhost','root','','delima_db');  

if (isset($_GET['id'])) {  
    $id = $_GET['id'];  
    $query = "DELETE FROM `purchase_form` WHERE id = '$id'";  
    $sql = mysqli_query($conn,$query);  
    if ($sql) {  
         header('location:order_list.php');  
    }else{  
         echo "Error: ".mysqli_error($conn);  
    }  
} 
?>  