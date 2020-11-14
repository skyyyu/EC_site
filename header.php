<?php
/**
 * <meta content="charset=UTF-8">
 * @package Welcart
 * @subpackage Welcart Default Theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <script type="text/javascript" src="./js/jQuery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="./js/jquery.js"></script>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/header.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/item_single.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/new_member_page.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/in_cart.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/member_state.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/search.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/archive.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/item_category.css">
	
	

	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="wrap">
<div id="header">
	<div class="wrap">
		<div class="header_top">
			<div class="header_left">
				<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
				<<?php echo $heading_tag; ?> id="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></<?php echo $heading_tag; ?>>
			</div>
			<div class="header_right">
				<form method="get" id="searchform" action="<?php echo home_url(); ?>" class="search_form" >
					<input type="text" value="" name="s" id="s" class="searchtext" />
					<input type="submit" id="searchsubmit" value="検索" />
				</form>
				<?php if(usces_is_membersystem_state()): ?>
					<?php if(usces_is_login()){printf(__('Hello %s', 'usces'), usces_the_member_name('return'));}else{ _e('guest', 'usces');} ?>
					<div class="icon"><?php usces_loginout(); ?></div>
					<?php if(usces_is_login()): ?>
					<a href="<?php echo USCES_MEMBER_URL; ?>"><i class="far fa-user"></i></a>
					<?php endif; ?>
				<?php endif; ?>
				<?php if(usces_is_cart()): ?>
					<a href="<?php echo USCES_CART_URL; ?>" class="cart_link"><i class="fas fa-cart-plus"></i></a>
				<?php endif; ?>
			</div>
		</div>
		<ul class="mainnavi clearfix">
			<li><a href="<?php echo home_url( '/' ); ?>/">カテゴリ</a></li>
			<li><a href="<?php echo home_url( '/' ); ?>/">ブランド</a></li>
			<li><a href="<?php echo home_url( '/' ); ?>/">特集</a></li>
		</ul>
	</div>
</div><!-- end of header -->

<div id="main" class="clearfix wrap" >
<!-- end header -->
