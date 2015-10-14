<!--
<form method="post" action="" id="tweet_form">
	<textarea name="" id="" cols="30" rows="1"></textarea>
	<input type="submit" value="シェアする">
</form>
-->
<ul class="contents">
<?php echo $this->element('timeline_posts'); ?>
</ul>

<?php /*
<p>購読</p>
<?php foreach($all_categories as $category) { $category=$category['Category']; ?>
	<a href="/subscribe/<?=$category['id']?>">「<?=$category['name']?>」を購読する</a><br>
<?php } ?>
<p>購読をやめる</p>
<?php foreach($user['Category'] as $category) { ?>
	<a href="/unsubscribe/<?=$category['id']?>">「<?=$category['name']?>」を購読やめる</a><br>
<?php } ?>

<br>

<p>タブへ移動する</p>
<?php foreach($user['Category'] as $category) { ?>
	<a href="/category/<?=$category['alias']?>">「<?=$category['name']?>」へ移動</a><br>
<?php } ?>
<a href="/my_posts">全ての自分の投稿へ</a><br>

<div>
	<p>全てのカテゴリの投稿</p>
	<?php foreach($posts as $data) { ?>
		<?php $post = $data['Post']; ?>
		<p>
			-<?=$post['text']?>
			[
			<?php for($i=0; $i<4; $i++) { ?>
				<?=$post['like_'.$i.'_count']?>
			<?php } ?>
			]
			<?php foreach($data['Reply'] as $reply) { ?>
				<p> --- <?=$reply['text']?></p>
			<?php } ?>
			<form action="/post/reply" method="post">
				<input type="hidden" name="data[Post][parent_id]" value="<?=$post['id']?>">
				<input type="hidden" name="data[Post][category_id]" value="<?=$post['category_id']?>">
				<textarea name="data[Post][text]" cols="30" rows="2" placeholder="Reply Here!"></textarea>
				<input type="submit" value="返信">
			</form>
			<form action="/post/like" method="post">
				<input type="hidden" name="data[Like][post_id]" value="<?=$post['id']?>">
				<input type="hidden" name="data[Like][type]" value="1">
				<input type="submit" value="いいね">
			</form>
		</p>
	<?php } ?>
</div>
*/ ?>