<?php
class db{
    private $host = 'localhost';
    private $username='root';
    private $pass='';
    private $database='sidbol';

    public function connectar(){
        $conection_mysql = "mysql:host=$this->host;dbname=$this->database";
        $conection_bd = new PDO($conection_mysql, $this->username, $this->pass);
        $conection_bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $conection_bd -> exec("set names utf8");

        return $conection_bd;
    }
}
?>