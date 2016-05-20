<header class="main-header">

        <!-- Logo -->
        <a href="index.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>FAWSAP</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>FAWSAP</b> | v.1337</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs" id="username"><?php echo $name; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-body">
                    <!--<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p id="username">
                      <?php echo $name; ?>
                    </p>-->
                    <a href="index.php?logout=TRUE" class="btn btn-default btn-flat">Sign out</a>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              	<?php 
              		if ($_SESSION['isadmin'] == 1) {
              			echo "<li><a href='#' data-toggle='control-sidebar'><i class='fa fa-gears'></i></a></li>";
              		}              	
              	?>
            </ul>
          </div>
        </nav>
      </header>