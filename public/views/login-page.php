<?php include ROOT . '/public/views/layouts/header.php'; ?>


    <div class="registration-wrapper ">

        <div class="registration-window z-depth-3">
            <label class="h4 mt-1  tab active"><i class="fa fa-user-plus"></i>Registration</label>
            <label class="h4 tab"><i class="fa fa-sign-in"></i>Login</label>

            <form method="post" action="/user/register" class="text-center border border-light active tab-form p-5">

                <div class="form-row mb-4">
                    <div class="col md-form">
                        <input type="text" name="first_name" id="reg-fn" class="form-control" required>
                        <label for="reg-fn">First Name</label>

                    </div>
                    <div class="col md-form">
                        <input type="text" name="last_name" id="reg-ln" class="form-control" required>
                        <label for="reg-ln">Last Name</label>
                    </div>
                </div>

                <div class="md-form">
                    <input type="email" id="rg-mail" name="email" class="form-control mb-4" required>
                    <label for="rg-mail">E-mail</label>
                </div>
                <div class="md-form">
                    <input type="password" id="rg-pass" name="password" class="form-control" required>
                    <label for="rg-pass">Password</label>
                    <small class="form-text text-muted mb-4">At least 6 characters or digit</small>
                </div>
                <div class="md-form">
                    <textarea name="description" id="rg-description" class="description" required></textarea>
                    <label for="rg-description">Description</label>
                </div>

                <button class="btn btn-info my-4 btn-block" type="submit">Register</button>
            </form>

            <form method="post" action="/user/login" name="sign-in"
                  class="text-center border border-light tab-form p-5 del">

                <div class="md-form">
                    <input type="email" id="login-email" name="login-email" class="form-control mb-4" required>
                    <label for="login-email">E-mail</label>
                </div>
                <div class="md-form">
                    <input type="password" id="login-password" name="login-password" class="form-control" required>
                    <label for="login-password">Password</label>
                    <small class="form-text text-muted mb-4">
                        At least 6 characters or digit
                    </small>
                </div>
                <button class="btn btn-info my-4 btn-block" type="submit">Sign in</button>

            </form>
        </div>
    </div>

<?php
include ROOT . '/public/views/layouts/footer.php';
?>