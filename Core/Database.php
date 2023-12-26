<?php 

namespace Core;

class Database 
{
  public $connection;

  function __construct($config, $username = 'root', $password = '')
  {
    $config = http_build_query($config, '', ';');
    $dsn = 'mysql:' . $config;
    
    $this->connection = new \PDO($dsn, $username, $password, [
      \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
    ]);
  }

  function query($query, $params = []) 
  {
    $statement = $this->connection->prepare($query);
    $statement->execute($params);

    return $statement;
  }
}