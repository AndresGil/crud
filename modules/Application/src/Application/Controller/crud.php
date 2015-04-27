<?php

include (VENDOR_PATH."/acl/Core/src/Core/View/renderView.php");
include (APPLICATION_PATH."/src/Application/Model/db/getUsers.php");
include (APPLICATION_PATH."/src/Application/Model/db/getUser.php");
include (APPLICATION_PATH."/src/Application/Model/db/setUser.php");
include (APPLICATION_PATH."/src/Application/Model/db/deleteUser.php");
include (APPLICATION_PATH."/src/Application/Model/db/patchUser.php");
include (APPLICATION_PATH."/src/Application/Model/db/putUser.php");

switch($request['action'])
{
    case 'index':
    case 'select':
        $users = getUsers($config['database']);        
        $content = renderView("../modules/Application/views/crud/select.phtml",
                              array('users'=>$users)
                    );   
    break;

    case 'insert':        //funciona perfectamente
        if($_POST)
        {              
            $user = setUser($_POST);
            header("Location: /crud/select");
        }
        else 
        {
            $content = renderView("../modules/Application/views/crud/insert.phtml");
        }
    break;

    case 'update':
        echo "esto es update";

        echo "<pre>";
            print_r($request['params']['iduser']);
        echo "</pre>";    
        die;
        
        
        if ($_POST)
        {
            $user = putUser($_POST['iduser'], $_POST);
            header("Location: /crud/select");
        }
        else
        {                       
            $user = getUser($config['database'], $request['params']['iduser']);
            $content = renderView("../modules/Application/views/crud/update.phtml",
                              array('fieldsLine'=>$user)
                    );
        }
    break;

    case 'delete':
        echo "esto es delete";
        if ($_POST)
        {
            if ($_POST['borrar'] === "SI")
            {
                deleteUser($_POST['id'] , $config['database']);
            }               
            header("Location: /crud/select");    
        }
        else
        {     
            $user = getUser($config['database'], $request['params']['id']);
            $content = renderView("../modules/Application/views/crud/delete.phtml",
                array('user'=>$user)
            );
        }
    break;
}

// $content = "kaka";

include ("../modules/Application/views/layouts/dashboard.phtml");