<?php
include("config.php");
session_start();
if(isset($_SESSION['username'])){
  $t=$_SESSION['username'];
$sql8="SELECT * FROM `job_application` WHERE owner='$t'";
$request=mysqli_query($connection,$sql8);
$number=mysqli_num_rows($request);

$sql19="SELECT * FROM `posts` WHERE job_stat='assigned' && submission!='' && posted_by='$t' && accept=''";
$request2=mysqli_query($connection,$sql19);
$submission=mysqli_num_rows($request2);
}
else{
  header('location:index.php');
}
?>
<html>
<head>
  <title>Jobs here</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/font.css">
<link rel="shortcut icon" href="images/logo.png">
<style>
.error {color: #FF0000;}
</style>
</head>
<body bgcolor="#E6E6FA">

	<?php
     $subjectErr =  "";
     $subject =  "";
     $categoryErr =  "";
     $category =  "";
      
      if(isset($_POST['submit']))
      {  require_once("config.php");

        if (empty($_POST["subject"])) {
          $subjectErr = "Subject is required";
        } else {
          $subject=$_POST['subject'];
          }
        

        //$subject=$_POST['subject'];
        $price=$_POST['price'];
        $details=$_POST['details'];
        $poster=$_SESSION['username'];
        
        if(empty($_POST['category'])){
          $categoryErr = "Category is required";
        }
        else{
          $temp=$_POST['category'];
        $category=implode(",", (array)$temp);
        }
        if(!$subject){
          echo '<script type="text/javascript"> alert("subject fields are required!") </script>';
          //echo 'subject fields are required!';
      }else{
        
        $sql="INSERT INTO `posts` (`postid`, `subject`, `price`, `posted_by`, `category`, `post_detail`, `job_stat`) VALUES (NULL, '$subject', '$price', '$poster', '$category', '$details', 'pending')";
        $result=mysqli_query($connection,$sql);
        if($result)
        {
          //echo"Your job has been posted";
          
          //header('location:clienthome.php');
          //echo '<script type="text/javascript"> alert("Your job has been posted") </script>';
          echo'<script type="text/javascript">
              alert("Your job has been posted");
              location="clienthome.php";
               </script>';
        }
        else{
          echo"sorry try again";
        }
      }
        
      }

      
     
      
      if(isset($_GET['status'])){
        if ($_GET['status']=='logout') {
          session_destroy();
        header('location:index.php');
        }
    
      }
      


      


  ?>
 
  <div >
    <span></span>
    <span ></span>

  </div>
  <!-------------------------header design--------------------->
  <div class="w3-row w3-dark-gray">
    <div class="w3-col s1">
      <img src="images/logo.png" style="height: 100px;width: 100px;padding:10px">
    </div>
    <div class="w3-col s3">
      <span class="jobb">Jobs here</span>
    </div>
  </div>



  
  <div class="w3-bar w3-black w3-border w3-padding">
    <a href="clienthome.php" class="w3-bar-item w3-button w3-mobile"><b>Home</b></a>
    <a href="jobapplied.php" class="w3-bar-item w3-button w3-mobile">Job Application<span class="w3-badge w3-blue"><?php echo"$number";?></span></a>
    <a href="finaljob.php" class="w3-bar-item w3-button w3-mobile">Submission<span class="w3-badge w3-blue"><?php echo"$submission";?></span></a>
    
    <form class="w3-bar-item w3-mobile w3-button" style="display: inline;padding: 0;" action="userlist.php" method="POST">
    	<input type="text" name="take" class="w3-bar-item w3-input w3-light-grey w3-mobile" style="" placeholder="Enter category to find expert" style="display: inline;">
        <input type="submit" name="submit" value="Go" style="display: inline;" class="w3-button w3-green">
    </form>

     <a href="userlist.php" class="w3-bar-item w3-button w3-mobile">View users</a>
     <a href="clientpost.php" class="w3-bar-item w3-button w3-mobile">Your posts</a>
     <a href="clienthome.php?status=logout" class="w3-bar-item w3-button w3-mobile">Logout</a>

  </div>




  <!---------------------body starts from here------------------------------------->
  <div class="w3-panel w3-border-top w3-border-bottom w3-border-green">
    <h2>Welcome <?php echo$_SESSION['username']; ?></h2>
  </div>

  <div>
    <div>
      
    </div>
    <div>
      
    </div>
    <div>
      
    </div>
  </div>
   
   <h3>New here ! Post a job.</h3>
   <form class="w3-container" method="post"  id="pform" style="padding-left: 20%;padding-right: 20%;background-color: transparent;padding-top: 5%;">
          
                 <p>
                     <label>Enter a subject name that the project is related to</label>
                        <input class="w3-input w3-hover-teal" type="text" name="subject"  style="background-color: rgb(255, 255, 255,0.5)" value="<?php echo $subject;?>">
                        <span class="error">* <?php echo $subjectErr;?></span>
                        <br><br>
                </p>
                
                 <p>
                    <label>Price</label>
                    <input class="w3-input w3-hover-teal w3-border" type="number" step="0.001" name="price" style="background-color: rgb(255, 255, 255,0.5)" >
                 </p>
                 <p>
                    <label>Enter details of the job</label><br>
                    <textarea rows="4" cols="50" name="details" form="pform" style="background-color: rgb(255, 255, 255,0.5)">
Enter details here...</textarea>
                 </p>
                
                <h3>Choose category for this job</h3>
                <p>
                  <input type="checkbox" name="category[]" value="php">PHP         
                  <input type="checkbox" name="category[]" value="html">HTML 
                  <input type="checkbox" name="category[]" value="designing">Designing 
                  <input type="checkbox" name="category[]" value="photoshop">Photoshop 
                  <input type="checkbox" name="category[]" value="data-entry">Data entry 
                  <input type="checkbox" name="category[]" value="writing">Article writing<br>
                  <input type="checkbox" name="category[]" value="android">Android
                  <input type="checkbox" name="category[]" value="excel">Excel
                  <input type="checkbox" name="category[]" value="css">CSS design
                  <input type="checkbox" name="category[]" value="seo">SEO
                  <input type="checkbox" name="category[]" value="iphone">iphone
                  <input type="checkbox" name="category[]" value="mysql">MySql
                  <input type="checkbox" name="category[]" value="research">Research<br>
                  <input type="checkbox" name="category[]" value="linux">Linux
                  <input type="checkbox" name="category[]" value="c++">C++ Programming
                  <input type="checkbox" name="category[]" value="java">Java
                  <input type="checkbox" name="category[]" value="python">Python
                
                </p>
                     <input type="submit" name="submit" value="Submit" class="w3-input w3-teal w3-round-xxlarge w3-hover-blue">
            </form>
 
 <!-------------------------footer design--------------------->
     <div class="grid-foot">

    <div>Contact Us<br>+8801234567890<br><br>Email<br>help@jobshere.com<br><br>Address<br>Dhaka, Bangladesh</div>
    <div>Our Resources<br><br>Tools<br>Tutorial<br>Help desk<br>Opportunities</div>
    <div>About us<br><br>How it work<br>Our objectives<br></div>
    <div><br>We provide a common field for client<br> and freelancer so that thye can interact<br> with each other easily.<br> This benifites everyone. <br><br><br><br>All rights researved to jobs here</div>
    
  </div>
  

  <!--------------------------------modal for login---------------------------------------->

   

<!---------------------------------Another model for signup-------------------------------------->

    

  <script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>
  
</body>
</html>