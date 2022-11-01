<?php
require_once 'Assets/PHP/functions.php';
if(isset($_SESSION['Auth'])){
    echo "User is Logged in";
    $userdata= $_SESSION['userdata'];
    echo "<pre>";
    print_r($userdata);
}
elseif(isset($_GET['signup'])){
    showPage('header',['page_title'=>'SocialShout-Signup']);
    showPage('signup');

}
elseif (isset($_GET['login'])){
    showPage('header',['page_title'=>'SocialShout-Login']);
    showPage('login');
}
else {
    showPage('header',['page_title'=>'SocialShout-Login']);
    showPage('login');
}
showPage('footer');
unset($_SESSION['error']);
unset($_SESSION['formdata']);
