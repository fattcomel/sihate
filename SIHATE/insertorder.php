<?php

$conn=mysqli_connect('localhost','root','','delima_db');  

//Post data
if(isset($_POST['submit'])){
   
   $placed = $_POST['placed'];
   $orderNo = $_POST['orderNo'];
   $name = $_POST['name'];
   $phoneNo = $_POST['phoneNo'];
   $descr = $_POST['descr'];
   $date = $_POST['date'];

   $select = " SELECT * FROM purchase_form WHERE name = '$name' && phoneNo = '$phoneNo' ";

   $result = mysqli_query($conn, $select);

   $insert = "INSERT INTO purchase_form(placed,orderNo,name, phoneNo, descr, date) VALUES('$placed','$orderNo','$name','$phoneNo','$descr' , '$date')";
   mysqli_query($conn, $insert);
   header('location:order_list.php');
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Insert Order</title>

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
   align-placeds: center;
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
   width:100%;
   min-height: 100vh;
   display: flex;
   align-placed: center;
   justify-content: center;
   padding:20px;
   padding-top: 45px;
   padding-bottom: 70px;
   background: #eee;
   font-family: montserrat;
}

.form-container form{
   padding:20px;
   border-radius: 5px;
   box-shadow: 0 5px 10px rgba(0,0,0,.1);
   background: #fff;
   text-align: center;
   width: 500px;
   font-family: montserrat;
}

.form-container form h3{
   font-size: 30px;
   text-transform: uppercase;
   margin-top: 40px;
   margin-bottom: 15px;
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
}
.form-container form select{
   width: 450px;
   padding:10px;
   font-size: 17px;
   margin:8px 0;
   background: #eee;
   border-radius: 5px;
   font-family: montserrat;
}

.form-container form select option{
   background: #fff;
   font-family: montserrat;
}

.form-container form .form-btn{
   background: orange;
   color:black;
   text-transform: capitalize;
   font-size: 20px;
   cursor: pointer;
   font-family: montserrat;
   width: 450px;
}

.form-container form .form-btn:hover{
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
            <li class="nav-placed">
		          <a class="nav-link" aria-current="page" href="home.php">Home</a>
		        </li>
		        <li class="nav-placed">
		          <a class="nav-link" aria-current="page" href="dashboard.php">Dashboard</a>
		        </li>
		        <li class="nav-placed">
		          <a class="nav-link active" href="insertorder.php">Insert Order</a>
		        </li>
              <li class="nav-placed">
		          <a class="nav-link" href="order_list.php">Order List</a>
		        </li>
		  </div>
		    </div>
		</nav>
    </div>
</div>
   

<!--FORM-->
<div class="form-container">

   <form action="" method="post">
      <h3>Enquiries</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <select name="placed">
         <option value="Shoppe">Shoppe</option>
         <option value="Website">Website</option>
         <option value="Tiktok">TikTok</option>
         <option value="Facebook">FaceBook</option>
         <option value="Instagram">Instagram</option>
      </select>
      <input type="orderNo" name="orderNo" required placeholder="Order Number">
      <input type="text" name="name" required placeholder="Name">
      <input type="phoneNo" name="phoneNo" required placeholder="Phone Number">
      
      <input type="descr" name="descr" required placeholder="Description">
      <input type="date" name="date">
      
      <input type="submit" name="submit" value="Insert order" class="form-btn">
   </form>
</div>
</body>
</html>