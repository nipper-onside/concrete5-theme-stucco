<?php 
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('inc/header.php');
?>

		<!--  Main Contents -->
		<div id="main-content" class="main-container">
			<div class="main-content-inner clearfix">
				<?php 
				$a = new Area('Page Header');
				$a->enableGridContainer();
				$a->display($c);
				?>
				<main role="main">
					<article>
						<?php 
						$a = new Area('Main');
						$a->enableGridContainer();
						$a->display($c);
						?>
					</article>
				</main>
				<?php 
				$a = new Area('Page Footer');
				$a->enableGridContainer();
				$a->display($c);
				?>
			</div>
		</div><!-- // Main Contents -->

<?php  $this->inc('inc/footer.php'); ?>
