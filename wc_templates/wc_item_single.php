<?php
/**
 * <meta content="charset=UTF-8">
 * @package Welcart
 * @subpackage Welcart Default Theme
 */
get_header();
?>
<div id="item-single">
<div class="catbox">

<?php if (have_posts()) : the_post(); ?>

	<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
		<h1 class="item_page_title"><?php the_title(); ?></h1>
		<div class="storycontent">

			<?php usces_remove_filter(); ?>
			<?php usces_the_item(); ?>

			<div id="itempage">
				<div class="item_page">
					<div class="itemimg">
						<ul class="slides">
							<li class="image_place active" id="image_0"><?php usces_the_itemImage(0, 300, 300, $post); ?></li>
							<?php $imageid = usces_get_itemSubImageNums(); ?>
							<?php foreach ( $imageid as $id ) : ?>
							<li class="image_place" id="image_<?php echo $id ?>"><?php usces_the_itemImage($id, 300, 300, $post); ?></li>
							<?php endforeach; ?>
						</ul>
						<a style="display:none" href="<?php usces_the_itemImageURL(0); ?>" <?php echo apply_filters('usces_itemimg_anchor_rel', NULL); ?>><?php usces_the_itemImage(0, 300, 300, $post); ?></a>
						<ul class="itemsubimg">
							<li class="active" id="image_0"><?php usces_the_itemImage(0, 300, 300, $post); ?></li>
							<?php $imageid = usces_get_itemSubImageNums(); ?>
							<?php foreach ( $imageid as $id ) : ?>
								<li id="image_<?php echo $id ?>"><?php usces_the_itemImage($id, 135, 135, $post); ?></li>
							<?php endforeach; ?>
						</ul>
						<!-- end of itemsubimg -->
					</div>

		<?php if(usces_sku_num() === 1) : usces_have_skus(); ?>
					<!--1SKU-->
					<div class="item_state">
						<h2 class="item_name"><?php usces_the_itemName(); ?> (<?php usces_the_itemCode(); ?>)</h2>
						<div class="exp clearfix">
							<div class="field">
							<?php if( usces_the_itemCprice('return') > 0 ) : ?>
							<?php endif; ?>
								<div class="field_name"><?php _e('selling price', 'usces'); ?></div>
								<div class="field_price"><?php usces_the_itemPriceCr(); ?><?php usces_guid_tax(); ?></div>
							</div>
							
							<div class="field"><?php _e('stock status', 'usces'); ?> : <?php usces_the_itemZaikoStatus(); ?></div>
								
							<?php if( $item_custom = usces_get_item_custom( $post->ID, 'list', 'return' ) ) : ?>
							<div class="field"><?php echo $item_custom; ?></div>
							<?php endif; ?>

							<?php the_content(); ?>
						</div><!-- end of exp -->
						

					<form action="<?php echo USCES_CART_URL; ?>" method="post">
						<?php usces_the_itemGpExp(); ?>
						<div class="skuform" align="right">
						<?php if (usces_is_options()) : ?>
							<table class='item_option'>
								<caption><?php _e('Please appoint an option.', 'usces'); ?></caption>
							<?php while (usces_have_options()) : ?>
								<tr><th><?php usces_the_itemOptName(); ?></th><td><?php usces_the_itemOption(usces_getItemOptName(),''); ?></td></tr>
							<?php endwhile; ?>
							</table>
						<?php endif; ?>

						<!--在庫数を実数表示-->
						<div class="stock_item">
							<?php usces_the_item(); ?> 
							<?php usces_have_skus(); ?> 
							<?php
							$stock_rest = usces_the_itemZaikoNum('return');
								if( $stock_rest >= 10 ){ 
									echo '在庫十分';
									$color = 'deepskyblue';
								} elseif ( 4 < $stock_rest && $stock_rest < 10 ){ 
									echo '在庫少';
									$color = 'lightsalmon';
								} elseif ( 0 < $stock_rest && $stock_rest < 5 ){ 
									echo $stock_rest. '本限定！';
									$color = 'red';
								}
							?>
						</div>
						<!--在庫数を実数表示（終了）-->

						<?php if( !usces_have_zaiko() ) : ?>
							<div class="zaiko_status"><?php echo apply_filters('usces_filters_single_sku_zaiko_message', esc_html(usces_get_itemZaiko( 'name' ))); ?></div>
						<?php else : ?>
							<div style="margin-top:10px"><?php _e('Quantity', 'usces'); ?><?php usces_the_itemQuant(); ?><?php usces_the_itemSkuUnit(); ?><br><?php usces_the_itemSkuButton(__('Add to Shopping Cart', 'usces'), 0); ?></div>
							<div class="error_message"><?php usces_singleitem_error_message($post->ID, usces_the_itemSku('return')); ?></div>
						<?php endif; ?>
						</div><!-- end of skuform -->
						<?php echo apply_filters('single_item_single_sku_after_field', NULL); ?>
						<?php do_action('usces_action_single_item_inform'); ?>
					</form>
					<?php do_action('usces_action_single_item_outform'); ?>

		<?php elseif(usces_sku_num() > 1) : usces_have_skus(); ?>
					<!--some SKU-->
					<h2 class="item_name"><?php usces_the_itemName(); ?> (<?php usces_the_itemCode(); ?>)</h2>
					<div class="exp clearfix">
						<?php the_content(); ?>
						<?php if( $item_custom = usces_get_item_custom( $post->ID, 'list', 'return' ) ) : ?>
						<div class="field">
							<?php echo $item_custom; ?>
						</div>
						<?php endif; ?>
					</div><!-- end of exp -->

					<form action="<?php echo USCES_CART_URL; ?>" method="post">
						<div class="skuform">
							<table class="skumulti">
								<thead>
								<tr>
									<th rowspan="2" class="thborder"><?php _e('order number', 'usces'); ?></th>
									<th colspan="2"><?php _e('Title', 'usces'); ?></th>
						<?php if( usces_the_itemCprice('return') > 0 ) : ?>
									<th colspan="2">(<?php _e('List price', 'usces'); ?>)<?php _e('selling price', 'usces'); ?><?php usces_guid_tax(); ?></th>
						<?php else : ?>
									<th colspan="2"><?php _e('selling price', 'usces'); ?><?php usces_guid_tax(); ?></th>
						<?php endif; ?>
								</tr>
								<tr>
									<th class="thborder"><?php _e('stock status', 'usces'); ?></th>
									<th class="thborder"><?php _e('Quantity', 'usces'); ?></th>
									<th class="thborder"><?php _e('unit', 'usces'); ?></th>
									<th class="thborder">&nbsp;</th>
								</tr>
								</thead>
								<tbody>
						<?php do { ?>
								<tr>
									<td rowspan="2"><?php usces_the_itemSku(); ?></td>
									<td colspan="2" class="skudisp subborder"><?php usces_the_itemSkuDisp(); ?>
							<?php if (usces_is_options()) : ?>
										<table class='item_option'>
										<caption><?php _e('Please appoint an option.', 'usces'); ?></caption>
								<?php while (usces_have_options()) : ?>
											<tr>
												<th><?php usces_the_itemOptName(); ?></th>
												<td><?php usces_the_itemOption(usces_getItemOptName(),''); ?></td>
											</tr>
								<?php endwhile; ?>
										</table>
							<?php endif; ?>
									</td>
									<td colspan="2" class="subborder price">
							<?php if( usces_the_itemCprice('return') > 0 ) : ?>
									<span class="cprice">(<?php usces_the_itemCpriceCr(); ?>)</span>
							<?php endif; ?>
									<span class="price"><?php usces_the_itemPriceCr(); ?></span>
									<br /><?php usces_the_itemGpExp(); ?>
									</td>
								</tr>
								<tr>
									<td class="zaiko"><?php usces_the_itemZaikoStatus(); ?></td>
									<td class="quant"><?php usces_the_itemQuant(); ?></td>
									<td class="unit"><?php usces_the_itemSkuUnit(); ?></td>
								</tr>
								<?php if( !usces_have_zaiko() ) : ?>
									<div class="button"><?php echo apply_filters('usces_filters_multi_sku_zaiko_message', esc_html(usces_get_itemZaiko( 'name' ))); ?></div>
								<?php else : ?>
									<div class="button"><?php usces_the_itemSkuButton(__('Add to Shopping Cart', 'usces'), 0); ?></div>
								<?php endif; ?>
								<tr>
									<td colspan="5" class="error_message"><?php usces_singleitem_error_message($post->ID, usces_the_itemSku('return')); ?></td>
								</tr>

							<?php } while (usces_have_skus()); ?>
									</tbody>
								</table>
							</div><!-- end of skuform -->
							<?php echo apply_filters('single_item_multi_sku_after_field', NULL); ?>
							<?php do_action('usces_action_single_item_inform'); ?>
						</form>
						<?php do_action('usces_action_single_item_outform'); ?>
					</div>
		<?php endif; ?>

					<?php usces_assistance_item( $post->ID, __('An article concerned', 'usces') ); ?>
				</div>

			</div><!-- end of itemspage -->
		</div><!-- end of storycontent -->
	</div>
<?php else: ?>
<p><?php _e('Sorry, no posts matched your criteria.', 'usces'); ?></p>
<?php endif; ?>
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
</div><!-- end of catbox -->

</div><!-- end of content -->

<script>
	$(".itemsubimg li").click(function(){
		$(".itemimg .slides li").removeClass("active");
		$(".itemimg .slides li#" + $(this).attr("id")).addClass("active");
	});
</script>

<?php get_footer(); ?>
