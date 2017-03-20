<?php
  session_name('sid');
  session_start();
  define('DIR', dirname(__FILE__));
  define('TITLE', 'Статьи');
  
  require_once DIR.'/lib/class.articles.php';
  $run_articles = new Articles;
  
  $act = (!empty($_GET['act']) && isset($_GET['act'])) ? $_GET['act'] : 'get_articles';

  if($act != 'a_get_more' && $act != 'get_article' && $act != 'get_articles') {
    $act = 'get_articles';
  }
  
  switch($act) {
    case 'a_get_more':
      $offset = (!empty($_GET['offset']) && isset($_GET['offset'])) ? $_GET['offset'] : 0;
	    $articles = $run_articles->getArticles($offset);
      require_once DIR.'/templates/articles/a_get_more.php';
	    break;
    case 'get_article':
      $article_id = (!empty($_GET['article_id']) && isset($_GET['article_id'])) ? $_GET['article_id'] : 0;
	    $article = $run_articles->getArticle($article_id);
      require_once DIR.'/templates/articles/get_article.php';
	    break;
    case 'get_articles':
	    $articles = $run_articles->getArticles();
      require_once DIR.'/templates/articles/get_articles.php';
	    break;
  }
?>