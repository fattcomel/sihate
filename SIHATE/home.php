
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sihate Order Management</title>

    <style type="text/css">
        body{
            color: black;
            font-family: montserrat;
            background-image:linear-gradient(rgba(255, 255, 255, 0.607),rgba(255, 255, 255, 0.621)), url("depan.jpg");
        }
        nav{
            margin-top:-40px;
            font-family: montserrat;
            width: 100%;
            height: 50px;
         }  
        nav h2{
            float: left;
            margin-top: 40px;
            margin-left:500px;
        }

.container{
   margin-top: 160px;
   display: flex;
   align-items: center;
   justify-content: center;
   padding:20px;
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
   font-size: 20px;
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
.logo{
   margin-left:20px;
   margin-bottom:100px;
}

    </style>
</head>
<body>

<div class="logo">
   <p><a href="home.php"><img src="logohijau.png" width="100px" height="30px"></p>
</div>

<div class="container">

   <div class="content">
      <h1>Welcome to Sihate Order Management </h1>
      <a href="dashboard.php" class="btn">Dashboard</a>
      <a href="insertorder.php" class="btn">Insert</a>
      <a href="order_list.php" class="btn">Order List</a>
   </div>
</div>
</body>
</html>