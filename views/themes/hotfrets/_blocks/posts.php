<div class="posts left">
	<?=fuel_edit('create', 'Create Post', 'blog/posts')?>
	<?php if (!empty($posts)) : ?>
		<?php $cnt = 0; ?>
		<?php foreach($posts as $post) : ?>
		<?php if(($cnt % 2)==0) { ?>
		<div class="row" data-equalizer>
			<?php } ?>
				<div class="small-12 medium-6 columns">
					
					<div class="post">
						<?=fuel_edit($post)?>
						<?=blog_block('post_unpublished', array('post' => $post))?>
						<div class="post_content" data-equalizer-watch>
							<h2><a href="<?=$post->url?>"><?=$post->title?></a></h2> 
							<div class="img-right frame thumbnail">
								<img src="/assets/images/blog/<?=$post->thumbnail_image?>" />
							</div><div class="post_date">
								Published <?=$post->get_date_formatted(lang('blog_post_date_format'))?>
								by <strong><span class="post_author_name"><?=$post->author_name?></span></strong>
							</div>
							<?=$post->excerpt_formatted?> 
						</div>
						<div class="post_meta">
							<?=$post->categories_linked ?> 
						</div>
					</div>

				</div>

			<?php if(!($cnt % 2)==0) { ?>
		</div>
			<?php }
			$cnt++;
			 ?>
		<?php endforeach; ?>
		
		<div class="view_archives">
			<div class="pagination"><?php if (!empty($pagination)) : ?><?=$pagination?>  &nbsp;<?php endif; ?></div>
			Looking for older posts? <a href="<?=blog_url('archives')?>">View our Archives</a>
		</div>
		
	<?php else: ?>
	<div class="no_posts">
		<p>There are no posts available.</p>
	</div>
	<?php endif; ?> 
</div>
<script>
document.onload = function(){
	$('div').each(function(){ 
		if($(this).width()>$('body').width()) { 
			console.log($(this).width());
		}
	});
};
</script>