<?php
/**
 * Class to connect to the data base
 */
class dataBase {
  const host  = "";
  const dbName = "EmpruntsAdep";
  const login = "phpmyadmin";
  const mdp = "hanane";
  static public function BD() {
    $db = new PDO("mysql:host=" . self::host .";dbname=" . self::dbName , self::login, self::mdp);
    return $db;
  }
}
