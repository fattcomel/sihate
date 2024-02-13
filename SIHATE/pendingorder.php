<?php  
 //Database connectivity  
 $conn=mysqli_connect('localhost','root','','delima_db');  
 $sql=mysqli_query($conn,"select * from purchase_form");  
 //Get Update id and status  
 
 // Query to fetch records with status "pending"
 $sql = "SELECT * FROM purchase_form WHERE status = 'pending'";
 $result = $conn->query($sql);
 
 
 // Close connection
 $conn->close();
 
 ?>

<!DOCTYPE html>  
<html>  
<head>  
     <meta charset="utf-8">  
     <meta name="viewport" content="width=device-width, initial-scale=1">  
     <title>Pending Order</title>  

     <style type="text/css">  
          body{
               background-color:white;
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
          font-family: 'Poppins', sans-serif;
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

             /*TABLE*/
   .container2 {
      width: 900px;  
      margin-bottom:50px;
      margin-left:180px;
      font-family: montserrat;
   }
   .container2 h2{
      margin-top:40px;
      margin-left:400px;
      margin-bottom:50px;
   }  
   .container2 table{ 
      width: 100%;
      border-collapse: collapse;  
      font-size: 1rem;  
      margin-top: 20px;
   }  
   .container2 table th{  
      background: orange;  
      color: black; 
      font-size: 1.2rem; 
   }  
   .container2 table td{  
      background: papayawhip;  
      color: black; 
      font-size: 0.9rem; 
      padding:10px;
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
		          <a class="nav-link" aria-current="page" href="home.php">Home</a>
		     </li>
		     <li class="nav-item">
		          <a class="nav-link" aria-current="page" href="dashboard.php">Dashboard</a>
		     </li>
		     <li class="nav-item">
		          <a class="nav-link" href="insertorder.php">Insert Order</a>
		     </li>
              <li class="nav-item">
		          <a class="nav-link " href="order_list.php">Order List</a>
		     </li>
		  </div>
		    </div>
		</nav>
    </div>
</div>


<!--DISPLAY ORDER -->

<div class="container2">  
      <table border="1">  
            <tr>  
               <th>Id</th>  
               <th>Order Number</th>
               <th>Name</th>
               <th>Description</th>
               <th>Notes</th>
            </tr>  
            <?php  
            $i=1;  
            if ($result->num_rows > 0) {
               // Output data of each row
               while ($row = $result->fetch_assoc()) { 
                  ?>  
                  <tr>  
                     <td><?php echo $i++ ?></td>                   
                     <td><?php echo $row['orderNo'] ?></td>  
                     <td><?php echo $row['name'] ?></td>       
                     <td><?php echo $row['descr'] ?></td>       
                     <td><?php echo $row['note'] ?></td>       
               <?php    }  }  
               ?>  
      </table>    
</div> 
 <script type="text/javascript">  
     function order_list(value,id){  
           //alert(id);  
           let url = "http://127.0.0.1/Sihate/order_list.php";  
           window.location.href= url+"?id="+id+"&status="+value;  
     }  
 </script>   
</body>
</html>