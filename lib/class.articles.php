<?php
/**
 * @author Issaev Timur
 * @date 15.03.2017
 *
 */
class Articles{
	
  public $database = null;
  public $common = null;
 
  public $max_rows = 5;
  
  public function __construct() {
    require_once DIR.'/lib/class.database.php';
    require_once DIR.'/lib/class.common.php';

    $run_database = new DataBase;
    $this->common = new Common;

    $this->database = $run_database->connect();
  }
  
  /**
   * @desc Получение всех записей
   * @param <Int>    offset - смещение для выборки записей, по умолчанию = 0
   * @return <Array> result - массив со статьями, смещением, ошибками, индикатором конца статей
   *
   */
  public function getArticles($offset = 0){
    $offset = intval($offset);
    $has_more = false;
    $get_articles = $this->database->prepare("SELECT `id`, `title`, `owner_id`, `date_created`, `text` FROM `articles` ORDER BY `id` DESC LIMIT :offset, :max_rows");
    $get_articles->bindParam(':offset', $offset, PDO::PARAM_INT);
    $get_articles->bindParam(':max_rows', $this->max_rows,  PDO::PARAM_INT);
    $get_articles->execute();
    while($row = $get_articles->fetch(PDO::FETCH_ASSOC)) {
      $row['date_created'] = $this->common->parseTimestamp($row['date_created']);
      $row['text'] = $this->common->stripText($row['text']);
      $arr[] = $row;
    }
    if(count($arr) > ($this->max_rows - 1)) {
      $has_more = true;
    }
    $offset = $offset + $this->max_rows;
    return array('err'=>false,'articles'=>$arr,'has_more'=>$has_more,'offset'=>$offset);
  }
  /**
   * @desc Получение статью по её id
   * @param <Int>    article_id - id статьи, по умолчанию = 0
   * @return <Array> result - массив со статьей и ошибками
   *
   */
  public function getArticle($article_id = 0){
    $get_article = $this->database->prepare("SELECT `id`, `title`, `owner_id`, `date_created`, `text` FROM `articles` WHERE `id` = :article_id");
    $get_article->bindParam(':article_id', $article_id, PDO::PARAM_INT);
    $get_article->execute();
	  $row = $get_article->fetch(PDO::FETCH_ASSOC);
    $row['date_created'] = $this->common->parseTimestamp($row['date_created']);
    return array('err'=>false,'article'=>$row);
  }
}
?>