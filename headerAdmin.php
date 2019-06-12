<!--
  Bhumi - Creatives Platform
  Navigation Bar for Moderators User
  Dependencies: luxbar
-->
<link rel="icon" type="image/png" href="assets/img/siteicon.png" />
<link rel="stylesheet" type="text/css" href="lib/css/luxbar.min.css">
<link rel="stylesheet" type="text/css" href="lib/textbox-css/textbox.css">
<link rel="stylesheet" type="text/css" href="lib/css/w3.css">
<link rel="stylesheet" type="text/css" href="lib/font-awesome/4.7.0/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="lib/buttons/material-circle.css">
<link rel="stylesheet" type="text/css" href="assets/css/buttons.css">

<header id="luxbar" class="luxbar-fixed">
  <input type="checkbox" class="luxbar-checkbox" id="luxbar-checkbox" />
  <div class="luxbar-menu luxbar-menu-right luxbar-menu-dark">
    <ul class="luxbar-navigation">
      <li class="luxbar-header">
        <a href="#" class="luxbar-brand"><img src="assets/img/logo.png" style="width: 40%; height: 40%" alt="Bhumi Logo"></a> <label class="luxbar-hamburger luxbar-hamburger-doublespin" id="luxbar-hamburger" for="luxbar-checkbox">
	       <span></span>
	        </label>
	      </li>
	      <li class="luxbar-item"><a href="projectsAdmin.php">Home</a></li>
	      <li class="luxbar-item"><a href="approval.php">Request</a></li>
        <li class="luxbar-item"><a href="uploadingAdmin.php">Upload</a></li>
	      <li class="luxbar-item">
				<a>
					<!-- Search Bar -->
					<form action='filteredAdmin.php' method='post'>
						<input type='text' name='filter' class="textbox7" placeholder='Filter by tags' required/>
	      		<input type='submit' value='Filter' class="small button" style="color:#000;" />
	 				</form>
				  </a>
				</li>
				<li class="luxbar-item"><a href="notificationAdmin.php">Notifications</a></li>
	      <li class="luxbar-item"><a href="logout.php">Logout</a></li>
	    </ul>
	  </div>
</header>
<br><br><br>
