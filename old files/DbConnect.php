<?php
class DbConnect {    
    private $conn;
    function __construct() {
        
        // connecting to database
        $this->connect();
    }    
    function __destruct() {
        
        $this->close();
    }
    function connect() {        
        include_once dirname(__FILE__) . '/Config.php';
        $this->conn = mysql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD) or die(mysql_error());
       // get host name, username and password from Config.php file
     
        mysql_select_db(DB_NAME) or die(mysql_error()); // get database name from Config.php
        
        return $this->conn; // return connection resource
    }   
     // Close function   
    function close() {
        // close db connection
        mysql_close($this->conn);
    }
}
?>