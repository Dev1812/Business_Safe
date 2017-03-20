<?php
  session_name('sid');
  session_start();
  define('DIR', dirname(__FILE__));
  define('TITLE', 'Рейтинг компаний');
  require_once DIR.'/templates/page_top.php';
?>
<div id="companies">
  <div class="companies_title">Рейтинг компаний</div>
  <div>
  <?php
    $companies = array(
     array('company_name' => 'ICBC',
	       'company_photo' => '/images/companies/com-1.jpg?itok=I5shNOtC',
		   'company_receipts' => '$171,1 млрд',
		   'company_owner' => null,
		   
		   'company_country' => 'Китай'),
     array('company_name' => 'China Construction Bank',
	       'company_photo' => '/images/companies/com-2.jpg?itok=wjXeC6IG',
		   'company_receipts' => '$146,8 млрд',
		   'company_owner' => null,
		   'company_country' => 'Китай'),
		   
		   
     array('company_name' => 'Agricultural Bank of China',
	       'company_photo' => '/images/companies/com-3.jpg?itok=kEDOGIHY',
		   'company_receipts' => '$131,9 млрд',
		   'company_owner' => null,
		   'company_country' => 'Китай'),
		   
     array('company_name' => 'Berkshire Hathaway',
	       'company_photo' => '/images/companies/com-4.jpg?itok=Xr3F4jWo',
		   'company_receipts' => '$210,8 млрд',
		   'company_owner' => 'Уоррен Баффет',
		   'company_country' => 'США'),
		   
     array('company_name' => 'JPMorgan Chase',
	       'company_photo' => '/images/companies/com-5.jpg?itok=PB2i-9bw',
		   'company_receipts' => '$99,9 млрд',
		   'company_owner' => null,
		   'company_country' => 'США'),
		   
     array('company_name' => 'Bank of China',
	       'company_photo' => '/images/companies/com-6.jpg?itok=v6fYrwnc',
		   'company_receipts' => '$122 млрд',
		   'company_owner' => null,
		   'company_country' => 'Китай'),
		   
		   
     array('company_name' => 'Wells Fargo',
	       'company_photo' => '/images/companies/com-7.jpg?itok=1sIluIC6',
		   'company_receipts' => ' $91,4 млрд',
		   'company_owner' => null,
		   'company_country' => 'Китай'),
		   
		   
     array('company_name' => 'Apple',
	       'company_photo' => '/images/companies/com-8.jpg?itok=1vbV_NJ7',
		   'company_receipts' => '$233,3 млрд',
		   'company_owner' => null,
		   'company_country' => 'США'),
		   
		   
     array('company_name' => 'ExxonMobil',
	       'company_photo' => '/images/companies/com-9.jpg?itok=wGNenugf',
		   'company_receipts' => '$236,8 млрд',
		   'company_owner' => null,
		   'company_country' => 'Китай'),
		   
     array('company_name' => 'Toyota Motor',
	       'company_photo' => '/images/companies/com-10_0.jpg?itok=7QKVLokf',
		   'company_receipts' => '$235,8 млрд',
		   'company_owner' => null,
		   'company_country' => 'Япония')
			
   );
   foreach($companies as $v){
  ?>
    <div class="company_block">
	  <div class="company_left">
	    <img src="<?=$v['company_photo'];?>" class="company_img" alt="<?=$v['company_name'];?>">
	  </div>
	  <div class="company_wrap">
	    <div class="company_name"><?=$v['company_name'];?></div>
	    <div class="company_info_block">
		  <div class="company_info_l">Выручка:</div>
		  <div class="company_info_r"><?=$v['company_receipts'];?></div>
		</div>
	    <div class="company_info_block">
		  <div class="company_info_l">Основатель:</div>
		  <div class="company_info_r"><?=(!empty($v['company_owner'])) ? $v['company_owner'] : 'Сотрудничество';?></div>
		</div>
	    <div class="company_info_block">
		  <div class="company_info_l">Страна:</div>
		  <div class="company_info_r"><?=$v['company_country'];?></div>
		</div>
	  </div>
	</div>
 <?php
   }
  ?>
  </div>
 
  
</div>
<link rel="stylesheet" type="text/css" href="/css/companies.css?1">
<?php
  require_once DIR.'/templates/page_bottom.php';
?>