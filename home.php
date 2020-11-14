<?php
/**
 * <meta content="charset=UTF-8">
 * @package Welcart
 * @subpackage Welcart Default Theme
 */
get_header();
?>
<?php echo do_shortcode('[slick-slider]'); ?>
<div class="main_wrapper">
	<?php
	get_sidebar( 'home' );
	?>



	<div class="three-column">
		<div id="content">


			<!--
			<?php /* Section of Recommended Products *******************************/ ?>
			<div class="title"><?php _e('Items recommended','usces') ?></div>
			<div class="clearfix">
			<?php query_posts( array('category_name'=>'itemreco', 'posts_per_page'=>8, 'post_status'=>'publish') ); ?>
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); usces_the_item(); ?>
			<div class="thumbnail_box">
				<div class="thumimg"><a href="<?php the_permalink() ?>"><?php usces_the_itemImage(0, 108, 108); ?></a></div>
				<div class="thumtitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php usces_the_itemName(); ?> (<?php usces_the_itemCode(); ?>)</a></div>
				<div class="price"><?php usces_crform( usces_the_firstPrice('return'), true, false ); ?><?php usces_guid_tax(); ?></div>
			</div>
			<?php endwhile; ?>
			<?php else: ?>
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
			<?php endif; wp_reset_query(); ?>
			</div>
			<?php /******************************************************************/ ?>
			-->


			<div class="item_wrap">
				<h3 class="item_sub_title">おすすめ商品</h3>
				<?php query_posts( array('category_name'=>'itemnew', 'posts_per_page'=>6, 'post_status'=>'publish') ); ?>
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
				<a href="/category" class="set_btn">商品一覧</a>
				<?php else: ?>
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				<?php endif; wp_reset_query(); ?>
			</div>

			<div class="item_wrap">
				<?php
				$args = array(
				'post_type' => 'topic',
				'posts_per_page' => -1,
				); ?>
				
				<?php $my_query = new WP_Query( $args ); ?>
				<h3 class="item_sub_title">トピック</h3>
				<ul class="topic_box">
				<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
				<!-- ▽ ループ開始 ▽ -->
					<li class="topic_list">
						<a href="<?php if( get_field('url') ) { ?>
								<?php the_field('url'); ?><?php } ?>">
							<?php
								if(has_post_thumbnail()):
									the_post_thumbnail();
								else:
								?>
								<img src="<?php echo get_template_directory_uri(); ?>/images/no-image.png" alt="" />
								<?php endif; ?>
							<p><?php the_time('Y.m.d'); ?></p>
							<h3><?php the_title(); ?></h3>
						</a>
					</li>
					
				
				<!-- △ ループ終了 △ -->
				
				<?php endwhile; ?>
				
				</ul>
				<a href="/"></a>
				
				<?php wp_reset_postdata(); ?>
			</div>
		</div>

	</div><!-- end of content -->

	<?php //get_sidebar( 'home' ); ?>
</div>




<?php get_footer(); ?>
