<?php

$conn=mysqli_connect('localhost','root','','delima_db');  

// Check if 'id' is set in the URL
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Initialize variables
$date = $name = $note = $updateby = '';

// Fetch data from the database
$sqlSelect = "SELECT * FROM purchase_form";
$resultSelect = $conn->query($sqlSelect);

// Check for errors
if (!$resultSelect) {
   die("Error fetching all data: " . $conn->error);
}

// If 'id' is set, fetch specific data
if ($id) {
   $sqlSelectById = "SELECT * FROM purchase_form WHERE id = ?";
   $stmtSelectById = $conn->prepare($sqlSelectById);

   // Check for errors
   if (!$stmtSelectById) {
      die("Error preparing statement for fetching data: " . $conn->error);
   }

   $stmtSelectById->bind_param("i", $id);
   $stmtSelectById->execute();

   $resultSelectById = $stmtSelectById->get_result();

   if ($resultSelectById->num_rows > 0) {
      $row = $resultSelectById->fetch_assoc();
      // Assign fetched values to variables for pre-filling the form
      $date = $row['date'];
      $name = $row['name'];
      $note = $row['note'];
      $updateby = $row['updateby'];
        
   } else {
      echo "No data found for the given ID.";
   }

   $stmtSelectById->close();
}

// Handle form submission for updating data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $idToUpdate = $_POST['id'];
   $date = $_POST['date'];
   $name = $_POST['name'];
   $note = $_POST['note'];
   $updateby = $_POST['updateby'];
   
   // Update data in the database
   $sqlUpdate = "UPDATE purchase_form SET 
                    date=?, name=?, note=? , updateby=?
                  WHERE id=?";
   $stmtUpdate = $conn->prepare($sqlUpdate);

   // Check for errors
   if (!$stmtUpdate) {
      die("Error preparing statement for updating data: " . $conn->error);
   }

   $stmtUpdate->bind_param("ssssi", $date, $name, $note, $updateby, $idToUpdate);

   if ($stmtUpdate->execute()) {
      echo "Record updated successfully";
   } else {
      echo "Error updating record: " . $stmtUpdate->error;
   }

   $stmtUpdate->close();
}
// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta note="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add Notes</title>


   <style type="text/css">

      body{
         font-family: montserrat;
      }
         nav{
            margin-top:-60px;
            font-family: montserrat;
            width: 100%;
            height: 50px;
         }  
         nav h2{
               float: left;
               margin-left:10px;
          }
         nav ul{
            float: right;
            margin-right: 40px;
         }
         nav ul li{
            display: inline-block;
            margin: 0 8px;
            line-height: 80px;
         }
         nav ul li a{
            color: black;
            font-size: 18px;
            text-transform: uppercase;
            border: 1px solid transparent;
            padding: 7px 10px;
            border-radius: 3px;
         }
         nav a.active,a:hover{
            border: 1px solid rgb(0, 0, 0);
         }  

         {
         font-family: montserrat;
         margin:0; padding:0;
         box-sizing: border-box;
         outline: none; border:none;
         text-decoration: none;
         }

      /*HEADER*/
      .container{
         display: flex;
         align-items: center;
         justify-content: center;
         padding:10px;
         padding-bottom: 60px;
         font-family: montserrat;
      }

      .container .content{
         text-align: center;
      }

      .container .content h3{
         font-size: 30px;
         color:#333;
      }

      .container .content h3 span{
         background: crimson;
         color:#fff;
         border-radius: 5px;
         padding:0 15px;
      }

      .container .content h1{
         font-size: 50px;
         color:#333;
      }

      .container .content h1 span{
         color:crimson;
      }

      .container .content p{
         font-size: 25px;
         margin-bottom: 20px;
      }

      .container .content .btn{
         display: inline-block;
         padding:10px 30px;
         font-size: 20px;
         background: #333;
         color:#fff;
         margin:0 5px;
         text-transform: capitalize;
         font-family: montserrat;
      }

      .container .content .btn:hover{
         background: crimson;
         font-family: montserrat;
      }

      /*FORM*/
      .form-container{
         min-height: 100vh;
         display: flex;
         align-items: center;
         justify-content: center;
         padding:20px;
         padding-top: 30px;
         padding-bottom: 60px;
         background: #eee;
         font-family: montserrat;
         width:100%;
         height:100%;
      }
      .form-container-content{
         margin-top:60px;
         height:700px;
         padding:10px;
      }
      .form-container form{
         padding:20px;
         border-radius: 5px;
         box-shadow: 0 5px 10px rgba(0,0,0,.1);
         background: #fff;
         text-align: center;
         width: 500px;
         font-family: montserrat;
         margin-top:-30px;
      }

      .form-container form h3{
         font-size: 30px;
         text-transform: uppercase;
         margin-bottom: 20px;
         color:#333;
         font-family: montserrat;
      }

      .form-container form input
      {
         width: 430px;
         padding:10px;
         font-size: 17px;
         margin:8px 0;
         background: #eee;
         border-radius: 5px;
         font-family: montserrat;
         margin-top:20px;
      }
      .form-container form select{
         width: 450px;
         padding:10px;
         font-size: 17px;
         margin:8px 0;
         margin-left: 30px;
         background: #eee;
         border-radius: 5px;
         font-family: montserrat;
      }

      .form-container form select option{
         background: #fff;
         font-family: montserrat;
      }

      .form-container form .btn{
         background: orange;
         color:black;
         text-transform: capitalize;
         font-size: 20px;
         cursor: pointer;
         font-family: montserrat;
         width: 450px;
         margin-bottom:30px;
      }

      .form-container form .btn:hover{
         background: cornsilk;
         color:black;
         font-family: montserrat;
      }

      .form-container form p{
         margin-top: 10px;
         font-size: 20px;
         color:#333;
         font-family: montserrat;
      }

      .form-container form p a{
         color:cornsilk;
         font-family: montserrat;
      }
     
   </style>
