<?php

session_start();
$sessData = !empty($_SESSION['sessData']) ? $_SESSION['sessData'] : '';
if (!empty($sessData['status']['msg'])) {
    $statusMsg     = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <?php
if (!empty($sessData['userLoggedIn']) && !empty($sessData['userID'])) {
    include 'user.php';
    $user                      = new User();
    $conditions['where']       = array(
        'id' => $sessData['userID']
    );
    $conditions['return_type'] = 'single';
    $userData                  = $user->getRows($conditions);
?>
	 <a href="userAccount.php?logoutSubmit=1" class="logout">LOGOUT</a>
	</br></br></br>
  
<a href="http://localhost/mocklocal/wordpress/thermocontent/"></a>
	
    <?php
} else {
?>
	<div class="container1">
    <h2><center>Login to Your Account</h2>
    <?php
    echo !empty($statusMsg) ? '<p class="' . $statusMsgType . '">' . $statusMsg . '</p>' : '';
?>
    <div class="regisFrm">
        <form action="userAccount.php" method="post">
            <input type="email" name="email" placeholder="EMAIL" required="">
            <input type="password" name="password" placeholder="PASSWORD" required="">
            <div class="send-button">
                <input type="submit" name="loginSubmit" value="LOGIN">
            </div>
        </form>
        <p><br/>Don't have an account? No worries!!</br>
		<br>
		<button class="button" id="myBtn">Contact Us To Grab Your Login</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Please Feel Free to Catch us at:</br>
	</br>
	nirupankumar@gmail.com</br>
	9999999999999</p>
  </div>

</div>
</p>
	<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>	
    </div>
	</div>
    <?php
}
?>

</body>
</html>