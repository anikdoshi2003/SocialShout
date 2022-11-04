<?php
require_once 'functions.php';
require_once 'send_code.php';


//for managing signup
if (isset($_GET['signup'])) {
    $response = validateSignupForm($_POST);

    if ($response['status']) {
        if (createUser($_POST)) {
            header('location:../../?login&newuser');
        } else {
            echo "<script>alert('Something is wrong')</script>";
        }
        
        
    } else {
        $_SESSION['error']    = $response;
        $_SESSION['formdata'] = $_POST;
        header("location:../../?signup");
    }
}

//for managing login
if (isset($_GET['login'])) {
    
    $response = validateLoginForm($_POST);
    
    if ($response['status']) {
        $_SESSION['Auth'] = true;
        $_SESSION['userdata'] = $response['user'];
        if ($response['user']['acc_status'] == 0) {
            $_SESSION['code'] = $code = rand(111111, 999999);
            sendCode($response['user']['email'], 'Verify Your Email', $code);
            
        }
        
        header("location:../../");
        
    } else {
        $_SESSION['error']  = $response;
        $_SESSION['formdata'] = $_POST;
        header("location:../../?login");
    }
}

if (isset($_GET['resend_code'])) {
    $_SESSION['code'] = $code = rand(111111, 999999);
    sendCode($_SESSION['userdata']['email'], 'Verify Your Email', $code);
    header('location:../../?resended');
}

if (isset($_GET['verify_email'])) {
    $user_code = $_POST['code'];
    $code      = $_SESSION['code'];
    if ($code == $user_code) {
        if (verifyEmail($_SESSION['userdata']['email'])) {
            header('location:../../');
        } else {
            echo "Something is Wrong";
        }
    } else {
        $response['msg'] = "Incorrect Verification Code!";
        if (!$_POST['code']) {
            $response['msg'] = "Enter 6 Digit Code!";
        }
        $response['field'] = 'email_verify';
        $_SESSION['error'] = $response;
        header('location:../../');
    }
}

if (isset($_GET['forgotpassword'])) {
    if (!$_POST['email']) {
        $response['msg']   = "Enter Your Email Id";
        $response['field'] = 'email';
        $_SESSION['error'] = $response;
        header('location:../../?forgotpassword');

    } elseif (!isEmailRegistered($_POST['email'])) {
        $response['msg']   = "Email Id is not reigstered";
        $response['field'] = 'email';
        $_SESSION['error'] = $response;
        header('location:../../?forgotpassword');

    } else {
        $_SESSION['forgot_email'] = $_POST['email'];
        $_SESSION['forgot_code']  = $code = rand(111111, 999999);
        sendCode($_POST['email'], 'Forgot Your Password ?', $code);
        header('location:../../?forgotpassword&resended');
    }
    
    //for User Logout
    if (isset($_GET['logout'])) {
        session_destroy();
        header('location:../../');
    }
}

//for verifying forgot code
if (isset($_GET['verifycode'])) {
    $user_code = $_POST['code'];
    $code = $_SESSION['forgot_code'];
    if ($code==$user_code) {
        $_SESSION['auth_temp'] =true;
        header('location:../../?forgotpassword');
    } else {
    $response['msg'] = "Incorrect Verification Code !";
    if (!$_POST['code']) {
        $response['msg'] = "Enter 6 Digit Code!";
    }
    $response['field'] = 'email_verify';
    $_SESSION['error'] = $response;
    header('location:../../?forgotpassword');
}
}

if(isset($_GET['changepassword'])){
    if (!$_POST['password']) {
        $response['msg'] = "Enter Your New Password";
        $response['field'] = 'password';
        $_SESSION['error'] = $response;
        header('location:../../?forgotpassword');
    }else{
        resetPassword($_SESSION['forgot_email'],$_POST['password']);
    header("location:../../?reseted");
    }
}

if(isset($_GET['updateprofile'])){

echo "<pre>";
    $response = validateUpdateForm($_POST,$_FILES['profile_pic']);
    if ($response['status']) {
        if(updateProfile($_POST,$_FILES['profile_pic'])){
            header("location:../../?editprofile&success");
        }else{
            echo "Something is Wrong";
        }
    } else {
        $_SESSION['error']    = $response;
        header("location:../../?editprofile");
    }   
}