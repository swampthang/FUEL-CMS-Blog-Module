<h1>Guitar <?=$category->name?></h1>
<?php 
if($category->name == "Licks") { ?>
<p class="pleft-right10">These licks and riffs were taken from the old Riff 'O the Week archive that dates back to 2002! Hope you enjoy them.</p>
<?php } ?>
<?=$this->fuel->blog->block('posts')?>