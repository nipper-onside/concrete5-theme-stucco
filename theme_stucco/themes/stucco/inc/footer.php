<?php  defined('C5_EXECUTE') or die("Access Denied.");
if (!function_exists('compat_is_version_8')) {
    function compat_is_version_8() {
        return interface_exists('\Concrete\Core\Export\ExportableInterface');
    }
}
?>

		<!-- Footer -->
		<div class="footer-container">
			<footer class="footer-content-inner" role="contentinfo">
				<div class="container">
					<div class="row">
						<!-- Footer Navigation -->
						<div class="footer-nav col-sm-6">
							<?php
							$a = new GlobalArea('Footer Navigation');
							$a->display();
							?>
						</div><!-- //Footer Navigation -->
						<!-- Social Button -->
						<div class="social-button col-sm-6">
							<nav>
								<?php
								$a = new GlobalArea('Footer Social');
								$a->display();
								?>
							</nav>
						</div><!-- //Social Button -->
						<div class="copyright col-sm-12">
							<?php
							$a = new GlobalArea('Footer Copyright');
							$a->display();
							?>
						</div>
						<div id="scroll-page-top">
							<a href="#container" class="top"><?php  echo t('Back to Top')?></a>
						</div>
					</div>
				</div>
				<?php if ( compat_is_version_8() ): ?>
				<span id="ccm-account-menu-container"></span>
				<?php endif; ?>
			</footer>
		</div><!-- //Footer -->

    	</div>

		<?php   Loader::element('footer_required'); ?>

        <script src="<?php  echo $view->getThemePath()?>/js/main.js"></script>

    </body>
</html>
