<?php
/**
 * @author Issaev Timur
 * @date 17.03.2017
 *
 */
class Admin{
	
  public $database = null;
  public $common = null;

  const MIN_EMAIL = 4;
  const MAX_EMAIL = 90;

  const MIN_PASSWORD = 4;
  const MAX_PASSWORD = 90;

  const MIN_TITLE = 4;
  const MAX_TITLE = 77;

  const MIN_TEXT = 4;
  const MAX_TEXT = 10000;

  
  public function __construct() {
    require_once DIR.'/lib/class.database.php';
    require_once DIR.'/lib/class.common.php';

	  $run_database = new DataBase;
    $this->common = new Common;

    $this->database = $run_database->connect();
  }
  
  /**
   * @desc Вход для Администратора. Редирект в случае успешного входа
   * @param <String> email     - Логин
   * @param <String> password  - Пароль
   * @return <Array> Массив со статусом ошибок и сообщением
   */
  public function login($email, $password) {
    $email_length = mb_strlen($email);
    $password = addslashes(htmlspecialchars(strip_tags($password)));
    $password_length = mb_strlen($password);

    if($email_length < self::MIN_EMAIL) {
      return array('err'=>true,'err_msg'=>'<div class="form_msg_title">Слишком короткий email</div>Email должен быть не менее 4 символов в длину');
    } else if($email_length > self::MAX_EMAIL) {
      return array('err'=>true,'err_msg'=>'<div class="form_msg_title">Слишком длинный email</div>Email должен быть не более 90 символа в длину');
    }

    if($password_length < self::MIN_PASSWORD) {
      return array('err'=>true,'err_msg'=>'<div class="form_msg_title">Слишком короткий пароль</div>Пароль должен быть не менее 4 символов в длину');
    } else if($password_length < self::MIN_PASSWORD) {
      return array('err'=>true,'err_msg'=>'<div class="form_msg_title">Слишком длинный пароль</div>Пароль должен быть не более 90 символов в длину');
    }

    if($email != 'admin' || $password != 'nokia') {
      return array('err'=>true,'err_msg'=>'<div class="form_msg_title">Неправильный логин или пароль</div>Пожалуйста проверьте правильность ввода');
    }

    $_SESSION['is_admin'] = true;
    
    header('Location: /admin?act=add_article');
    exit;
  }

  /**
   * @desc Добавление статьи
   * @param <String> title - заголовок статьи
   * @param <String> text  - текст статьи
   * @return <Array> Массив со статусом ошибок и сообщением
   *
   */
  public function addArticle($title, $text){
    $title = htmlspecialchars($title);
    $text = htmlspecialchars($text);

    $title_length = mb_strlen($title);
    $text_length = mb_strlen($text);

    if($title_length < self::MIN_TITLE) {
      return array('err'=>true,'err_msg'=>'<div class="form_msg_title">Слишком короткий заголовок</div>Заголовок должен быть не менее 4 символов в длину');
    } else if($title_length > self::MAX_TITLE) {
      return array('err'=>true,'err_msg'=>'<div class="form_msg_title">Слишком длинный заголовок</div>Заголовок должен быть не более 77 символов в длину');
    }

    if($text_length < self::MIN_TEXT) {
      return array('err'=>true,'err_msg'=>'<div class="form_msg_title">Слишком короткий текст</div>Текст должен быть не менее 3 символов в длину');
    } else if($text_length > self::MAX_TEXT) {
      return array('err'=>true,'err_msg'=>'<div class="form_msg_title">Слишком длинный текст</div>Текст должен быть не более 10000 символов в длину');
    }

	  $date_created = time();

    $patterns = array(0 => '/&lt;text_block&gt;/',//<text_block>
                      1 => '/&lt;!text_block&gt;/',//<!text_block>
                      2 => '/&lt;br&gt;/',//<br>
                      3 => '/&lt;b&gt;/',//<b>
                      4 => '/&lt;!b&gt;/',//<!b>
                      5 => '/&lt;ul&gt;/',//<ul>
                      6 => '/&lt;li&gt;/',//<li>
                      7 => '/&lt;!li&gt;/',//<!li>
                      8 => '/&lt;!ul&gt;/');//<!ul>

    $replacements = array(0 => '<div class="text_block">',
                          1 => '</div>',
                          2 => '<br>',
                          3 => '<b>',
                          4 => '</b>',
                          5 => '<ul>',
                          6 => '<li>',
                          7 => '</li>',
                          8 => '</ul>');

    $text = preg_replace($patterns, $replacements, $text); // Замена

    $add_article = $this->database->prepare("INSERT INTO `articles`(`id`, `title`, `owner_id`, `date_created`, `text`) VALUES ('',:title,'1',:date_created,:_text)");
    $add_article->execute(array(':title' => $title,
	                              ':date_created' => $date_created,
								                ':_text' => $text));
    return array('err'=>false,'text'=>'<div class="form_msg_title">Статья успешно создана</div>Посмотреть статью можно <a href="articles" target="_blan">здесь</a>');
  }

  /**
   * @desc Проверка на Администратора
   * @return <Boolean> true Если это Администратор 
   * @return <Boolean> false Если это не Администратор
   *
   */
  public function isAdmin() {
    if($_SESSION['is_admin'] === true) {
      return true;
    } else {
      return false;
    }

  }

  /**
   * @desc Выход из учётной записи Администратора
   *
   */
  public function logout() {
    session_destroy();
    header('Location: /admin');
  }


}
?>