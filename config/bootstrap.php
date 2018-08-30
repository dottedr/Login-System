<?php
namespace Config;

use PDO;

class Bootstrap
{
    private $host = "127.0.0.1";
    private $db_name = "test";
    private $username = "root";
    private $password = "pass";
    private $socket_type = "mysql";

    private $pdo = NULL ;

    /**
     * return in instance of the PDO object that connects to the SQLite database
     * @return PDO
     */
    public function __construct()
    {
        if ($this->pdo == NULL) {
            try {
                $db = new PDO(''.$this->socket_type.':host='.$this->host.';dbname='.$this->db_name,$this->username,$this->password);
                $this->pdo=$db;

            }catch (\PDOException $e){
                die($e->getMessage());
            }
        }
        else{
            echo "PDO connection already opened ";
        }
    }


    public function query($sql)
    {
        $query = $this->pdo->prepare($sql);
        $query->execute();
        return $query;


    }

}