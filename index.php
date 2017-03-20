<?php
  session_name('sid');
  session_start();
  define('DIR', dirname(__FILE__));
  define('TITLE', 'Бизнес 2.0');
  require_once DIR.'/templates/page_top.php';
?>
<div id="index">
  
  <div class="big_img_block big_img_block_about">
    <div class="big_img about_img"></div>
    <div class="big_img_dark"></div>
    <div class="big_img_wrap big_img_wrap_about">
      <div class="big_img_title big_img_title_about">Бизнес 2.0</div>
      <div class="big_img_text">Сайт про предпринимательство и защиту бизнеса</div>
    </div>
  </div> 

  
  
  <div class="big_img_block">
    <div class="big_img big_img_how_create"></div>
    <div class="big_img_wrap big_img_wrap_how_create">
      <div class="big_img_title">Как создать свой бизнес?</div>
      <div class="big_img_text">
	      <div class="big_img_text_title">Вы узнаете все о том как зарегестрировать компанию и многое другое...</div>
		    <div class="white_button_wrap">
		      <a href="/how_create_business" class="white_button">подробнее...</a>
		    </div>
	    </div>
    </div>
  </div>
  
  <div class="big_img_block">
    <div class="big_img safe_buisness_img"></div>
    <div class="big_img_dark"></div>
    <div class="big_img_wrap">
      <div class="big_img_title">Защита бизнеса сегодня</div>
      <div class="big_img_text">
	      <div class="big_img_text_title">От каких угроз и как выстроить защиту своего предприятия?</div>
	  	  <div class="white_button_wrap">
		      <a href="/business_safe" class="white_button">подробнее...</a>
		    </div>
	    </div>
    </div>
  </div>
  
  
  <div class="big_img_block">
    <div class="big_img raiting_img"></div>
    <div class="big_img_dark big_img_raiting_dark"></div>
    <div class="big_img_wrap big_img_wrap_raiting">
	    <div class="big_img_wrap_flat_box">
	      <div class="big_img_title">Рейтинг предпринимателей</div>
        <div class="big_img_text">
		      <div class="big_img_text_title">Мировой рейтинг богатейших бизнесменов</div>
          <div class="white_button_wrap">
		        <a href="/business_man" class="white_button">подробнее...</a>
		      </div>
        </div>
      </div>
      <div class="big_img_wrap_flat_box big_img_wrap_flat_box_companies float_r">
        <div class="big_img_title">Рейтинг мировых корпораций</div>
        <div class="big_img_text">
          <div class="big_img_text_title">Мировой рейтинг компаний по вырчуке</div>
          <div class="white_button_wrap">
            <a href="/companies" class="white_button">подробнее...</a>
          </div>
        </div>

      </div>
    </div>
  </div>

</div>
<link rel="stylesheet" type="text/css" href="/css/index.css?1">
<?php
  require_once DIR.'/templates/page_bottom.php';
?>