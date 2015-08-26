<?PHP
//define('DSN', "pgsql:host=localhost;port=5555; dbname=p4c user=searcher");
//$dest = new PDO(DSN);
//$dest->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

class DB {

    var $port;
    var $host;
    var $dbname;
    var $user;
    var $password;
    var $dest;

    public function __construct(
            $db = array("host" => "localhost","dbname"=>"gfhotel",
                        "port" => "3306","user"=>"gfhotel","password"=>"gfhotel")
            )
    {   
        $this->setHost($db["host"]);
        $this->setDbname($db["dbname"]);
        $this->setPort($db["port"]);
        $this->setuser($db["user"]);
        $this->setPassword($db["password"]);
        $this->dest = $this->connection();
    }

    public function __destruct()
    {
    }

    private function setHost($host)
    {   
        $this->host = $host;
    }

    private function setDbname($dbname)
    {   
        $this->dbname = $dbname;
    }

    private function setPort($port)
    {   
        $this->port = $port;
    }

    private function setUser($user)
    {   
        $this->user = $user;
    }

    private function setPassword($password)
    {   
        $this->password = $password;
    }

    private function getConn()
    {   
        return $this->connection();
    }

    public  function connection()
    {   
        $dsn = "mysql:host=$this->host;port=$this->port; dbname=$this->dbname";
        $dest = new PDO($dsn,$this->user,$this->password);
        $dest->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dest->exec("SET NAMES 'utf8'");
        return $dest;
    }

    public function beginTranscation()
    {  
       $this->dest->beginTransaction();
    }

    public function commitTanscation()
    {  
       return $this->dest->commit();
    }
}
?>
