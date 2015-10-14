<ul>
	<?php foreach($my_posts as $post) { ?>
	<li>
		<p>
		<span><?=date('Y-m-d H:i:s', strtotime($post['Post']['created']))?></span>
		<?= h(mb_strimwidth($post['Post']['text'], 0, 20, '...')) ?>
		</p>
	</li>
	<?php } ?>
</ul>