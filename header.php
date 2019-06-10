<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" type="image/png" href="assets/img/siteicon.png" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<link rel="stylesheet" href="https://cdn.rawgit.com/balzss/luxbar/ae5835e2/build/luxbar.min.css">
<header id="luxbar" class="luxbar-fixed">
    <input type="checkbox" class="luxbar-checkbox" id="luxbar-checkbox"/>
    <div class="luxbar-menu luxbar-menu-right luxbar-menu-dark">
        <ul class="luxbar-navigation">
          <li class="luxbar-header">
              <a href="#" class="luxbar-brand"><img src="assets/img/logo.png" style="width: 40%; height: 40%" alt="Bhumi Logo"></a> <label class="luxbar-hamburger luxbar-hamburger-doublespin" id="luxbar-hamburger" for="luxbar-checkbox">
            <li class="luxbar-item"><a href="projects.php">Home</a></li>
            <li class="luxbar-item"><a href="myProjects.php">Projects</a></li>
            <li class="luxbar-item">
                <a>
                    <!-- Search Bar -->
                    <form action='filtered.php' method='post'>
                        <input type='text' name='filter' placeholder='Filter by tags' required/>
                        <input type='submit' value='Filter' />
                    </form>
                </a>
            </li>

            <li class="luxbar-item"><a href="uploading.php">Uploads</a></li>
            <li class="luxbar-item"><a href="notification.php">Notification </a></li>
            <li class="luxbar-item"><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</header>

<br><br><br>
