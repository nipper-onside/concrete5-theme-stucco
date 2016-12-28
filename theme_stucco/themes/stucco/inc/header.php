<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('inc/header_top.php');
?>
		<!-- Header -->
		<div id="header-content" class="header-container">
            <header class="header-content-inner clearfix" role="banner">
                <div class="header-logo col-xs-9 col-sm-6 col-md-4">
					<?php
					$a = new GlobalArea('Header Site Title');
					$a->display();
					?>
				</div>
				<div class="header-conctens col-sm-6 col-md-8">
					<div class="row">
						<div class="header-navi clearfix">
							<?php
							$a = new GlobalArea('Header Navigation');
							$a->display();
							?>
						</div>
						<div class="header-search clearfix">
							<?php
							$a = new GlobalArea('Header Search');
							$a->display();
							?>
						</div>
					</div>
				</div>
			</header>
			<!-- Global Navigation -->
			<div class="global-navi<?php $u = new User(); if ( $u->isLoggedIn() ) { echo ' login'; } ?>">
				<?php
					$a = new GlobalArea('Global Navigation');
					$a->display();
				?>
			</div><!-- //Global Navigation -->
        </div><!-- //Headerー -->
