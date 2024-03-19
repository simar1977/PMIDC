<?php if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); } ?>
<div class="wrap">
  <div class="form-wrap">
    <div id="icon-edit" class="icon32 icon32-posts-post"><br>
    </div>
    <h2><?php _e('Scroll post excerpt', 'scroll-post-excerpt'); ?></h2>
    <?php
	$spe_title = get_option('spe_title');
	$spe_select_num_user = get_option('spe_select_num_user');
	$spe_dis_num_user = get_option('spe_dis_num_user');
	$spe_dis_num_height = get_option('spe_dis_num_height');
	$spe_select_categories = get_option('spe_select_categories');
	$spe_select_orderby = get_option('spe_select_orderby');
	$spe_select_order = get_option('spe_select_order');
	$spe_excerpt_length = get_option('spe_excerpt_length');
	
	$spe_speed = get_option('spe_speed');
	$spe_waitseconds = get_option('spe_waitseconds');
	
	if (isset($_POST['spe_form_submit']) && $_POST['spe_form_submit'] == 'yes')
	{
		//	Just security thingy that wordpress offers us
		check_admin_referer('spe_form_setting');
			
		$spe_title 				= stripslashes(sanitize_text_field($_POST['spe_title']));
		$spe_select_num_user 	= stripslashes(sanitize_text_field($_POST['spe_select_num_user']));
		$spe_dis_num_user 		= stripslashes(sanitize_text_field($_POST['spe_dis_num_user']));
		$spe_dis_num_height 	= stripslashes(sanitize_text_field($_POST['spe_dis_num_height']));
		$spe_select_categories 	= stripslashes(sanitize_text_field($_POST['spe_select_categories']));
		$spe_select_orderby 	= stripslashes(sanitize_text_field($_POST['spe_select_orderby']));
		$spe_select_order 		= stripslashes(sanitize_text_field($_POST['spe_select_order']));
		$spe_excerpt_length 	= stripslashes(sanitize_text_field($_POST['spe_excerpt_length']));
		
		$spe_speed = stripslashes(sanitize_text_field($_POST['spe_speed']));
		$spe_waitseconds = stripslashes(sanitize_text_field($_POST['spe_waitseconds']));
			
		if(!is_numeric($spe_select_num_user)) { $spe_select_num_user = 10; }
		if(!is_numeric($spe_dis_num_user)) { $spe_dis_num_user = 5; }
		if(!is_numeric($spe_dis_num_height)) { $spe_dis_num_height = 100; }
		if(!is_numeric($spe_excerpt_length)) { $spe_excerpt_length = 110; }
		if(!is_numeric($spe_speed)) { $spe_speed = 2; }
		if(!is_numeric($spe_waitseconds)) { $spe_waitseconds = 2; }
		
		if($spe_select_orderby != "ID" && $spe_select_orderby != "author" && $spe_select_orderby != "title" 
			&& $spe_select_orderby != "rand" && $spe_select_orderby != "category" && $spe_select_orderby != "date" && $spe_select_orderby != "modified")
		{
			$spe_select_orderby = "ID";
		}
		
		if($spe_select_order != "ASC" && $spe_select_order != "DESC")
		{
			$spe_select_order = "ASC";
		}
		
		update_option('spe_title', $spe_title );
		update_option('spe_select_num_user', $spe_select_num_user );
		update_option('spe_dis_num_user', $spe_dis_num_user );
		update_option('spe_dis_num_height', $spe_dis_num_height );
		update_option('spe_select_categories', $spe_select_categories );
		update_option('spe_select_orderby', $spe_select_orderby );
		update_option('spe_select_order', $spe_select_order );
		update_option('spe_excerpt_length', $spe_excerpt_length );
		
		update_option('spe_speed', $spe_speed );
		update_option('spe_waitseconds', $spe_waitseconds );
		?>
		<div class="updated fade">
			<p><strong><?php _e('Details successfully updated.', 'scroll-post-excerpt'); ?></strong></p>
		</div>
		<?php
	}
	?>
	<h3><?php _e('Scroll Setting', 'scroll-post-excerpt'); ?></h3>
	<form name="spe_form" method="post" action="">
	
		<label for="tag-title"><?php _e('Widget title', 'scroll-post-excerpt'); ?></label>
		<input name="spe_title" type="text" id="spe_title" value="<?php echo $spe_title; ?>" size="50" />
		<p><?php _e('Enter widget title', 'scroll-post-excerpt'); ?></p>
			
		<label for="tag-image"><?php _e('Enter height of each post', 'scroll-post-excerpt'); ?></label>
		<input name="spe_dis_num_height" type="text" id="spe_dis_num_height" value="<?php echo $spe_dis_num_height; ?>" maxlength="3" />
		<p><?php _e('If any overlap in the reel at front end, you should arrange (increase/decrease) this height. (Only number)', 'scroll-post-excerpt'); ?> (Example: 80)</p>
		
		<label for="tag-image"><?php _e('Display number of post', 'scroll-post-excerpt'); ?></label>
		<input name="spe_dis_num_user" type="text" id="spe_dis_num_user" value="<?php echo $spe_dis_num_user; ?>" maxlength="2" />
		<p><?php _e('Enter number of post at the same time in scroll to display. (Only number)', 'scroll-post-excerpt'); ?> (Example: 5)</p>
		
		<label for="tag-image"><?php _e('Enter max number of post to scroll', 'scroll-post-excerpt'); ?></label>
		<input name="spe_select_num_user" type="text" id="spe_select_num_user" value="<?php echo $spe_select_num_user; ?>" maxlength="2" />
		<p><?php _e('Enter max number of post to scroll. (Only number)', 'scroll-post-excerpt'); ?> (Example: 10)</p>
		
		<label for="tag-image"><?php _e('Enter categories', 'scroll-post-excerpt'); ?></label>
		<input name="spe_select_categories" type="text" id="spe_select_categories" value="<?php echo $spe_select_categories; ?>" maxlength="100" />
		<p><?php _e('Category IDs, separated by commas.', 'scroll-post-excerpt'); ?></p>
		
		<label for="tag-image"><?php _e('Select orderbys', 'scroll-post-excerpt'); ?></label>
		<select name="spe_select_orderby" id="spe_select_orderby">
			<option value='ID' <?php if($spe_select_orderby == 'ID') { echo 'selected' ; } ?>>ID</option>
			<option value='author' <?php if($spe_select_orderby == 'author') { echo 'selected' ; } ?>>Author</option>
			<option value='title' <?php if($spe_select_orderby == 'title') { echo 'selected' ; } ?>>Title</option>
			<option value='rand' <?php if($spe_select_orderby == 'rand') { echo 'selected' ; } ?>>Rand</option>
			<option value='category' <?php if($spe_select_orderby == 'category') { echo 'selected' ; } ?>>Category</option>
			<option value='date' <?php if($spe_select_orderby == 'date') { echo 'selected' ; } ?>>Date</option>
			<option value='modified' <?php if($spe_select_orderby == 'modified') { echo 'selected' ; } ?>>Modified</option>
		</select>
		<p><?php _e('Select orderbys from the list', 'scroll-post-excerpt'); ?></p>
		
		<label for="tag-image"><?php _e('Select order', 'scroll-post-excerpt'); ?></label>
		<select name="spe_select_order" id="spe_select_order">
			<option value='ASC' <?php if($spe_select_order == 'ASC') { echo 'selected' ; } ?>>ASC</option>
			<option value='DESC' <?php if($spe_select_order == 'DESC') { echo 'selected' ; } ?>>DESC</option>
		</select>
		<p><?php _e('Select display order from the list', 'scroll-post-excerpt'); ?></p>
			
		<label for="tag-image"><?php _e('Excerpt length', 'scroll-post-excerpt'); ?></label>
		<input name="spe_excerpt_length" type="text" id="spe_excerpt_length" value="<?php echo $spe_excerpt_length; ?>" maxlength="3" />
		<p><?php _e('Only Number', 'scroll-post-excerpt'); ?> (Example: 200)</p>
		
		<label for="spe_speed"><?php _e('Scrolling speed', 'scroll-post-excerpt'); ?></label>
		<?php _e( 'Slow', 'scroll-post-excerpt' ); ?> 
		<input name="spe_speed" type="range" value="<?php echo $spe_speed; ?>"  id="spe_speed" min="1" max="10" /> 
		<?php _e( 'Fast', 'scroll-post-excerpt' ); ?> 
		<p><?php _e('Select how fast you want the to scroll the items.', 'scroll-post-excerpt'); ?></p>
		
		<label for="spe_waitseconds"><?php _e( 'Seconds to wait', 'scroll-post-excerpt' ); ?></label>
		<input name="spe_waitseconds" type="text" value="<?php echo $spe_waitseconds; ?>" id="spe_waitseconds" maxlength="4" />
		<p><?php _e( 'How many seconds you want the wait to scroll', 'scroll-post-excerpt' ); ?> (<?php _e( 'Example', 'scroll-post-excerpt' ); ?>: 5)</p>
		
		<div style="height:5px;"></div>	
		<input type="hidden" name="spe_form_submit" value="yes"/>
		<input name="spe_submit" id="spe_submit" class="button add-new-h2" value="Update Details" type="submit" />
		<?php wp_nonce_field('spe_form_setting'); ?>
	</form>
  </div>
  <div style="height:5px;"></div>
  <p class="description"><?php _e('Check official website for more information', 'scroll-post-excerpt'); ?> 
  <a target="_blank" href="http://www.gopiplus.com/work/2011/09/13/vertical-scroll-post-excerpt-wordpress-plugin/"><?php _e('click here', 'scroll-post-excerpt'); ?></a></p>
</div>
