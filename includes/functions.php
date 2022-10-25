<?php 
function getUser(string $name){
    $curl_handle = curl_init();
    $url = "https://api.github.com/users/$name";
    curl_setopt($curl_handle, CURLOPT_URL, $url);
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
    $headers = array(
        "User-Agent: index.php",
    );
    curl_setopt($curl_handle, CURLOPT_HTTPHEADER, $headers);
    $curl_data = curl_exec($curl_handle);
    curl_close($curl_handle);
    $response_data = json_decode($curl_data,true);
    return $response_data;
}
function fetchAllDb($conn){
    $sql = 'SELECT * FROM users;';
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header('location: ../index.php?error=stmtfailed');
        exit();
    }
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_all($result,MYSQLI_ASSOC)){
        return $row;
    }else{
        return false;
    }
    mysqli_stmt_close($stmt);
}
function getUserDb($name, $conn){
    $sql = 'SELECT * FROM users WHERE name = ?;';
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header('location: ../index.php?error=stmtfailed');
        exit();
    }
    mysqli_stmt_bind_param($stmt,'s',$name);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($result)){
        return $row;
    }else{
        return false;
    }
    mysqli_stmt_close($stmt);
}
function uploadDb($data,$conn){
    $name = $data['login'];
    $check = getUserDb($name,$conn);
    if($check !== false){
        return $check;
    }else{
        $followers = $data['followers'];
        $repositories = $data['public_repos'];
        $avatar = $data['avatar_url'];
        $html = $data['html_url'];
        $sql = 'INSERT INTO users (name,followers,repositories,avatar_url,html_url) VALUES (?,?,?,?,?);';
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header('location: ../index.php?error=stmtfailed');
            exit();
        }
        mysqli_stmt_bind_param($stmt,'sddss',$name,$followers,$repositories,$avatar,$html);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return getUserDb($name,$conn);
    }
}

