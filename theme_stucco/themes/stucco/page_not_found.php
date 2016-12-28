<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('inc/header.php'); ?>

		<div id="main-content" class="main-container">
			<div class="main-content-inner clearfix">
				<main role="main">
					<div class="container">
						<div class="row">
							<div class="col-sm-8 col-sm-offset-2">
								<div class="jumbo">
									<h1><?php  echo t('404 Error')?></h1>
									<p><?php  echo t('Page not found, so please search.')?></p>

									<?php
										$bt = BlockType::getByHandle('search');
										$bt->controller->title = t('Search');
										$bt->controller->buttonText = t('Search');
										$bt->render();
									?>

								</div>
							</div>
						</div>
					</div>
				</main>
			</div>
		</div>

<?php  $this->inc('inc/footer.php'); ?>
