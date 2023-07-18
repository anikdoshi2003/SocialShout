
<div class="login">
        <div class="col-4 bg-white border rounded p-4 shadow-sm">
            <form action="Assets/PHP/actions.php?login" method="post">
                <div class="d-flex justify-content-center">

                    <img class="mb-4" src="Assets/Images/SocialShout-logo-3.png" alt="" height="100">
                </div>
                <h1 class="h5 mb-3 fw-normal">Please Sign In</h1>
 
                <div class="form-floating">
                    <input type="text" name="username_email" value="<?=showFormData('username_email') ?>" class="form-control rounded-0" placeholder="username/email">
                    <label for="floatingInput">Username/Email</label>
                </div>
                <?=showError('username_email') ?>
                <div class="form-floating mt-1">
                    <input type="password" name="password" class="form-control rounded-0" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <?=showError('password') ?>
                <?=showError('checkuser') ?>

                <div class="mt-3 d-flex justify-content-between align-items-center">
                    <button class="btn btn-primary" type="submit">Sign In</button>
                    <a href="?signup" class="text-decoration-none">Create New Account</a>

                </div>
                <br>
                <a href="?forgotpassword&newfp" class="text-decoration-none">Forgot Password ?</a>
            </form>
        </div>
    </div>
