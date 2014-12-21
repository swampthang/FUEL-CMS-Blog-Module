<?php $authors = $CI->fuel->blog->get_users()?>
<?php if (!empty($authors)) : ?>
<div class="widget">
	<h2>Authors</h2>
	<ul>
		<?php foreach($authors as $author) : ?>
		<li>
			<?=fuel_edit($author->id, 'Edit Author: '.$author->name, 'blog/users')?>
			<a href="<?=$author->url?>"><?=$author->name?></a>
			<?php if (!empty($author->posts_count)) : ?>(<?=$author->posts_count?>)<?php endif; ?>
		</li>
		<?php endforeach; ?>
	</ul>
</div>
<?php endif; ?>