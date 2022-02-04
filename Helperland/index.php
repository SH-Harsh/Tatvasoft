<?php

$controller='Event';
$function='home_page';
$parameter='';
$base_url = "http://localhost/helperland/";
// session_start();

if(isset($_GET['controller']) && $_GET['controller'] !=''){
    $controller= $_GET['controller'];
}

if(isset($_GET['function']) && $_GET['function'] !=''){
    $function= $_GET['function'];
    // echo "$function";
}

if(isset($_GET['parameter']) && $_GET['parameter'] !=''){
    $parameter= $_GET['parameter'];
}

if(file_exists('controllers/controller.php')){
    include('controllers/controller.php');
    $class = $controller.'Controller';
    $obj = new $class();
    if(method_exists($class,$function)){
        if($parameter){
            $obj->$function($parameter);
          }else{
           $obj->$function();
          }
    }else{
        echo 'Function not found';
    }
}else{
    echo 'Controller Not Found';
}
