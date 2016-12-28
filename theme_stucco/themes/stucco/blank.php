<?php 
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('inc/header.php');
?>

		<!-- Main Contents -->
		<div id="main-content" class="main-container">
			<div class="container">
        		<div class="row">
					<div class="main-content-inner">
            			<main role="main">
							<?php 
							$a = new Area('Main');
							$a->enableGridContainer();
							$a->display($c);
							?>
						</main>
					</div>
        		</div>
			</div>
		</div><!-- //Main Contents -->

<?php  $this->inc('inc/footer.php'); ?>
