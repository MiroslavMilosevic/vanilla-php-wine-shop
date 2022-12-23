<?php
/**
 * Database class, used to access data from Database using mysqli and Singelton pattern
 */
class Database
{

  private static $instance;
  private $conn;

  function __construct()
  {
    $this->setConn();
  }


  /**
  * Creates an instance of this class if not instantiated already
  * @return self
  */
  static function instance()
  {
      if (self::$instance === null)
      {
          self::$instance = new self;
      }
      return self::$instance;
  }

  /**
  * Creates a new instance of database connection
  * @return Void
  */
  private function setConn()
  {


    $this->conn = new \mysqli(DB_HOST,DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);
		if ( $this->conn->connect_errno ) {
      throw new Exception("could not connect to db"); die();
    }
    // force ut8mb4 encoding
    $this->conn->set_charset('utf8mb4');
  }


  /**
  * Returns an instance of Database connection
  * @return Object
  */
  function getConn()
  {
    return $this->conn;
  }

}
