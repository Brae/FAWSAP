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

          <!-- search form (Optional) -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">MAIN</li>
            <li><a href="./index.php"><i class="fa fa-link"></i> <span>Home</span></a></li>
            <li class="header">APPS</li>
            <!-- Optionally, you can add icons to the links -->
			<li><a href="./bricks.php"><i class="fa fa-link"></i> <span>Bricks</span></a></li>
            <li><a href="./dvwa.php"><i class="fa fa-link"></i> <span>DVWA</span></a></li>
            <li><a href="./xvwa.php"><i class="fa fa-link"></i> <span>XVWA</span></a></li>
            <li class="active"><a href="./leaderboard.php"><i class="fa fa-bar-chart"></i> <span>LeaderBoard</span></a></li>
			<li class="header">CHALLENGES</li>
            <li><a href="./easy.php?n=0"><i class="fa fa-link"></i> <span>Easy</span></a></li>            
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>