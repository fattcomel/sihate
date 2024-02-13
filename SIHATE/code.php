<?php
session_start();
$conn = mysqli_connect("localhost","root","","delima_db");

if(isset($_POST['update_note']))
{

    $id = $_POST['id']
    $name = $_POST['name'];
    $note = $_POST['note'];

    $query = "UPDATE purchase_form SET name='$name', note='$note' WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['note'] = "Data Updated Successfully";
        header("Location: addnote.php");
    }
    else
    {
        $_SESSION['note'] = "Not Updated";
        header("Location: addnote.php");
    }
}

?>