<?php 

include 'config.php';

?>

<header>
    <ul>
        <li><a href="index.php">Your Room</a></li>
        <li><a href="work.php">Work</a></li>
        <li><a href="spin.php">Spin</a></li>
        <li style="float:right">  
          <div class="dropdown">
            <button class="dropbtn"><?php echo $_SESSION['username'];?> </button>
            <div class="dropdown-content">
              <a href="profile.php">About you</a>
              <a href="inventory.php">Lemari</a>
              <a href="logout.php">Take a walk ></a>
            </div>
          </div> 
        </li>
      </ul>
  </header>