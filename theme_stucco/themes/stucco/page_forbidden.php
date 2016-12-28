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
									<h1><?php  echo t('403 Error')?></h1>
									<p><?php  echo t('You are not allowed to access this page.')?></p>
								</div>
							</div>
						</div>
					</div>
				</main>
			</div>
		</div>

<?php  $this->inc('inc/footer.php'); ?>
