<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('inc/header_home.php');

use Concrete\Core\Validation\CSRF\Token;
?>

		<!--  Main Contents -->
		<div id="main-content" class="main-container">
			<div class="home-content-inner clearfix">
				<div class="home-upper">
					<?php
					$a = new Area('Page Header');
					$a->enableGridContainer();
					$a->display($c);
					?>
				</div>

				<main class="home-middle" role="main">
					<article>
						<?php
						$a = new Area('Main');
						$a->enableGridContainer();
						$a->display($c);
						?>
					</article>
				</main>

				<div class="home-lower">
					<?php
					$a = new Area('Page Footer');
					$a->enableGridContainer();
					$a->display($c);
					?>

					<div class="container">
						<div class="row">
							<div class="home-bottom col-sm-12">
								<span><?php  echo t('Built with <a href="http://www.concrete5.org" class="concrete5">concrete5</a> CMS.')?></span>
								<span class="pull-right">
				                    <?php
				                    if (!id(new User)->isLoggedIn()) {
				                        ?>
				                        <a href="<?php echo URL::to('/login')?>">
				                            <?php echo t('Log in') ?>
				                        </a>
				                        <?php
				                    } else {
				                        $token = new Token();
				                        ?>
				                        <form action="<?php echo URL::to('/login', 'logout') ?>">
				                            <?php id(new Token())->output('logout'); ?>
				                            <a href="#" onclick="$(this).closest('form').submit();return false">
				                                <?php echo t('Log out') ?>
				                            </a>
				                        </form>
				                        <?php
				                    }
				                    ?>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- // Main Contents -->

<?php  $this->inc('inc/footer.php'); ?>
