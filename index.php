<html>
<head>
	<title>Jobs here</title>
	
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/font.css">
<link rel="shortcut icon" href="images/logo.png">
</head>
<body>
  <?php

      session_start();
      if(isset($_POST['submit']))
      {  require_once("config.php");
         $username=$_POST['username'];
         $password=$_POST['password'];
         $type=$_POST['type'];
        
         
        $sql="SELECT * FROM `$type` WHERE username='$username' and password='$password' and status='approved'";
        $result=mysqli_query($connection,$sql);
        if(mysqli_num_rows($result)>0)
        {

          echo"<script>alert('successfully logged in to database')</script>";
          $_SESSION['username']=$username;
          $_SESSION['type']=$type;
          if($type==="user")
          {
            header('location:admin.php');
          }
          else if($type==="freelancer")
          {
            header('location:freelancerhome.php');
          }
          else if($type==="client")
          {
            header('location:clienthome.php');
          }
          
        }
        else{
          echo"<script>alert('Wrong Username or Password!')
          header('location:index.php');
          </script>";
        
        }
        
      }
      


  ?>
	<div >
		<span></span>
		<span ></span>

	</div>
	<div class="grid-container">
  <div class="header"><img src="images/logo.png" style="height: 100px;width: 100px;padding:10px"></div>
  <div class="job">Jobs Here</div>
  <div class="fwhite" style="padding-top: 6%">
  	<button class="button button1" id="Btn">Login</button>
  	<button class="button button1" id="Btn1">Signup</button>
  	
  </div> 
</div>
<div class="addimage">
  	<div class="addtext">
  		<h1 style="font-size:50px">Hire expert freelancers for any job, online</h1>
    <h3>Millions of small businesses use Freelancer to turn their ideas into reality.</h3>
    <button class="button button2" id="Btn2">I want to work</button>
    <button class="button button2" id="Btn3">I want to Hire</button>
  	</div>
  	
  </div> 
  <div>
  	<h3 class="heading">Don't waste your talent.</h3>
  	<h3 class="heading">Choose your skill and get started now.</h3>
  	<div class="grid-container3">
  		<div><img src="images/web.png" style="height: 150px;width: 150px">
        <h2>Web development</h2>
  		</div>
  		<div><img src="images/research.png" style="height: 150px;width:150px">
        <h2>Web Research</h2>
  		</div>
  		<div><img src="images/mobile.png" style="height: 150px;width: 150px">
        <h2>App development</h2>
  		</div>
  		<div><img src="images/designer.png" style="height: 150px;width: 150px">
 		<h2>Graphic Design</h2>
  		</div>
  		
  	</div>
  </div>
  <div>
  	<h2></h2>
  	 <div class="grid-foot">

  	<div>Contact Us<br>+8801234567890<br><br>Email<br>help@jobshere.com<br><br>Address<br>Dhaka, Bangladesh</div>
  	<div>Our Resources<br><br>Tools<br>Tutorial<br>Help desk<br>Opportunities</div>
  	<div>About us<br><br>How it work<br>Our objectives<br></div>
  	<div><br>We provide a common field for client<br> and freelancer so that thye can interact<br> with each other easily.<br> This benifites everyone. <br><br><br><br>All rights researved to jobs here</div>
  	
  </div>
  </div>

  <!--------------------------------modal for login---------------------------------------->

    <div id="modal1" class="modal">
  <form class="modal-content animate" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('modal1').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" class="w3-input" name="username" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" class="w3-input" name="password" required>
      <label>Please select your account type</label><br>
      <input type="radio" name="type" value="user" checked required="required">Admin<br>
      <input type="radio" name="type" value="freelancer">Freelancer<br>
      <input type="radio" name="type" value="client">Client<br>
      <input type="submit" value="Submit" name="submit" class="w3-input">  
      
      
    </div>
  </form>
</div>

<!---------------------------------Another model for signup-------------------------------------->

    

  <script>

var modal = document.getElementById('modal1');

var nmodal = document.getElementById('modal2');


var btn = document.getElementById("Btn");
var btn1 = document.getElementById("Btn1");
var btn2 = document.getElementById("Btn2");
var btn3 = document.getElementById("Btn3");


var span = document.getElementsByClassName("close")[0];


btn.onclick = function() {
  modal.style.display = "block";
}
btn1.onclick = function() {
  location.href='signup.php';
}
btn2.onclick = function() {
  modal.style.display = "block";
}
btn3.onclick = function() {
  modal.style.display = "block";
}

span.onclick = function() {
  modal.style.display = "none";
}



window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }

  if (event.target == nmodal) {
    nmodal.style.display = "none";
  }

}
</script>
  
</body>
</html>