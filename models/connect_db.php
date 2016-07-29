<?php
class connect_db{
    function connect($cmd)
    {
        $dbServer="127.0.0.1";
        $dbUser="root";
        $dbPass="";
        $dbName="new";
        
        $conn=@mysqli_connect($dbServer,$dbUser,$dbPass,$dbName);
        
        if(!($conn)){    
            die("not connect database");
        }
        
        mysqli_set_charset($conn,"utf8");
        $result = mysqli_query($conn, $cmd);
        return $result;
    }
}
?>