</head>
<body>


<!--HEADER-->
<div class="black-fill"><br /> <br />
    <div class="container">
    	<nav class="navbar navbar-expand-lg bg-light"id="homeNav">
		    <div class="container-fluid">
		    <a class="navbar-brand">
          <h2><p><a href="home.php"><img src="logohijau.png" width="100px" height="30px"></p></h2>
		    </a>
		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
		          <a class="nav-link" aria-current="page" href="order_list.php">< Back</a>
		        </li>
		  </div>
		    </div>
		</nav>
    </div>
</div>
   

<!--FORM-->
<div class="form-container">
   <div class="form-container-content">
      <form action="edit.php" method="post">

      <!-- Add a hidden input field for the record ID -->
      <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>" required>
      <div class="form-group row">
            <label class="col-form-label col-lg-2">Date<span class="text-danger"> </span></label>
            <div class="col-lg-10">
               <input type="date" class="form-control" name="date" value="<?php echo isset($date) ? $date : ''; ?>" required>
            </div>
         </div>
         <div class="form-group row">
            <label class="col-form-label col-lg-2">Name<span class="text-danger"> </span></label>
            <div class="col-lg-10">
               <input type="text" class="form-control" name="name" value="<?php echo isset($name) ? $name : ''; ?>" required>
            </div>
         </div>
         <div class="form-group row">
            <label class="col-form-label col-lg-2">Notes<span class="text-danger"> </span></label>
            <div class="col-lg-10">
               <input type="text" class="form-control" name="note" value="<?php echo isset($note) ? $note : ''; ?>" required>
            </div>
         </div>
         <div class="form-group row">
            <label class="col-form-label col-lg-2">Update By<span class="text-danger"> </span></label>
            <div class="col-lg-10">
				<input type="text" class="form-control" name="updateby" value="<?php echo isset($updateby) ? $updateby : ''; ?>" required>
			</div>
		</div> 
      
   <input type="submit" class="btn btn-primary" name="submit"  value="Add Notes" ></form>
</div>
   </div>

</body>
</html>