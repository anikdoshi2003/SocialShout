<?php
require_once 'Assets/PHP/functions.php';

// if(isset($_GET['newfp'])){
//     unset($_SESSION['auth_temp']);
//     unset($_SESSION['forgot_email']);
//     unset($_SESSION['forgot_code']);
// }

if(isset($_SESSION['Auth'])){
    $user = getUser($_SESSION['userdata']['id']);
}
if(isset($_SESSION['Auth'])&& $user['acc_status']==1){
    showPage('header',['page_title'=>'SocialShout-Home']);
    showPage('navbar');
    showPage('wall');
}
elseif(isset($_SESSION['Auth'])&& $user['acc_status']==0){
    showPage('header',['page_title'=>'Verify Your  Email']);
    showPage('verify_email');
}
elseif(isset($_SESSION['Auth'])&& $user['acc_status']==2){
    showPage('header',['page_title'=>'Account is BLocked']);
    showPage('blocked');
}
elseif(isset($_GET['signup'])){
    showPage('header',['page_title'=>'SocialShout-Signup']);
    showPage('signup');
}
elseif (isset($_GET['login'])){
    showPage('header',['page_title'=>'SocialShout-Login']);
    showPage('login');
}
elseif (isset($_GET['forgotpassword'])){
    showPage('header',['page_title'=>'SocialShout-Forgot Password']);
    showPage('forgot_password');
}
else {
    showPage('header',['page_title'=>'SocialShout-Login']);
    showPage('login');
}
showPage('footer');
unset($_SESSION['error']);
unset($_SESSION['formdata']);
?>