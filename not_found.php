<?php
  session_name('sid');
  session_start();
  define('DIR', dirname(__FILE__));
  define('TITLE', 'Страница не найдена');
  require_once DIR.'/templates/page_top.php';
?>
<div id="not_found">
  <div class="not_found_wrap">
    <div class="not_found_title">Запрашиваемая страница не найдена</div>
    <div class="not_found_text">
	    Страница была удалена или еще не создана
	  </div>
    <div class="not_found_link_wrap">
	    <a href="/" class="not_found_link">Перейти на главную</a>
	  </div>
  </div>
</div>
<link rel="stylesheet" type="text/css" href="/css/not_found.css?1"
<?php
  require_once DIR.'/templates/page_bottom.php';
?>