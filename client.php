<html>
<head>
  <title>Jobs here</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/font.css">
<link rel="shortcut icon" href="images/logo.png">
</head>
<body background="images/bg4.jpg" style="background-size: cover;">
  <?php

      if(isset($_POST['submit']))
      {  require_once("config.php");
         $name=$_POST['name'];
         $dob=$_POST['dob'];
         $gender=$_POST['gender'];
         $email=$_POST['email'];
         $username=$_POST['username'];
         $password=$_POST['password'];
         $phone=$_POST['phone'];
         $address=$_POST['address'];
         $profession=$_POST['profession'];
         $company=$_POST['company'];
        

        $sql="INSERT INTO `client` (`cid`, `name`, `dob`, `gender`, `email`, `phone`, `address`, `profession`, `company`, `review`, `total_rat`, `rating`, `username`, `password`, `status`) VALUES ('', '$name', '$dob', '$gender', '$email', '$phone', '$address', '$profession', '$company', '0', '0', '0', '$username', '$password', 'waiting')";
        $result=mysqli_query($connection,$sql);
        if($result)
        {
          echo"successfully inserted to database";
          header('location:index.php');
        }
        else{
          echo"sorry try again";
        }
        
      }
      


  ?>
  <div >
    <span></span>
    <span ></span>
  </div>
 <?php
include('header.php');
 ?>


   <div class="w3-container w3-blue" align="center">
    <h2>You are going to be a client !</h2>
   </div>
   <div class="bg-img">
  <form class="w3-container" method="post" style="padding-left: 20%;padding-right: 20%;background-color: transparent;padding-top: 5%;">
          
                 <p>
                     <label class="w3-text-white">Name</label>
                        <input class="w3-input w3-hover-light-blue" type="text" name="name" style="background-color: rgb(255, 255, 255,0.3)">
                </p>
                <p>
                        <label class="w3-text-white">Date of Birth</label>
                        <input class="w3-input w3-hover-light-blue w3-border" type="date" name="dob" style="background-color: rgb(255, 255, 255,0.3)">
                </p>
                <p>
                        <label class="w3-text-white">Gender</label><br>
                        <input type="radio" name="gender" value="male" checked class="w3-text-white"><label class="w3-text-white">Male</label><br>
                        <input type="radio" name="gender" value="female"><label class="w3-text-white">Female</label><br>
                        
                </p>
                
              
                 <p>
                     <label class="w3-text-white">Email</label>
                        <input class="w3-input w3-hover-light-blue w3-border" type="email" name="email" style="background-color: rgb(255, 255, 255,0.3)"></p>
                  <p>
                     <label>Username</label>
                        <input class="w3-input w3-hover-teal" type="text" name="username" style="background-color: rgb(255, 255, 255,0.5)">
                </p>
                <p>
                     <label>Password</label>
                        <input class="w3-input w3-hover-teal" type="Password" name="password" style="background-color: rgb(255, 255, 255,0.5)">
                </p>
                 <p>
                     <label class="w3-text-white">Phone</label>
                      <input class="w3-input w3-hover-light-blue w3-border" type="number" name="phone" style="background-color: rgb(255, 255, 255,0.3)"></p>
                 <p>
                     <label class="w3-text-white">Address</label>
                        <input class="w3-input w3-hover-light-blue" type="text" name="address" style="background-color: rgb(255, 255, 255,0.3)">
                </p>

                <p>
                     <label class="w3-text-white">Your Profession</label>
                        <input class="w3-input w3-hover-light-blue" type="text" name="profession" style="background-color: rgb(255, 255, 255,0.3)">
                </p>
                <p>
                     <label class="w3-text-white">Your Company Name</label>
                        <input class="w3-input w3-hover-light-blue" type="text" name="company" style="background-color: rgb(255, 255, 255,0.3)">
                </p>
                
                     <input type="submit" value="Submit" name="submit" class="w3-input w3-teal w3-round-xxlarge w3-animate-input w3-hover-blue">
            </form>
        </div>

<?php
include('footer.php');
 ?>
  <!--------------------------------modal for login---------------------------------------->

   

<!---------------------------------Another model for signup-------------------------------------->

   
  
  
</body>
</html>