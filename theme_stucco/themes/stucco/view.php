<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('inc/header.php'); ?>

		<div id="main-content" class="main-container">
			<div class="main-content-inner clearfix">
				<main role="main">
					<div class="container">
						<div class="row">
				            <div class="col-sm-12">
				                <?php  Loader::element('system_errors', array('format' => 'block', 'error' => $error, 'success' => $success, 'message' => $message)); ?>
				                <?php  print $innerContent; ?>
				            </div>
						</div>
					</div>
				</main>
			</div>
		</div>

<?php  $this->inc('inc/footer.php'); ?>
