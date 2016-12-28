<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('inc/header_top.php');
?>
		<!-- Header -->
		<?php  if ($c->isEditMode()): ?>
		<div id="header-content" class="edit-mode header-container">
		<?php  else: ?>
		<div id="header-content" class="front-page header-container">
		<?php  endif ?>
            <header class="header-content-inner" role="banner">
                <div class="header-logo col-xs-9">
					<?php
					$a = new GlobalArea('Header Site Title');
					$a->display();
					?>
				</div>

				<div class="header-conctens container">
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
			<aside class="hero-area">
				<?php
				$a = new Area('Hero Area');
				$a->display($c);
				?>
			</aside>
			<!-- Global Navigation -->
			<div class="global-navi">
				<?php
				$a = new GlobalArea('Global Navigation');
				$a->display();
				?>
			</div><!-- //Global Navigation -->
        </div><!-- //Header -->