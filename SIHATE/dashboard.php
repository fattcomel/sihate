<?php

$conn=mysqli_connect('localhost','root','','delima_db');  

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to count pending orders
$pendingQuery = "SELECT COUNT(*) as pendingCount FROM purchase_form WHERE status = 'pending'";
$pendingResult = $conn->query($pendingQuery);
$pendingRow = $pendingResult->fetch_assoc();
$pendingCount = $pendingRow['pendingCount'];

// Query to count delivered orders
$deliveredQuery = "SELECT COUNT(*) as deliveredCount FROM purchase_form WHERE status = 'delivered'";
$deliveredResult = $conn->query($deliveredQuery);
$deliveredRow = $deliveredResult->fetch_assoc();
$deliveredCount = $deliveredRow['deliveredCount'];

// Query to count total rows
$totalRowsQuery = "SELECT COUNT(*) as totalRows FROM purchase_form";
$totalRowsResult = $conn->query($totalRowsQuery);
$totalRowsRow = $totalRowsResult->fetch_assoc();
$totalRows = $totalRowsRow['totalRows'];

// Close connection
$conn->close();

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard</title>

   <style type="text/css">

         nav{
            margin-top:-60px;
            font-family: montserrat;
            width: 100%;
            height: 50px;
            color:black;
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
   }

   .container .content .btn:hover{
      background: crimson;
   }

   /*DASHBOARD COUNT*/
   /* Float four columns side by side */
   .column {
      float: left;
      width: 25%;
      padding: 0 10px;
      margin-left: 65px;
      color:black;
      text-decoration:none;
   }

   /* Remove extra left and right margins, due to padding */
   .row {
      margin: 0 -5px;
      font-family: montserrat;
      background-color:papayawhip;
      height: 220px;
      color:black;
      text-decoration:none;
   }

   /* Clear floats after the columns */
   .row:after {
   content: "";
   display: table;
   clear: both;
   color:black;
   text-decoration:none;
   }

   /* Responsive columns */
   @media screen and (max-width: 600px) {
   .column {
      width: 100%;
      display: block;
      margin-bottom: 20px;
   }
   }

   /* Style the counter cards */
   .card {
   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
   border-radius :5px ;
   padding: 16px;
   text-align: center;
   background-color: orange;
   margin-top:35px;
   color:black;
   text-decoration:none;
   }
   .row .column .card .p .a{
      color:black;
      text-decoration:none;
   }
   
</style>
</head>
<body>

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
		          <a class="nav-link " aria-current="page" href="home.php">Home</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="insertorder.php">Insert Order</a>
		        </li>
              <li class="nav-item">
		          <a class="nav-link" href="order_list.php">Order List</a>
		        </li>
		  </div>
		    </div>
		</nav>
    </div>
</div>


<div class="row">
  <div class="column">
    <div class="card">
      <h3 >Pending order :</h3>
      <p><a href="pendingorder.php"><?php echo "<br> " . $pendingCount . "<br>" ?></p>

    </div>
  </div>

  <div class="column">
    <div class="card">
      <h3>Delivered order : </h3>
      <p><?php echo "<br>" . $deliveredCount . "<br>" ?></p>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <h3>Total order :</h3>
      <p><?php echo "<br> " . $totalRows . "<br>"?></p>

    </div>
  </div>
</div>


</body>
</html>