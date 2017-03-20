<?php
/**
 * @author Issaev Timur
 */
class Common{
  /**
   * @desc Функция для обрезки текста
   * @param <String>  text       - текст
   * @param <Int>     max_length - максимальная длина текста для обрезки
   * @return <String> text      - укороченный текст  
   * 
   */
  public function stripText($text, $max_length = 190) {
    if(mb_strlen($text) < $max_length) {
      return strip_tags($text);
    }
    $text = strip_tags($text);
    $text = mb_substr($text, 0, $max_length);
    $text = rtrim($text, "!,.-");
    $text = mb_substr($text, 0, strrpos($text, ' '));
    return $text.'… '; 
  }
  
  /**
   * @desc Получение сокращённого названия месяца
   * @date 10.04.2016 9:40
   * @return <String> Сокщённое назваие месяца
   */
  public function getShortMonth($num) {  
    if(!isset($num) || $num < 0 || $num > 12) return false;
    $short_month = array(
      1 => 'янв',
      2 => 'фев',
      3 => 'мар',
      4 => 'апр',
      5 => 'май',
      6 => 'июн',
      7 => 'июл',
      8 => 'авг',
      9 => 'сен',
      10 => 'окт',
      11 => 'ноя',
      12 => 'дек');
    return $short_month[$num];
  }

  /**
   * @desc Получение даты из timestamp
   * @date 20:17 22.04.2016
   * @example сегодня в 12:40
   * @return <String> Сокращённую дату
   */
  public function parseTimestamp($ts) {
    if(!$ts || !is_numeric($ts)) return false;
  
    $ts_date = date('h:i j n Y', $ts);
    list($ts_time, $ts_day, $ts_month, $ts_year) = explode(' ', $ts_date);
 
    $date = date('j n Y');
    list($day, $month, $year) = explode(' ', $date);
    $yesterday = $day-1;
    if($year != $ts_year) {
      return $ts_day.' '.$this->getShortMonth($ts_month).' '.$ts_year;//21 дек 2014
    } else {
      if($day == $ts_day) {
        return 'сегодня в '.$ts_time;//сегодня в 11:40
      } elseif($yesterday == $ts_day) { //вчера
        return 'вчера в '.$ts_time;//вчера в в 11:40
      } else {
        return $ts_day.' '.$this->getShortMonth($ts_month).' в '.$ts_time;//9 дек в 14:32
      }
    }
  } 
}
?>