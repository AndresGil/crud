<?php
function readFields($transports,$config)
{

//     echo "<pre>traports";
//         print_r($transports);
//    echo "</pre>"; 

//    echo "<pre>Config";
//         print_r($config);
//    echo "</pre>";
    
   
//     die;
    
    // Conectarse al DBMS
    $link = mysqli_connect($config['host'],
        $config['user'],
        $config['password']
    );
    
    // Seleccionar la DB
    mysqli_select_db($link, $config['database']);
    
    // Crear la consulta
    //   $query = "SELECT * FROM user where iduser=\". $id .\"";

    foreach ($transports as $key => $value)
    {
        foreach ($value as $key2 => $value2)
        {
            if($key2 == 1)
            {
                $query = "SELECT * FROM transport where transport='".$transports[$key][1]."'";
            //    echo "</br>Query : ".$query;
                // Enviar la consulta
                $result = mysqli_query($link, $query);
                // Recorrer el recordset
                while($row = mysqli_fetch_assoc($result))
                {
                    $users[]=$row;
                }
            }
        }   
    }

    // Cerra la coneccion
    mysqli_close($link);
    
//     ECHO "<PRE> USERS:";
//      PRINT_R($users);
//     ECHO "</PRE>";
//     DIE();
}