<?php
  if(!isset($articles['articles']) || !is_array($articles['articles'])) {
    echo json_encode(array('err'=>true, 'err_msg'=>'Не найдено ни одной записи'));
  } else {
    $html = '';
    foreach($articles['articles'] as $v) {
      $html .= '
    <div class="article_block" id="article_'.$v['id'].'">
      <div class="article_title">
	    <a href="/articles?act=get_article&article_id='.$v['id'].'">
	      '.$v['title'].'
	    </a>
	  </div>
      <div class="article_text">
	    '.$v['text'].'
	    <a href="/articles?act=get_article&article_id='.$v['id'].'">Подробнее...</a>
  	  </div>
      <div class="article_counters">'.$v['date_created'].'</div>
    </div>';
    }
    echo json_encode(array('err'=>false, 'html'=>$html, 'has_more'=> $articles['has_more'], 'offset' => $articles['offset']));
  }
?>