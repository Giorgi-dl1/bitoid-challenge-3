<?php 
    include 'db.inc.php';
    include 'functions.php';
    $error = $_GET['error'] ?? '';
    $user = null;
    if(isset($_POST['submit'])){
        $name = htmlspecialchars($_POST['name']);
        $response= getUser($name);
        if(empty($response['message'])){
            $user = uploadDb($response,$conn);
        }else{
            $error = $response['message'];
        }
        
    }

    switch($error){
        case'notfound':
            $error = 'User not found!';
            break;
        case'Not Found':
            $error = 'User not found!';
            break;
        case'stmtfailed':
            $error = 'Something went wrong!';
            break;
    }
    
    if(preg_match('/^API rate limit exceeded/',$error)){
        echo 'API request limit exceeded!'; 
    }