<?php 
    include 'functions.php';
    $error = '';
    $user = null;
    if(isset($_POST['submit'])){
        $name = htmlspecialchars($_POST['name']);
        if(preg_match('/^[a-zA-Z]*$/',$name)){
            $user = getUser($name);
            if(empty($user['message'])){
                echo 'Found';
            }else{
                echo 'Error';
            }
        }else{
            $error = 'Invalid name';
            echo $error;
        }
    }