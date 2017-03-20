<?php
  session_name('sid');
  session_start();
  define('DIR', dirname(__FILE__));
  define('TITLE', 'Рейтинг бизнесменов');
  require_once DIR.'/templates/page_top.php';
?>
<div id="buisness_man">
  <div class="bm_title">Рейтинг бизнесменов</div>
  <div>
  <?php
    $persons = array(
     array('human_name' => 'Билл Гейтс',
	            'human_photo' => '/images/peoples/1-rtr2x2xf.jpg?itok=b-7rEmTd',
				'human_company' => 'Microsoft corp.',
				'human_state' => '$75 млрд',
				'human_country' => 'США'),

     array('human_name' => 'Уоррен Баффет',
	            'human_photo' => '/images/peoples/3-rtr3mdho.jpg?itok=b-7rEmTd',
				'human_company' => 'Berkshire Hathaway',
				'human_state' => '$60,8 млрд',
				'human_country' => 'США'),
				
     array('human_name' => ' Амансио Ортега',
	            'human_photo' => '/images/peoples/2-gettyimages-175675141.jpg?itok=b-7rEmTd',
				'human_company' => 'Zara',
				'human_state' => '$67 млрд',
				'human_country' => 'Испания'),
				

    array('human_name' => 'Карлос Слим Элу',
	            'human_photo' => '/images/peoples/4-rtx13j8n.jpg?itok=Qc4pnKZD',
				'human_company' => 'Телекоммуникации',
				'human_state' => '$50 млрд',
				'human_country' => 'Мексика'),
				
     array('human_name' => 'Джефф Безос',
	            'human_photo' => '/images/peoples/5-tass_13460647.jpg?itok=KgPZSoz1',
				'human_company' => 'Amazon.com',
				'human_state' => '$45,2 млрд',
				'human_country' => 'Испания'),
				
   array('human_name' => ' Марк Цукерберг',
	            'human_photo' => '/images/peoples/6-rtx13qiw.jpg?itok=cK6m2oxE',
				'human_company' => 'Facebook',
				'human_state' => '$44,6 млрд',
				'human_country' => 'Испания'),
				
    array('human_name' => ' Ларри Эллисон',
	            'human_photo' => '/images/peoples/7-rts4smh.jpg?itok=eLu6hdTL',
				'human_company' => 'Oracle',
				'human_state' => '$43,6 млрд',
				'human_country' => 'Испания'),
				
    array('human_name' => 'Майкл Блумберг',
	            'human_photo' => '/images/peoples/08-01aqbdkr.jpg?itok=KMCC-3HF',
				'human_company' => 'Bloobmerg LP',
				'human_state' => '$40 млрд',
				'human_country' => 'Испания'),
				
    array('human_name' => ' Чарльз Кох',
	            'human_photo' => '/images/peoples/9-charles-coach.jpg?itok=S6yf7OJ5',
				'human_company' => 'Koch Industries',
				'human_state' => '$39,6 млрд',
				'human_country' => 'США'),
				
    array('human_name' => ' Дэвид Кох',
	            'human_photo' => '/images/peoples/10-rtx1bjro.jpg?itok=KMCC-3HF',
				'human_company' => 'Koch Industries',
				'human_state' => '$39,6 млрд',
				'human_country' => 'США'), 
				
    array('human_name' => 'Сергей Брин',
	            'human_photo' => '/images/peoples/11-rtr34vkc.jpg?itok=KMCC-3HF',
				'human_company' => 'Google, Inc.',
				'human_state' => '$32,6 млрд',
				'human_country' => 'США'),
   );
   foreach($persons as $v){
  ?>
    <div class="human_block">
	  <div class="human_left">
	    <img src="<?=$v['human_photo'];?>" class="human_img" alt="<?=$v['human_name'];?>">
	  </div>
	  <div class="human_wrap">
	    <div class="human_name"><?=$v['human_name'];?></div>
	    <div class="human_company">
		  <div class="human_company_l">Компания:</div>
		  <div class="human_company_r"><?=$v['human_company'];?></div>
		</div>
	    <div class="human_company">
		  <div class="human_company_l">Состояние:</div>
		  <div class="human_company_r"><?=$v['human_state'];?></div>
		</div>
	    <div class="human_company">
		  <div class="human_company_l">Страна:</div>
		  <div class="human_company_r"><?=$v['human_country'];?></div>
		</div>
	  </div>
	</div>
 <?php
   }
  ?>
  </div>
 
  
</div>
<link rel="stylesheet" type="text/css" href="/css/business_man.css?1">
<?php
  require_once DIR.'/templates/page_bottom.php';
?>