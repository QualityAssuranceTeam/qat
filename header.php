<?php
/**
 *	The template for displaying the Header.
 *
 *	@package WordPress
 *	@subpackage MinimalZerif
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="QA team,Quality Assurance Team,independent tester,QA Engineer,Testing Tools,Testing Techniques,Testing,Functional testing,Crossbrowser Testing">
<meta name="description" content="Enchant your business using Quality Assurance Team as a Service. Researches show that using independent testers dramatically increases the number of issues found.">
<meta name="google-site-verification" content="GmjPPHtU9hnrpFXaNKmkvCe-d_rDcFdjY6pVc1Gr41w" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/ie.css" type="text/css">
<![endif]-->
<?php wp_head(); ?>
</head>

<?php if(isset($_POST['scrollPosition'])): ?>
	<body <?php body_class(); ?> onLoad="window.scrollTo(0,<?php echo intval($_POST['scrollPosition']); ?>)">
<?php else: ?>
	<?php
	if( !is_home() ):
		$home_class = 'menu-color';
	else:
		$home_class = '';
	endif;
	?>
	<body <?php body_class( $home_class ); ?> >
<?php endif; ?>

<?php
global $wp_customize;
if(is_front_page() && !isset( $wp_customize ) && get_option( 'show_on_front' ) != 'page' ):
	$zerif_disable_preloader = get_theme_mod('zerif_disable_preloader');
	if( isset($zerif_disable_preloader) && ($zerif_disable_preloader != 1)):
		echo '<div class="preloader">';
			echo '<div class="status">&nbsp;</div>';
		echo '</div>';
	endif;
endif;
?>

<header id="home" class="header">
	<div class="top-navigation">
		<div class="container">
			<?php if( get_theme_mod( 'minimalzerif_disable_logoimage' ) != 1 ): ?>
				<div class="logo-text">
					<a href="<?php echo esc_url( get_site_url() ); ?>" class="logo-name" title="<?php bloginfo( 'name' ); ?>">
						<?php bloginfo( 'name' ); ?>
					</a><!--/.logo-name-->
					<div class="logo-description">
						<?php bloginfo( 'description' ); ?>
					</div><!--/.logo-description-->
				</div><!--/.logo-text-->
			<?php else: ?>
				<a class="logo-image" href="https://www.qualityassuranceteam.com/" title="<?php bloginfo( 'title' ); ?>"><!--/.hardcoded URL-->
				</a><!--/.a-->
			<?php endif; ?>
			<?php if( has_nav_menu( 'primary' ) ): ?>
				<div class="hambuger-menu">
					<i class="fa fa-bars"></i>
					<span><?php _e( 'Menu', 'minimalzerif' ); ?></span>
				</div><!--/.hambuger-menu-->
				<nav class="header-menu">
					<?php
					$wp_nav_menu_args = array(
						'theme_location'	=> 'primary',
						'container'			=> false,
						'menu_class'		=> 'clearfix',
						'fallback_cb'		=> ''
					);
					wp_nav_menu( $wp_nav_menu_args );
					?>
				</nav><!--/.header-menu-->
			<?php endif; ?>
		</div><!--/.container-->
	</div><!--/.top-navigation-->
