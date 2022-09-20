<div class="login">
        <div class="col-4 bg-white border rounded p-4 shadow-sm">
            <form action="Assets/PHP/actions.php?signup" method="post">
                <div class="d-flex justify-content-center">

                    <img class="mb-4" src="assets/images/SocialShout-logo-1.png" alt="" height="80">
                </div>
                <h1 class="h5 mb-3 fw-normal">Create new account</h1>
                <div class="d-flex">
                    <div class="form-floating mt-1 col-6 ">
                        <input type="text" name="first_name" value="<?=showFormData('first_name') ?>" class="form-control rounded-0" placeholder="username/email">
                        <label for="floatingInput">First name</label>
                    </div> 
                    <div class="form-floating mt-1 col-6"> 
                        <input type="text" name="last_name" value="<?=showFormData('last_name') ?>" class="form-control rounded-0" placeholder="username/email">
                        <label for="floatingInput">Last name</label>
                    </div>
                </div>
                <?=showError('first_name') ?>
                <?=showError('last_name') ?>
                <div class="d-flex gap-3 my-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="exampleRadios1"
                            value="1" <?=isset($_SESSION['formdata']) ? '' : 'checked' ?>
                            <?=showFormData('gender') == 1 ? 'checked' : '' ?>> 
                        <label class="form-check-label" for="exampleRadios1">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="exampleRadios3"
                            value="2" <?=showFormData('gender') == 1 ? 'checked' : '' ?>>
                        <label class="form-check-label" for="exampleRadios3">
                            Female
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="exampleRadios2"
                            value="0" <?=showFormData('gender') == 1 ? 'checked' : '' ?>>
                        <label class="form-check-label" for="exampleRadios2">
                            Other
                        </label>
                    </div>
                </div>
                <div class="form-floating mt-1">
                    <input type="email" name="email" value="<?=showFormData('email') ?>" class="form-control rounded-0" placeholder="username/email">
                    <label for="floatingInput">Email Address</label>
                </div>
                <?=showError('email') ?>
                <div class="form-floating mt-1">
                    <input type="text" name="username" value="<?=showFormData('username') ?>" class="form-control rounded-0" placeholder="username/email">
                    <label for="floatingInput">Username</label>
                </div>
                <?=showError('username') ?>
                <div class="form-floating mt-1">
                    <input type="password" name="password" class="form-control rounded-0" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <?=showError('password') ?>

                <div class="mt-3 d-flex justify-content-between align-items-center">
                    <button class="btn btn-primary" type="submit">Sign Up</button>
                    <a href="#" class="text-decoration-none">Already have an account ?</a>
                </div>

            </form>
        </div>
    </div>
