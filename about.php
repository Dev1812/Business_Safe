<?php
  session_name('sid');
  session_start();
  define('DIR', dirname(__FILE__));
  define('TITLE', 'О сайте');
  require_once DIR.'/templates/page_top.php';
  $system_info = array(
    array('title' => 'Дата на сервере:',
	      'text' => date('d.m.Y')),
    array('title' => 'Время на сервере:',
	      'text' => date('h:i:s')),
    array('title' => 'IP клинета:',
	      'text' => (!empty($_SERVER['REMOTE_ADDR'])) ? htmlspecialchars(htmlentities($_SERVER['REMOTE_ADDR'])) : '0.0.0.0',
    array('title' => 'Версия PHP:'),
	      'text' => phpversion()),
    array('title' => 'Имя браузера:',
	      'item_id' => 'brower_name',
	      'text' => 'Netscape'),
    array('title' => 'Операционная система:',
	      'item_id' => 'oc',
	      'text' => 'Linux'),
    array('title' => 'Системный язык:',
	      'item_id' => 'system_lang',
	      'text' => 'ru'),
    array('title' => 'Ширина монитора:',
	      'item_id' => 'display_width',
	      'text' => '0'),
    array('title' => 'Высота монитора:',
	      'item_id' => 'display_height',
	      'text' => '0'),
    array('title' => 'Разрешение экрана:',
	      'item_id' => 'screen_resolution',
	      'text' => '0x0')
  );
?>

<div id="about">

  <div class="big_img_block">
    <div class="big_img about_img"></div>
    <div class="big_img_dark"></div>
    <div class="big_img_wrap">
      <div class="big_img_title">Бизнес 2.0</div>
      <div class="big_img_text">Миссия сайта - поделиться информацией о бизнесе и о его защите</div>
    </div>
  </div> 
  
  <div class="about_block" style="background-color:#FAFAFA;">
    <div class="about_block_wrap">
      <div class="system_info_item_wrap">
        <div class="author_title">Автор сайта</div>
        <div class="author_text">Исаев Тимур, стдент СГТУ</div>
      </div>
    </div>
  </div>

  <div class="about_block">
    <div class="about_block_wrap">
      <div class="system_info_item_wrap">
        <div class="author_title">Системная информация</div>
        <div class="author_text">
          <div class="system_info" id="system_info_show" onClick="toggleSystemInfo('show');">показать системную информацию</div>
          <div class="system_info" id="system_info_hide" onClick="toggleSystemInfo('hide');" style="display:none;">скрыть системную информацию</div>
        </div>
      </div>
  
      <div class="system_info_wrap">
        <div id="system_info" style="display:none;">

        <?php
          foreach($system_info as $v) {
        ?>
          <div class="item_wrap">
            <div class="item_l"><?=$v['title'];?></div>
            <div class="item_r" id="<?=(isset($v['item_id']) && !empty($v['item_id'])) ? $v['item_id'] : '';?>">
              <?=$v['text'];?>
            </div>
          </div>
        <?php
          }
        ?>
    
        </div>   
      </div>
    </div>
  </div>


</div>

<script type="text/javascript" src="/js/about.js?2"></script>
<link rel="stylesheet" type="text/css" href="/css/about.css?2">

<?php
  require_once DIR.'/templates/page_bottom.php';
?>