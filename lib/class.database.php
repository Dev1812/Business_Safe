<?php
/**
 * @author Issaev Timur
 * @desc Класс для работы с базой данных
 *
 */
class DataBase{
  /**
   * @desc Установка соединения с базой данных
   * @param <String> host     - адрес с сервером базы данных
   * @param <String> user     - имя пользователя
   * @param <String> password - пароль
   * @param <String> db_name  - имя базы данных
   * @return <PDOstatement>   - специальный объект для выполнения запросов
   */
  public function connect($host = 'mysql.hostinger.es', $user = 'u673773912_queue', $password = 'UVVFVUVfUFVTSA==', $db_name = 'u673773912_biz') {
    return new PDO('mysql:host='.$host.';dbname='.$db_name, $user, base64_decode($password));
  }
}
?>