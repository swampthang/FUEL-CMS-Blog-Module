<?php $categories = $CI->fuel->blog->get_published_categories(); ?>
<?php if ( ! empty($categories)) : ?>
  <div class="widget">
    <h2>LATEST POSTS BY CATEGORY</h2>
    <div class="themeblvd-tabs">

      <div class="tab-menu">
        <ul>
          <?php 
          foreach ($categories as $category) : 
            $cat_cnt = $category->posts_count;
          $cat_id = $category->id;
          ?>
          <li><a href="#tab<?=$cat_id?>"<?php if ($cat_cnt == 1) { echo ' class="active"'; } ?>><?=$category->name?></a></li>
        <?php endforeach; ?>
      </ul>
      <div class="clear"></div>
    </div><!-- .tab-menu (end) -->

    <div class="tab-wrapper">
      <?php 
      foreach ($categories as $category) : 
        $cat_cnt = $category->posts_count;
      $cat_id = $category->id;
      // $posts = $category->posts;
      $posts = $this->fuel->blog->get_category_posts($cat_id, 'post_date desc', 5);
      $slug = $category->slug;
      ?>
      <div id="tab<?=$cat_id?>" class="tab">

        <div class="themeblvd-recent-posts">
          <?php 
          foreach ($posts as $post) :
            ?>
          <div class="tiny-entry">
            <img width="45" height="45" src="/assets/images/blog/<?=$post->thumbnail_image?>" class="pretty wp-post-image" alt="<?=$post->title?>" title="<?=$post->title?>">
            <span class="title">
              <a href="<?=$post->url?>" title="<?=$post->title?>">
                <?=$post->title?>
              </a>
              <span class="meta">
                Posted on <?=$post->get_date_formatted('F')?> <?=$post->get_date_formatted('d')?>, <?=$post->get_date_formatted('Y')?>
              </span>
            </span>
            <div class="clear"></div>
          </div><!-- .entry (end) -->
        <?php endforeach; ?>
        <div class="cat-button-wrapper">
          <a href="/blog/categories/<?=$slug?>" title="<?=$category->name?>" class="button">
            <span class="left">
              <span class="right">
                <span class="middle">Browse all posts in the <?=$category->name?> category</span>
              </span>
            </span>
          </a>
        </div>
      </div><!-- .themeblvd-recent-posts (end) -->

    </div><!-- .tab (end) -->

  <?php endforeach; ?>

</div><!-- .tab-wrapper (end) -->

</div><!-- .themeblvd-tabs (end) -->

</div>
<?php endif; ?>