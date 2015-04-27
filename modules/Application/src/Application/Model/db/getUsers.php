<?php
/**
 * Muestra todos los usuarios en una tabla
 * 
 * @param  $config -> configuracion de la base de datos
 * @return $users -> Es la fila encontrada
 */




function getUsers($config)
{
    // Conectarse al DBMS
    $link = mysqli_connect($config['host'],
        $config['user'],
        $config['password']
    );

    // Seleccionar la DB
    mysqli_select_db($link, $config['database']);

    // Crear la consulta
    $query = "SELECT * FROM user";

    // Enviar la consulta
    $result = mysqli_query($link, $query);

    // Recorrer el recordset
    while($row = mysqli_fetch_assoc($result))
    {
        $users[]=$row;
    }

    // Cerra la coneccion
    mysqli_close($link);

    return $users;
}