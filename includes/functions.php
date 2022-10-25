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

