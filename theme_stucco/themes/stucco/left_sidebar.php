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
				<div class="container clearfix">
					<div class="row">
						<div id="primary" class="content-primary col-md-8 col-md-push-4">
							<main role="main">
								<article>
									<?php 
									$a = new Area('Main');
									$a->setAreaGridMaximumColumns(12);
									$a->display($c);
									?>
								</article>
							</main>
						</div>
						<div id="secondary" class="content-secondary col-md-4 col-md-pull-8" role="complementary">
							<aside class="">
								<?php 
								$a = new Area('Sidebar');
								$a->display($c);
								?>
							</aside>
						</div>
					</div>
				</div>
        		<?php 
				$a = new Area('Page Footer');
				$a->enableGridContainer();
				$a->display($c);
				?>

			</div>
		</div><!-- // Main Contents -->

<?php  $this->inc('inc/footer.php'); ?>
