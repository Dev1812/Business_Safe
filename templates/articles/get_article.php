<?php
  require_once DIR.'/templates/page_top.php';
?>
<div id="articles">
  <div class="articles_wrap" id="articles_wrap">
<?php
  if(!isset($article['article']) || !is_array($article['article'])) {
    echo '<div class="text_not_found">Не найдено ни одной записи</div>';
  } else {
	$a = $article['article'];
?>
    <div class="article_block" id="article_<?=$a['id'];?>">
      <div class="article_title">
	    <a><?=$a['title'];?></a>
	  </div>
      <div class="article_counters">
	    <?=$a['date_created'];?>
	  </div>
      <div class="article_text">
	    <?=$a['text'];?>
  	  </div>
    </div>
	<div class="share_wrap">
	  <div class="share_item" onClick="Share.vk();">
	    <img src="/images/icons/vk.png" width="25px" height="25px">
	  </div>
	  <div class="share_item" onClick="Share.fb();">
	    <img src="/images/icons/fb.png" width="25px" height="25px">
	  </div>
	  <div class="share_item" onClick="Share.ok();">
	    <img src="/images/icons/ok.png" width="25px" height="25px">
	  </div>
	  <div class="share_item" onClick="Share.twitter();">
	    <img src="/images/icons/twitter.png" width="25px" height="25px">
	  </div>
	</div>
	
  <script type="text/javascript" src="/js/share.js?0"></script>
  <script type="text/javascript">
    Share.init("biz.esy.es/articles?act=get_article&article_id=<?=$a['id'];?>", "<?=$a['title'];?>");
  </script>
<?php
  }
?>
  </div>
</div>
<link rel="stylesheet" type="text/css" href="/css/articles.css?1">
<script type="text/javascript" src="/js/articles.js?0"></script>
<?php
  require_once DIR.'/templates/page_bottom.php';
?>