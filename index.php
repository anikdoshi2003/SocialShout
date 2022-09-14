<?php
require_once 'Assets/PHP/functions.php';
if(isset($_GET['signup'])){
    showPage('header',['page_title'=>'SNS-Signup']);
    showPage('signup');

}
showPage('footer');
unset($_SESSION['error']);
unset($_SESSION['formdata']);
