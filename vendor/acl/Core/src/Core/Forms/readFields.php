<?php
function readFields($transports)
{

    echo "<pre>";
        print_r($transports);
   echo "</pre>";     
    die;
    
    // Conectarse al DBMS
    $link = mysqli_connect($config['host'],
        $config['user'],
        $config['password']
    );
    
    // Seleccionar la DB
    mysqli_select_db($link, $config['database']);
    
    // Crear la consulta
    //   $query = "SELECT * FROM user where iduser=\". $id .\"";
    $query = "SELECT * FROM transport where idtransport=".$transports."";
    
    // Enviar la consulta
    $result = mysqli_query($link, $query);
    
    // Recorrer el recordset
  
    while($row = mysqli_fetch_assoc($result))
    {
              $users=$row;
    }
    
    // Cerra la coneccion
    mysqli_close($link);
    
    echo "<pre> Users:";
    print_r($users);
    echo "</pre>";
    
}