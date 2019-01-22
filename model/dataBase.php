<?php
/**
 * Class to connect to the data base
 */
class dataBase {
<<<<<<< HEAD
  const host  = "";
  const dbName = "";
  const login = "";
  const mdp = "";
=======

  const host  = "localhost";
  const dbName = "";
  const login = "";
  const mdp = "";
  
>>>>>>> 1b87c9ebb0e7698dad757822bc6940ce455aa6df
  static public function BD() {
    $db = new PDO("mysql:host=" . self::host .";dbname=" . self::dbName , self::login, self::mdp);
    return $db;
  }
}
