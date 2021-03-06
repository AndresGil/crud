<?php

include (APPLICATION_PATH."/src/Application/Model/db/getTransports.php");
include (VENDOR_PATH."/acl/Core/src/Core/crud/readFields.php");

// $config=array();

$config = readConfig('../configs/application.config.php');

$transports = getTransports($config['database']);


echo "<\br> Estas en UserForm ";

//die;
 


return array(
    'id'=>array(
//         'type'=>'hidden',
        'filters'=> array('Stringtrim', 'StripTags', 'Escape'),
        'validators' => array ('required'=>true)
    ),
    'name'=>array(
        'label'=>'Nombre',
        'type'=>'text',
        'filters'=> array('Stringtrim', 'StripTags', 'Escape'),
        'validators' => array ('lenghtMax'=>200,
            'lenghtMin'=>1,
            'required'=>true
        )
    ),
    'email'=>array(
        'label'=>'Email',
        'type'=>'email',
        'filters'=> array('Stringtrim', 'StripTags', 'Escape'),
        'validators' => array ('lenghtMax'=>200,
            'lenghtMin'=>1,
            'required'=>true,
            'email'=>true
        )
    ),
    'password'=>array(
        'label'=>'Contraseña',
        'type'=>'password',
        'filters'=> array('Stringtrim', 'StripTags', 'Escape'),
        'validators' => array ('lenghtMax'=>200,
            'lenghtMin'=>8,
            'required'=>true            
        )
    ),
    'birthdate'=>array(
        'label'=>'Fecha de nacimiento',
        'type'=>'date',
        'validators' => array ('date'=>true)
    ),
    'description'=>array(
        'label'=>'Descripcion',
        'type'=>'textarea',
        'filters'=> array('Stringtrim',  'Escape')        
    ),
    'gender'=>array(
        'label'=>'Sexo',
        'type'=>'radio',
        'options'=>array('Mujer'=>'mujer',
            'Hombre' =>'hombre',
            'Otro'=>'otro'            
        ),
        'validators'=>array('inArray'=>true,
                            'required'=>true
        )    
    ),
    'idtransport'=>array(
        'label'=>'Tipo de transporte',
        'type'=>'checkbox',
        'options'=>array('Coche'=>'coche',
                        'Bicicleta' =>'bicycle',
                        'Moto'=>'motorcycle'
        ),
//         'options'=> readFields($transports,$config['database']),
        'validators'=>array('inArray'=>true)  
    ),
    'city'=>array(
        'label'=>'Ciudad',
        'type'=>'select',
        'options'=>array('Santiago de Compostela'=>'scq',
            'Vigo' =>'vigo',
            'A Coruña'=>'aco'
        ),
        'validators'=>array('inArray'=>true)
    ),
    'code'=>array(
        'label'=>'Programas en?',
        'type'=>'selectmultiple',
        'options'=>array('PHP'=>'php',
            'Java' =>'java',
            'C++'=>'c++',
            'Otros'=>'otros',
        ),
        'validators'=>array('inArray'=>true)
    ),
    'submit'=>array(
        'label'=>'Enviar',
        'type'=>'submit'                
    ),
    

);



