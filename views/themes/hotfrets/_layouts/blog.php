<?php 
fuel_set_var('body_class', 'blog');
$current_post = $this->fuel->blog->current_post();
if (isset($current_post) AND !$is_home)
{
	fuel_set_var('canonical', $post->url);	
}
?>
<?php $this->load->view('_blocks/header')?>

	<div id="content">
		<?php echo fuel_var('body', ''); ?>
	</div>

	<div id="sidebar">
	
	<div id="sidebar-top"></div>


		<?php echo $this->fuel->blog->sidemenu(array('search', 'categories', 'links', 'archives', 'authors'))?>
		
	
	<div id="sidebar-bottom"></div>


	</div>
	
	<div class="clear"></div>
	
<?php $this->load->view('_blocks/footer')?>
