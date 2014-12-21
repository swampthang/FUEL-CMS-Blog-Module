<?php $archives_by_month = $CI->fuel->blog->get_post_archives(); ?>
<?php if (!empty($archives_by_month)) : ?>
<div class="widget">
	<h2>Archives</h2>
	<ul>
		<?php foreach($archives_by_month as $month => $archives) : 
			$month_str = date('F Y', strtotime(str_replace('/', '-', $month).'-01'));
			?>
		<li>
			<span><a href="<?=$this->fuel->blog->url($month)?>"><?=$month_str?></a> (<?=count($archives)?>) </span>
		</li>
		<?php endforeach; ?>
	</ul>
</div>
<?php endif; ?>
