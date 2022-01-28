<?php 
    
    $db['db_host'] = 'localhost:3307';
    $db['db_user'] = 'root';
    $db['db_pass'] = '';
    $db['db_name'] = 'helperland';

    global $connection;

    $connection = mysqli_connect($db['db_host'],$db['db_user'],$db['db_pass'],$db['db_name']);

    if(!$connection)
        die("Connection Failed");
    // else
    //     echo "Connection Successfull"
?>