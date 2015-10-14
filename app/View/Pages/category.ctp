<div id="rank">
	<ul>
		<li><a href="/subscribe/<?=floor(($category['Category']['id']-1)/3)*3+1?>" <?php if($category['Category']['id']%3===1) echo 'id="active_rank"'; ?> >初級</a>
		<li><a href="/subscribe/<?=floor(($category['Category']['id']-1)/3)*3+2?>" <?php if($category['Category']['id']%3===2) echo 'id="active_rank"'; ?> >中級</a>
		<li><a href="/subscribe/<?=floor(($category['Category']['id']-1)/3)*3+3?>" <?php if($category['Category']['id']%3===3) echo 'id="active_rank"'; ?> >上級</a>
	</ul>
</div>
<form method="post" action="/post/comment" id="tweet_form">
	<textarea name="data[Post][text]" id="" cols="30" rows="1" placeholder="「<?=h($category['Category']['name'])?>」への投稿を行う"></textarea>
	<input type="hidden" name="data[Post][category_id]" value="<?=$category['Category']['id']?>">
	<input type="hidden" name="data[alias]" value="<?=$category['Category']['alias']?>">
	<input class="techns_submit" type="submit" value="投稿する">
</form>
<ul class="contents">
<?php echo $this->element('timeline_posts'); ?>
</ul>

<?php /*
<form action="/post/comment" method="post">
	<textarea name="data[Post][text]" cols="30" rows="10" placeholder="Comment Here"></textarea><br>
	<input type="hidden" name="data[Post][category_id]" value="<?=$category_id?>">
	<input type="hidden" name="data[alias]" value="<?=$category_alias?>">
	<input type="submit" value="投稿">
</form>

<div>
	<p>カテゴリごとの投稿</p>
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
				<input type="hidden" name="data[Post][category_id]" value="<?=$category_id?>">
				<input type="hidden" name="data[alias]" value="<?=$category_alias?>">
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
*/