<?php
/**
 * <meta content="charset=UTF-8">
 * @package Welcart
 * @subpackage Welcart Default Theme
 */
global $usces;
?>
<!-- begin left sidebar -->
<div id="leftbar" class="sidebar">
<ul>
<?php if ( ! dynamic_sidebar( 'homeleft-widget-area' ) ): ?>
	<?php wp_list_categories( $args ); ?>
	<li id="welcart_calendar-3" class="widget widget_welcart_calendar">
		<div class="widget_title"><img src="<?php bloginfo('template_url'); ?>/images/calendar.png" alt="<?php _e('Business Calendar','usces') ?>" /><?php _e('Business Calendar','usces') ?></div>
		<ul class="welcart_calendar_body welcart_widget_body"><li>
		<?php usces_the_calendar(); ?>
		</li></ul>
	</li>
<?php endif; ?>
</ul>
</div>
<!-- end left sidebar -->


<!-- end right sidebar -->
