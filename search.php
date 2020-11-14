<?php
/**
 * <meta content="charset=UTF-8">
 * @package Welcart
 * @subpackage Welcart Default Theme
 */
get_header();
?>
<div id="search">

	<div id="content" class="two-column">

		<h1 class="pagetitle"><?php _e('Search Results', 'usces'); ?></h1>

		<div class="catbox">

		<?php if (have_posts()) : ?>
			
			<div class="navigation">
			<div class="alignleft"><?php next_posts_link(__('Next article &raquo;', 'usces')); ?></div>
			<div class="alignright"><?php previous_posts_link(__('&laquo; Previous article', 'usces')); ?></div>
			</div>
			<div class="serch_result">
				<?php while (have_posts()) : the_post(); ?>
				<li class="item_list">
					<a href="<?php the_permalink() ?>">
						<div class="thumimg"><?php usces_the_itemImage(0, 108, 108); ?></div>
						<div class="thumtitle"><?php usces_the_itemName(); ?></div>
						<div class="price"><?php usces_crform( usces_the_firstPrice('return'), true, false ); ?><?php usces_guid_tax(); ?></div>
					</a>
				</li>
				
				<?php endwhile; ?>
			</div>
			
			<div class="navigation">
			<div class="alignleft"><?php next_posts_link(__('Next article &raquo;', 'usces')); ?></div>
			<div class="alignright"><?php previous_posts_link(__('&laquo; Previous article', 'usces')); ?></div>
			</div>

		<?php else : ?>

			<p><?php echo __('No posts found.', 'usces'); ?></p>
			
		<?php endif; ?>

		</div><!-- end of catbox -->
	</div><!-- end of content -->
	<div class="item_wrap">
		<h3 class="item_sub_title">あなたにおすすめ商品</h3>
		<?php query_posts( array('category_name'=>'itemgenre', 'posts_per_page'=>5, 'post_status'=>'publish') ); ?>
		<ul class="item_box">
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); usces_the_item(); ?>
			<li class="item_list">
				<a href="<?php the_permalink() ?>">
					<div class="thumimg"><?php usces_the_itemImage(0, 108, 108); ?></div>
					<div class="thumtitle"><?php usces_the_itemName(); ?></div>
					<div class="price"><?php usces_crform( usces_the_firstPrice('return'), true, false ); ?><?php usces_guid_tax(); ?></div>
				</a>
			</li>
		<?php endwhile; ?>
		</ul>
		<a href="/" class="set_btn">商品一覧</a>
		<?php else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php endif; wp_reset_query(); ?>
	</div>
</div>

<?php get_footer(); ?>
