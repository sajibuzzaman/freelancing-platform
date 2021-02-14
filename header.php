<div class="grid-container">
  <div class="header"><img src="images/logo.png" style="height: 100px;width: 100px;padding:10px"></div>
  <div class="job">Jobs Here</div>
  <div class="fwhite" style="padding-top: 6%">

  	<button class="button button1" id="Btn1">Home</button>
  	
  </div> 
</div>
<script>

var btn1 = document.getElementById("Btn1");



var span = document.getElementsByClassName("close")[0];



btn1.onclick = function() {
  location.href='index.php';
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