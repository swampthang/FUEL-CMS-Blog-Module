<div class="blog_search">
		<form method="get" action="<?=$this->fuel->blog->url('search')?>">
		<div class="row medium-collapse">
			<div class="small-8 columns"><input type="text" name="q" value="" id="q"></div>
			<div class="small-4 columns"><button class="search_btn">Search</button></div>
		<?php
		if ($this->config->item('csrf_protection')) :
		    $this->security->csrf_set_cookie();
		?>
		    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>"/>
		<?php endif;?>
		</div>
		</form>
</div>