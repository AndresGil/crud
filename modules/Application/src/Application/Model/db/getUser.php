<?php
function getUser($config, $iduser)//id
{
  
    echo " Esto es getUser ";

//     echo "<pre>Config:";
//         print_r($config);
//     echo "</pre>";
    
//     echo "<pre>Iduser:";
//          print_r($iduser);
//     echo "</pre>";
//      die;
  
    $users=array();
    // Conectarse al DBMS
    $link = mysqli_connect($config['host'],
        $config['user'],
        $config['password']
    );

    // Seleccionar la DB
    mysqli_select_db($link, $config['database']);

    // Crear la consulta
    $query = "SELECT * FROM user where iduser=\". $iduser .\"";
 //   $query = "SELECT * FROM user";

    // Enviar la consulta
    $result = mysqli_query($link, $query);

    // Recorrer el recordset

    while($row = mysqli_fetch_assoc($result))
    {
        if (in_array($iduser,$row))
        {
            $users=$row;// si eres el usuarui que busco entonces te guardo
//             echo "Te encontre iduser= $iduser ";
//             echo "<pre>";
//                 print_r($row);
//             echo "</pre>";    
//             die;
        }
    }

    // Cerra la coneccion
    mysqli_close($link);

//      echo "<pre> Users:";
//              print_r($users);
//      echo "</pre>";            

//     echo "<pre>Config:";
//        print_r($row);
//     echo "</pre>";
 //    die;
    return $users; //me envias todos los datos del usuario
}
    
    
    
    
    
    
    
    
    
    
    
    