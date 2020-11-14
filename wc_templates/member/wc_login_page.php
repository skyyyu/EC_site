<?php
/**
 * <meta content="charset=UTF-8">
 * @package Welcart
 * @subpackage Welcart Default Theme
 */
get_header();
?>

<?php if (have_posts()) : usces_remove_filter(); ?>
<div class="login_page">
	<div class="post" id="wc_<?php usces_page_name(); ?>">

		<h2 class="member_page_title"><?php _e('Log-in for members', 'usces'); ?></h2>
		<div class="entry">

		<div id="memberpages">
			<div class="whitebox">

				<div class="header_explanation">
				<?php do_action('usces_action_login_page_header'); ?>
				</div>

				<div class="error_message"><?php usces_error_message(); ?></div>
				<div class="loginbox">
					<form name="loginform" id="loginform" action="<?php echo apply_filters('usces_filter_login_form_action', USCES_MEMBER_URL); ?>" method="post">
						<p>
							<label><?php _e('e-mail adress', 'usces'); ?><br />
							<input type="text" name="loginmail" id="loginmail" class="loginmail" value="<?php echo esc_attr(usces_remembername('return')); ?>" size="20" /></label>
						</p>
						<p>
							<label><?php _e('password', 'usces'); ?><br />
							<input class="hidden" value=" " />
							<input type="password" name="loginpass" id="loginpass" class="loginpass" size="20" autocomplete="off" /></label>
						</p>
						<p class="submit">
						<?php usces_login_button(); ?>
						</p>
						<?php do_action('usces_action_login_page_inform'); ?>
					</form>
					<p id="nav">
						<a href="<?php usces_url('lostmemberpassword'); ?>" title="<?php _e('Did you forget your password?', 'usces'); ?>"><?php _e('Did you forget your password?', 'usces'); ?></a>
					</p>
				</div>

				<div class="footer_explanation">
				<?php do_action('usces_action_login_page_footer'); ?>
				</div>

			</div><!-- end of whitebox -->
		</div><!-- end of memberpages -->

		<script type="text/javascript">
		<?php if ( usces_is_login() ) : ?>
			setTimeout( function(){ try{
			d = document.getElementById('loginpass');
			d.value = '';
			d.focus();
			} catch(e){}
			}, 200);
		<?php else : ?>
			try{document.getElementById('loginmail').focus();}catch(e){}
		<?php endif; ?>
		</script>

		</div><!-- end of entry -->
	</div><!-- end of post -->
	<div class="new_member">
		<h2 class="new_box_title">初めてご利用の方・会員以外の方</h2>
		<div class="new_box">
			<p class="new_text">
			初めてご利用のお客様は、こちらから会員登録を行って下さい。<br>
			メールアドレスとパスワードを登録しておくと便利にお買い物ができるようになります。
			</p>
			<p id="nav">
			<?php if ( ! usces_is_login() ) : ?>
				<a href="<?php usces_url('newmember') . apply_filters('usces_filter_newmember_urlquery', NULL); ?>" title="<?php _e('New enrollment for membership.', 'usces'); ?>" class="new_member_btn"><?php _e('New enrollment for membership.', 'usces'); ?></a>
			<?php endif; ?>
			</p>
		</div>
	</div>
</div>
<?php else: ?>
<p><?php _e('Sorry, no posts matched your criteria.', 'usces'); ?></p>
<?php endif; ?>





<?php get_footer(); ?>
