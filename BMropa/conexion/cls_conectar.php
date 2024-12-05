<?php
   class conexion{

    function getConexion(){

        $server="localhost:3306";
        $login="usuario";
        $pass="contra";
        $bdatos="BMmoda1";
        $cn=mysqli_connect($server,$login,$pass,$bdatos);
        if(mysqli_connect_error()){
            echo 'error nro: '.mysqli_connect_error();
        }else{
            echo "";
        }
        return $cn;
    }
   }


?>