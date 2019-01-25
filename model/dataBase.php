<?php
/**
 * Class to connect to the data base
 */
class dataBase {

  const host  = "localhost";
  const dbName = "EmpruntsAdep";
  const login = "ben";
  const mdp = "test";

  static public function BD() {
    $db = new PDO("mysql:host=" . self::host .";dbname=" . self::dbName , self::login, self::mdp);
    return $db;
  }
}
