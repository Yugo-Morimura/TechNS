<?php foreach($posts as $data) { ?>
<!-- ここから1つのコンテンツ -->
<?php $post = $data['Post']; ?>

<li>
	<img src="/images/himenon.png" alt="">
	<div class="content">
		<strong><?=h($data['User']['name'])?></strong>
		<p class="body">
<?php $post['text'] = str_replace('&lt;code&gt;', '<code><pre>', h($post['text'])); ?>
<?php $post['text'] = str_replace('&lt;/code&gt;', '</pre></code>', $post['text']); ?>
<?=nl2br($post['text'])?>
		</p>
		<div class="reaction_panel">
			<ul data-id="<?=$post['id']?>">
				<li><a href="" data-type="0" class="js-like">(<?=$post['like_0_count']?>)おつかれさん</a></li>
				<li><a href="" data-type="1" class="js-like">(<?=$post['like_1_count']?>)いいね</a></li>
				<li><a href="" data-type="2" class="js-like">(<?=$post['like_2_count']?>)おれも</a></li>
				<li><a href="" data-type="3" class="js-like">(<?=$post['like_3_count']?>)w</a></li>
			</ul>
		</div>
		<div class="reply-panel">
			<ul class="contents-reply">
				<?php foreach($data['Reply'] as $post) { ?>
				<li>
					<img src="/images/himenon.png" alt="">
					<div class="content">
						<strong><?=$post['User']['name']?></strong>
						<p class="body">
<?php $post['text'] = str_replace('&lt;code&gt;', '<code><pre>', h($post['text'])); ?>
<?php $post['text'] = str_replace('&lt;/code&gt;', '</pre></code>', $post['text']); ?>
<?=nl2br($post['text'])?>
						</p>
					</div>
					<div class="reaction_panel">
						<ul data-id="<?=$post['id']?>">
							<li><a href="#" data-type="0" class="js-like">(<?=$post['like_0_count']?>)おつかれさん</a></li>
							<li><a href="#" data-type="1" class="js-like">(<?=$post['like_1_count']?>)いいね</a></li>
							<li><a href="#" data-type="2" class="js-like">(<?=$post['like_2_count']?>)おれも</a></li>
							<li><a href="#" data-type="3" class="js-like">(<?=$post['like_3_count']?>)w</a></li>
						</ul>
					</div>
				</li>
				<?php } ?>
			</ul>
		</div>
		<!-- ここまで返信用のブロック -->
		<div class="reply-<?=$post['id']?> reply-form">
			<form action="/post/reply" method="post">
				<textarea name="data[Post][text]" id="" cols="30" rows="1" placeholder="返信を送る"></textarea>
				<input type="hidden" name="data[Post][category_id]" value="<?=$data['Category']['id']?>">
				<input type="hidden" name="data[Post][parent_id]" value="<?=$data['Post']['id']?>">
				<input type="hidden" name="data[alias]" value="<?=$data['Category']['alias']?>">
				<input type="submit" value="返信する">
				<a href="" class="no-reply">閉じる</a>
			</form>
		</div>
	</div>
	<div class="reply-button-form">
		<a href="#" data-replyid="<?=$data['Post']['id']?>" class="show_reply">このスレッドに返信する</a>
	</div>
</li>
<!-- ここまで1つのコンテンツ -->
<?php } ?>