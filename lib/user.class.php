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

    public function getUserById($id)
    {   
        if(empty($id))
           return false;
        else
           $this->setId($id);

        try{
          $sql = "SELECT * FROM user WHERE id=:id";
          $dbh = $this->_db->dest->prepare($sql);
          $dbh->execute(array(':id'=>$this->_id));
          $info = $dbh->fetch(PDO::FETCH_OBJ);
          return $info;
        }
        catch(Exception $e) {
          return false;
        }
    }
}
