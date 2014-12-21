<?=fuel_edit($post)?>
	
	<?=blog_block('post_unpublished', array('post' => $post))?>
	
	<h1><?=$post->title?> </h1>
	<div class="entry">
	<div class="top"><!-- --></div>
	<div class="meta">
		Posted on <span class="post_content_date"><?=$post->get_date_formatted()?></span> by <span class="post_author_name"><a href="/blog/authors/<?=$post->author_id?>"><?=$post->author_name?></a></span>
	</div>
  <div class="social-links">
    <?php 
$social = $post->get_social_bookmarking_links();
echo $social;
?>
  </div>
	<div class="comment">
		<a><?=$post->comments_count?></a>
	</div>
	<div class="post_content">
		<?=$post->content_formatted?>
		<?php
	$categories = $post->get_categories();
	$category = $categories[0]->name;
	if($category == 'Licks') { 
		$CI =& get_instance();
		$CI->load->model('row_model');
		$slug = $post->slug;
		$lick = $CI->row_model->find_one_by_slug($slug);
		$id = $lick['id'];
    $swf_file = $lick['swf_file'];
    $swiffy_code = $lick['swiffy_code'];
    $mov = $lick['mov_file'];
		?>
		<!-- <script src="https://www.gstatic.com/swiffy/v6.0/runtime.js"></script> -->
		<div class="frame" id="mov_wrapper">
			<object classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" width="192" height="160" codebase="http://www.apple.com/qtactivex/qtplugin.cab">
				<param name="src" value="/assets/<?=$mov?>">
				<param name="autoplay" value="false">
				<embed src="/assets/<?=$mov?>" width="192" height="160" autoplay="false" pluginspage="http://www.apple.com/quicktime/download/">
			</object>
		</div>
		<div class="frame" id="lick_wrapper">You need the flash player to view this file</div>
		<script>
		jQuery.noConflict()(function($){                    
		  $(document).ready(
		    function() {
		    $('#lick_wrapper').flash({
		      swf: '/assets/<?=$swf_file?>',
		      height: 190,
		      width: 550
		    }
		    
		    );
		    }
		  );
		  });                                    
		</script>
	<?php } ?>
	</div>
	<div class="bottom"><!-- --></div>
</div>
<a name="comments"></a>

	<?php if ($post->comments_count > 0) : ?>
		<h2 id="comments"><?=$post->comments_count?> Responses to <?=$post->title?></h2>
		<div class="entry">

		  <div class="top"><!-- --></div>

		  <!-- COMMENTS (start) -->

		  <div id="comments-wrap">

		    <ol class="commentlist">
				<?php $cnt = 0; ?>
			<?php foreach($post->comments as $comment) : 
				if($cnt % 2) {
					$thread_class = "thread-odd";
				} else {
					$thread_class = "thread-even";
				}
				$cnt++;
			?>
					
					<li class="<?=$thread_class?>">
					<a name="comment<?=$comment->id?>"></a>
					  <div class="comment-left">
							
							<?php if ($comment->is_by_post_author()) :?>
						<?=$comment->post->author->get_avatar_img_tag(array('class' => 'avatar'))?>
					<?php else :?>
						<img src="/assets/images/avatar.png" width="48" height="48">
						<?php endif; ?>
					   
					  </div><!-- .comment-left (end) -->

					  <div class="comment-right">
					    <div class="comment-right-inner">

					      <p style="margin-top: 0; padding-top: 0">
					        <?=$comment->author_and_link?>
					        <span class="small says">says:</span><br>
					        <span class="smaller date"><?=$comment->get_date_formatted('h:iA / M d, Y')?></span>
					      </p>

									<?=$comment->content_formatted?>

					    </div><!-- .coments-right-inner (end) -->
					  </div><!-- .comment-right (end) -->
					  <div class="clear"></div>
					</li>


			<?php endforeach; ?>
			</ol>
      <?php if ($post->allow_comments) : ?>
  <div id="respond">
  <div class="pad">
  <a name="comments_form"></a>

  <?php if ($post->is_within_comment_time_limit()) : ?>
    <?php if (empty($thanks)) : ?>
    <h3>Leave a Response</h3>
    <?php else: ?>
    <?=$thanks?>
    <?php endif;
     ?>
    <?=$comment_form?>
  <?php else: ?>
    <p>Comments have been turned off for this post.</p>
  <?php endif; ?>
  </div>
  </div>

<?php else: ?>
  <p>Comments have been closed.</p>
<?php endif; ?>
			</div>
		</div>

	<?php endif; ?>

