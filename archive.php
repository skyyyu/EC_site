<?php
/**
 * <meta content="charset=UTF-8">
 * @package Welcart
 * @subpackage Welcart Default Theme
 */
get_header();
?>
<div id="archive">
	<div id="content" class="two-column">
	<?php echo do_shortcode('[searchandfilter fields="category" headings="絞り込む" submit_label="検索"]'); ?>
	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	<?php /* If this is a category archive */ if (is_category()) { ?>
	<h1 class="pagetitle"><?php printf( __( 'Category Archives: %s', 'uscestheme' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>
	<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
	<h1 class="pagetitle"><?php printf( __( 'Tag Archives: %s', 'uscestheme' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h1>
	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
	<h1 class="pagetitle"><?php printf( __( 'Daily Archives: <span>%s</span>', 'uscestheme' ), get_the_time(__('Y/m/d'))); ?></h1>
	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
	<h1 class="pagetitle"><?php printf( __( 'Monthly Archives: <span>%s</span>', 'uscestheme' ), get_the_time(__('F, Y'))); ?></h1>
	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
	<h1 class="pagetitle"><?php printf( __( 'Yearly Archives: <span>%s</span>', 'uscestheme' ), get_the_time(__('Y'))); ?></h1>
	<?php /* If this is an author archive */ } elseif (is_author()) { ?>
	<h1 class="pagetitle"><?php printf( __( 'Author Archives: %s', 'uscestheme' ), "<span class='vcard'><a class='url fn n' href='" . get_author_posts_url( get_the_author_meta( 'ID' ) ) . "' title='" . esc_attr( get_the_author() ) . "' rel='me'>" . get_the_author() . "</a></span>" ); ?></h1>
	<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
	<h1 class="pagetitle"><?php _e( 'Blog Archives', 'uscestheme' ); ?></h1>
	<?php } ?>

		<div class="catbox">
			
			<?php if (have_posts()) : ?>
			<div class="navigation clearfix">
				<div class="alignright"><?php next_posts_link( __( 'Older posts', 'uscestheme' ) ); ?></div>
				<div class="alignleft"><?php previous_posts_link( __( 'Newer posts', 'uscestheme' ) ); ?></div>
			</div>
			
			<ul class="item_box">
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
			<div class="navigation clearfix">
				<div class="alignright"><?php next_posts_link( __( 'Older posts', 'uscestheme' ) ); ?></div>
				<div class="alignleft"><?php previous_posts_link( __( 'Newer posts', 'uscestheme' ) ); ?></div>
			</div>

		<?php else : ?>

			<div id="post-0" class="post error404 not-found">
				<h2 class="entry-title"><?php _e( 'Not Found', 'uscestheme' ); ?></h2>
				<div class="entry-content">
					<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'uscestheme' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</div><!-- #post-0 -->
			
		<?php endif; ?>

		</div><!-- end of catbox -->
	</div><!-- end of content -->
</div>

<?php get_footer(); ?>