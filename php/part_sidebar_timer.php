<aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $name; ?></p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- /.search form -->

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">MAIN</li>
            <li<?php if (basename($_SERVER['PHP_SELF']) == "index.php") {echo " class='active'";} ?>><a href="./index.php"><i class="fa fa-link"></i> <span>Home</span></a></li>
            <li<?php if (basename($_SERVER['PHP_SELF']) == "leaderboard.php") {echo " class='active'";} ?>><a href="./leaderboard.php"><i class="fa fa-bar-chart"></i> <span>LeaderBoard</span></a></li>
            <li class="header">CATEGORIES</li>
            <!-- Optionally, you can add icons to the links -->
			<li<?php if (basename($_SERVER['PHP_SELF']) == "bricks.php") {echo " class='active'";} ?>><a href="./bricks.php"><i class="fa fa-link"></i> <span>Bricks</span></a></li>
            <li<?php if (basename($_SERVER['PHP_SELF']) == "dvwa.php") {echo " class='active'";} ?>><a href="./dvwa.php"><i class="fa fa-link"></i> <span>DVWA</span></a></li>
            <li<?php if (basename($_SERVER['PHP_SELF']) == "xvwa.php") {echo " class='active'";} ?>><a href="./xvwa.php"><i class="fa fa-link"></i> <span>XVWA</span></a></li>
            <li class="header">PLAYLISTS</li>
			<?php
			$playlistsql = "SELECT name FROM playlists;";
			$plresult = mysqli_query($db, $playlistsql);
			if (mysqli_num_rows($plresult) > 0) {
				while($row = mysqli_fetch_assoc($plresult)) {
					echo "<li><a href='./challenge.php?playlist={$row['name']}'><i class='fa fa-link'></i><span>{$row['name']}</span></a></li>";
				}
			}
			
			?>      
			<li class="header">TIMER</li>
          	<li ><a class="avoid-clicks" href="#"><i class="fa fa-clock-o"></i><span style="color:red;" id="timer">00:00:00</span></a></li>
          	<li><a href="#"><i class="fa fa-keyboard-o"></i><span  style="color:white;" id="charCount">CharCount:</span></a></li>
          	<li><a href="#"><i class="fa fa-mouse-pointer"></i><span style="color:white;" id="clickCount">ClickCount:</span></a></li>     
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>