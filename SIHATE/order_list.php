<?php  
 //Database connectivity  
 $conn=mysqli_connect('localhost','root','','delima_db');  
 $sql=mysqli_query($conn,"select * from purchase_form");  
 //Get Update id and status  
 if (isset($_GET['id']) && isset($_GET['status']) ) {  
     $id=$_GET['id'];  
     $status=$_GET['status'];  
     mysqli_query($conn,"UPDATE purchase_form SET status='$status' where id='$id'");  
     header("location:order_list.php");  
     die();  
}  

?>  
<!DOCTYPE html>  
<html>  
<head>  
     <meta charset="utf-8">  
     <meta name="viewport" content="width=device-width, initial-scale=1">  
     <title>Order List</title>  

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
               width: 100%;  
          }
          .container2 table{ 
               width: 500px;
               border-collapse: collapse;  
               font-size: 1rem;  
               margin-left:90px;
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
          select{  
               width: 155px;  
               padding: 0.5rem 0;  
               font-size: 1rem;
               font-family: montserrat;  
          }   
          .btn{  
               text-decoration: none;  
               color: #FFF;  
               background-color: #e74c3c;  
               padding: 5px 20px;  
               border-radius: 3px;  
          }  
          .btn:hover{  
               background-color: #c0392b;  
          }  
          .btn2{  
               text-decoration: none;  
               color: #fff;  
               background-color: green;  
               padding: 5px ;  
               border-radius: 3px;  
          }  
          .btn2:hover{  
               background-color: green;  
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
		          <a class="nav-link active" href="order_list.php">Order List</a>
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
               <th>From</th>
               <th>Order Number</th>
               <th>Name</th>  
               <th>Phone No</th>  
               <th>Description</th>
               <th>Date</th>
               <th>Status</th>  
               <th>Update Status</th>  
               <th>Update by</th>
               <th>Notes</th>
               <th colspan="2">Operation</th>
          </tr>  
          <?php  
          $i=1;  
          if (mysqli_num_rows($sql)>0){  
               while ($row=mysqli_fetch_assoc($sql)) { 
               ?>  
               <tr>  
                    <td><?php echo $i++ ?></td>                   
                    <td><?php echo $row['placed'] ?></td>  
                    <td><?php echo $row['orderNo'] ?></td>  
                    <td><?php echo $row['name'] ?></td>  
                    <td><?php echo $row['phoneNo'] ?></td> 
                    <td><?php echo $row['descr'] ?></td>  
                    <td><?php echo $row['date'] ?></td>  
 
                    <td>  
                         <?php  
                         if ($row['status']=="pending") {  
                              echo "Pending";  
                         }if ($row['status']=="delivered") {  
                              echo "Delivered";  
                         } 
                         ?>  
                    </td>  
                    <td>  
                         <select onchange="order_list(this.options[this.selectedIndex].value,'<?php echo $row['id'] ?>')">  
                              <option value="">Update Status</option>  
                              <option value="pending">Pending</option>  
                              <option value="delivered">Delivered</option>  
                         </select>  
                    </td> 
                    <td><?php echo $row['updateby'] ?></td>  
                    <td><?php echo $row['note'] ?></td>  
                    <td><a href='edit.php?id=<?php echo $row['id'] ?>' class='btn2'>Notes</td>                    
                    <td><a href='delete.php?id=<?php echo $row['id'];?>' class='btn'>Delete</a></td>             
                    <?php      }  
            } ?>  
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