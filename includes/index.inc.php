<?php 
    include 'db.inc.php';
    include 'functions.php';
    $error = '';
    $user = null;
    if(isset($_POST['submit'])){
        $name = htmlspecialchars($_POST['name']);
        $response= getUser($name);
        if(empty($response['message'])){
            $user = uploadDb($response,$conn);
        }else{
            echo $error = $response['message'];
        }
        
    }