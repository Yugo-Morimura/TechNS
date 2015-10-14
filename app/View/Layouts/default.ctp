<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>TechNS</title>
		<link rel="stylesheet" href="/stylesheets/main.css">
		<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.2/styles/default.min.css"/>
		<link rel="shortcut icon" href="/images/favicon.png">
		<script src="/js/jquery.min.js"></script>
		<script src="/js/main.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.2/highlight.min.js"></script>
		<script>hljs.initHighlightingOnLoad();</script>
		<script src="/js/designOption.js"></script>
		<script src="/js/notification.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<div class="wrap">
			<div id="techns_userinfo">
				<div class="cover">
					<img src="/images/back.jpg" alt="cover">
				</div>
				<div id="techns_user_thumbail">
					<img src="/images/himenon.png" alt="Himenon">
				</div>
				<h3><?=h($user['User']['name'])?></h3>
				<ul class="user_card">
					<li>
						<a href="#" class="js-post-count"><strong><?=$user['User']['post_count']?></strong><span>投稿数</span></a>
					</li>
					<li>
						<span class="notification-counter">0</span>
						<a href="#" class="js-post-count-liked"><strong><?=$user['User']['responsed_count']?></strong><span>リアクション数</span></a>
					</li>
				</ul>
				<div class="user_panels">
					<!--
					<ul>
						<li>
							<p>
							<span>2015/09/06</span>
							動的配列の初期化ミスったー
							</p>
						</li>
						<li>
							<p>
							<span>2015/09/06</span>
							動的配列の初期化ミスったー
							</p>
						</li>
						<li>
							<p>
							<span>2015/09/06</span>
							動的配列の初期化ミスったー
							</p>
						</li>
					</ul>
					-->
				</div>
			</div>

			<div id="techns_timeline">
				<ul id="tab_bar">
					<li><a href="/timeline" <?php if(!isset($category['Category'])) echo 'id="active_tag"'; ?>>TL</a>
					<?php foreach($user['Category'] as $category_) { ?>
					<li><a href="/category/<?=$category_['alias']?>" <?php if(isset($category['Category']) && $category['Category']['alias']===$category_['alias']) echo 'id="active_tag"'; ?> ><?=h($category_['name'])?></a>
					<?php } ?>
				</ul>
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>
			</div>
		</div>

		
		<br>
		<div style="clear:both;">
			<?php
				if(strpos($_SERVER['SERVER_NAME'], 'localhost') !== false) {
					$var = $this->viewVars;
					unset($var['scripts_for_layout'], $var['content_for_layout']);
					echo '<pre>'.h(print_r($var,true)).'</pre>';
				}
			?>
		</div>
	</body>
</html>