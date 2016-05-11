<aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel" style="margin-top:15px;margin-bottom:15px">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $name; ?></p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">MAIN</li>
            <li<?php if (basename($_SERVER['PHP_SELF']) == "index.php") {echo " class='active'";} ?>><a href="./index.php"><i class="fa fa-home"></i> <span>Home</span></a></li>
            <li<?php if (basename($_SERVER['PHP_SELF']) == "leaderboard.php") {echo " class='active'";} ?>><a href="./leaderboard.php"><i class="fa fa-bar-chart"></i> <span>LeaderBoard</span></a></li>
            <li class="header">CATEGORIES</li>
            <!-- Optionally, you can add icons to the links -->
            <?php
            	$catRes = mysqli_query($db, "SELECT DISTINCT(category) FROM challenges;");
				while ($row = mysqli_fetch_assoc($catRes)) {
					echo "<li><a href='challenge.php?category={$row['category']}'><i class='fa fa-link'></i><span>{$row['category']}</span></a></li>";
				}
            
            ?>
			<li class="header">PLAYLISTS</li>
			<?php
			$playlistsql = "SELECT name FROM playlists;";
			$plresult = mysqli_query($db, $playlistsql);
			if (mysqli_num_rows($plresult) > 0) {
				while($row = mysqli_fetch_assoc($plresult)) {
					if (basename($_SERVER['PHP_SELF']) == "challenge.php") {
						if (isset($_SESSION['current_playlist'])) {
							if ($_SESSION['current_playlist'] == $row['name']) {
								echo "<li class='active'><a href='./challenge.php?playlist={$row['name']}'><i class='fa fa-link'></i><span>{$row['name']}</span></a></li>";
							} else {
								echo "<li><a href='./challenge.php?playlist={$row['name']}'><i class='fa fa-link'></i><span>{$row['name']}</span></a></li>";
							}
						} else {
							if ($_GET['playlist'] == $row['name']) {
								echo "<li class='active'><a href='./challenge.php?playlist={$row['name']}'><i class='fa fa-link'></i><span>{$row['name']}</span></a></li>";
							} else {
								echo "<li><a href='./challenge.php?playlist={$row['name']}'><i class='fa fa-link'></i><span>{$row['name']}</span></a></li>";
							}
						}
						
					} else {
						echo "<li><a href='./challenge.php?playlist={$row['name']}'><i class='fa fa-link'></i><span>{$row['name']}</span></a></li>";
					}
					
				}
			}
			
			?>           
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>