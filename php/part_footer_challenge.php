
	<!--<div class="row">-->
		<!--<div class="text-center">-->
			<ul class="pagination">
				<?php
					$num_elements = count($challengeIDs);
					for ($i = 0; $i < $num_elements; $i++) {
						$ii = $i+1;
						echo "<li><a href='./challenge.php?n={$i}'>{$ii}</a></li>";
					}				
				?>
			</ul>
		<!--</div>-->
	<!--</div>-->
	<!-- To the right -->
	<!--<div class="pull-right hidden-xs">
		Anything you want
	</div>-->
	<!-- Default to the left -->
	<!--<strong>Copyright &copy; 2015 <a href="#">Company</a>.</strong> All rights reserved.-->

