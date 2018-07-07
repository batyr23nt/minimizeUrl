<?php

$error = '';
if(!isset($_POST['link'])){
    $error .= 'No LINK parameter switched ' . $link . PHP_EOL;
    echo $error;
}
else{
    $link =htmlspecialchars($_POST['link']);
    if(filter_var($link, FILTER_VALIDATE_URL) !== false){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'http://tinyurl.com/api-create.php');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('url' => $link)));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec ($ch);
        file_put_contents('data.txt', print_r($response, true) . PHP_EOL, FILE_APPEND);
        curl_close($ch);
        echo '<p>Your tiny URL is <a href="'. $response .'">'.$response.'</a></p>';

        if(strtolower($response) === 'error'){
            echo 'Unfortunately your request can not be sent((. Your link ' . $link;
        }
    }
    else{
        $error .= 'Your url is not correct, please make sure that you wrote right ' . $link;
        echo $error;
    }
}