<?php
require_once 'functions.php';

if(isset($_GET['follow'])){
    $user_id = $_POST['user_id'];
    if(followuser($user_id)){
        $response['status'] =true;
    }else{
        $response['status']=false;
    }
    echo json_encode($response);
}

