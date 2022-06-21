<?php 
    

    // connecting with database :

    $servername = 'localhost'; 
    $username  = 'root';
    $password  = '';
    $database  = 'CMS';

    $connection = mysqli_connect($servername,$username,$password,$database);


    // or

    // $db['db_host'] = "localhost";
    // $db['db_user'] = "root";
    // $db['db_pass'] = "";
    // $db['db_name'] = "CMS";

    // foreach ($db as $key => $value) {
    //     define(strtoupper($key),$value);
    // }
    
    // $connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

    // if($connection){
    //     echo 'DB Connected Successfully';
    // }
    
?>