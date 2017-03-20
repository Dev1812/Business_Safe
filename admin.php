<?php
  session_name('sid');
  session_start();
  define('DIR', dirname(__FILE__));
  define('TITLE', 'Админ-панель');

  require_once DIR.'/templates/page_top.php';
  require_once DIR.'/lib/class.admin.php';

  $run_admin = new Admin;

  $act = (!empty($_GET['act'])) ? $_GET['act'] : 'login';
  if($act != 'login' && $act != 'add_article' && $act != 'logout') {
    $act = 'login';
  }

  switch($act) {
    case 'login':
      if($run_admin->isAdmin()) {
        header('Location: /admin?act=add_article');
      }
      if(!empty($_POST['admin_submit'])) {
        $login = $run_admin->login($_POST['admin_email'], $_POST['admin_password']);
      }
      require_once DIR.'/templates/admin/login.php';
      break;
    case 'add_article':
      if(!$run_admin->isAdmin()) {
        header('Location: /admin?act=login');
      }
      if(!empty($_POST['article_submit'])) {
        $add_article = $run_admin->addArticle($_POST['article_title'], $_POST['article_text']);
      }
      require_once DIR.'/templates/admin/add_article_form.php';
      break;
    case 'logout':
      if(!$run_admin->isAdmin()) {
        header('Location: /admin?act=login');
      }
      $run_admin->logout();
      break;
  }
  require_once DIR.'/templates/page_bottom.php';
?>