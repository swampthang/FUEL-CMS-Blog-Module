<div class="page">

  <div class="top"><!-- --></div>
  <?=fuel_edit('create', 'Create Post', 'blog/posts')?>
  <?php if (!empty($posts)) : ?>
  <?php foreach($posts as $post) : ?>

    <?=fuel_edit($post)?>
    <div class="entry-classic">
      <?=fuel_edit($post)?>

      <?=blog_block('post_unpublished', array('post' => $post))?>
      <div class="list-img-holder">
        <img src="<?php echo "/assets/images/blog/" . $post->list_image; ?>" alt="" class="frame wp-post-image alignleft">
      </div>
<div class="excert-holder">
      <h2><a href="<?=$post->url?>" title="<?=$post->title?>"><span></span><?=$post->title?></a></h2>
      <?php $categories = $post->get_categories_linked();
      ?>
      <span class="meta">Posted by <a href="/blog/authors/<?=$post->author_id?>" title="<?=$post->author_name?>"><?=$post->author_name?></a> on <?=$post->get_date_formatted('F')?> <?=$post->get_date_formatted('d')?>, <?=$post->get_date_formatted('Y')?> in <a href="#" title=""><?=$categories?></a></span>

      <p><?=$post->excerpt_formatted?></p>

      <a href="<?=$post->url?>" title="Read More">Read More</a>
</div>
      <div class="clear"></div>

    </div><!-- .entry-classic (end) -->
    <?php endforeach; ?>

    <div class="wp-pagenavi">
      <?php if (!empty($pagination)) : ?><?=$pagination?>  &nbsp;<?php endif; ?>
      <!-- <span class="pages">Page 1 of 2</span>
      <span class="current">1</span>
      <a href="#" class="page">2</a>
      <a href="#" class="nextpostslink">&raquo;</a> -->
    </div>


    <div class="bottom"><!-- --></div>
    <?php else: ?>
  <div class="no_posts">
    <p>There are no posts available.</p>
  </div>
  <?php endif; ?> 

</div>

