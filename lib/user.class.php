<?php

class user {

    private $_db ;

    public $_id;


    function user($id="")
    {   
        if(!class_exists("DB")){
           require_once("Db.class.php");
        }
        $this->_db = new DB();
        if(!empty($id))
          $this->setId($id);
    }

    public function setId($id)
    {   
        $this->_id = $id;
    }

    public function isUser($username,$password)
    {
	if(empty($username)) return false;
	if(empty($password)) return false;

	
        $sql = "SELECT * FROM user WHERE username=:username and password=:password";
        $dbh = $this->_db->dest->prepare($sql);
        $dbh->execute(array(':username'=>$username,':password'=>$password));
        return $dbh->fetch(PDO::FETCH_OBJ);
    }

    public function isLogin()
    {
	return isset($_SESSION['username']);
    }

    public function loginOut()
    {
    }

}
