<?php
  require_once DIR.'/templates/page_top.php';
?>
<div id="articles">
  <div class="articles_wrap" id="articles_wrap">
    <input type="hidden" id="offset" value="5">
<?php
  if(!isset($articles['articles']) || !is_array($articles['articles'])) {
    echo '<div class="text_not_found">Не найдено ни одной записи</div>';
  } else {
    foreach($articles['articles'] as $v) {
?>
    <div class="article_block" id="article_<?=$v['id'];?>">
      <div class="article_title">
	    <a href="/articles?act=get_article&article_id=<?=$v['id'];?>">
	      <?=$v['title'];?>
	    </a>
	  </div>
      <div class="article_text">
	    <?=$v['text'];?>
	    <a href="/articles?act=get_article&article_id=<?=$v['id'];?>">Подробнее...</a>
  	  </div>
      <div class="article_counters"><?=$v['date_created'];?></div>
    </div>
<?php
    }
  }
?>

  </div>
<?php
  if($articles['has_more'] === true) {
?>
    <div class="load_more" id="load_more" onClick="Articles.getMore();">
      <div id="load_more_text">загрузить еще...</div>
      <img id="load_more_upload" style="display:none;margin:0 auto;" src="/images/icons/upload.gif">
    </div>
<?php
  }
?>
</div>
<link rel="stylesheet" type="text/css" href="/css/articles.css?1">
<script type="text/javascript" src="/js/articles.js?0"></script>
<?php
  require_once DIR.'/templates/page_bottom.php';
?>