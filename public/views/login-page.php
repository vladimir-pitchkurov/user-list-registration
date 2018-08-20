<?php
include ROOT . '/public/views/layouts/header.php'; ?>




<div class="registration-wrapper">

    <div class="registration-window z-depth-3">
        <label class="h4 mt-1  tab active"><i class="fa fa-user-plus"></i>Registration</label>
        <label class="h4 tab"><i class="fa fa-sign-in"></i>Login</label>


        <form class="text-center border border-light active tab-form p-5">

            <div class="form-row mb-4">
                <div class="col">
                    <!-- First name -->
                    <input type="text" id="defaultRegisterFormFirstName" class="form-control" placeholder="First name">
                </div>
                <div class="col">
                    <!-- Last name -->
                    <input type="text" id="defaultRegisterFormLastName" class="form-control" placeholder="Last name">
                </div>
            </div>

            <!-- E-mail -->
            <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="E-mail">

            <!-- Password -->
            <input type="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">
            <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                At least 6 characters or digit
            </small>

            <!-- Phone number -->
            <input type="text" id="defaultRegisterPhonePassword" class="form-control" placeholder="Phone number" aria-describedby="defaultRegisterFormPhoneHelpBlock">
            <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
                Optional - for two step authentication
            </small>


            <!-- Sign up button -->
            <button class="btn btn-info my-4 btn-block" type="submit">Sign in</button>



            <hr>

            <!-- Terms of service -->
            <p>By clicking
                <em>Sign up</em> you agree to our
                <a href="" target="_blank">terms of service</a> and
                <a href="" target="_blank">terms of service</a>. </p>

        </form>
        <!-- Default form register -->



        <form name="sign-in" type="post" class="text-center border border-light tab-form p-5 del">

            <!-- E-mail -->
            <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="E-mail">

            <!-- Password -->
            <input type="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">
            <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                At least 6 characters or digit
            </small>

            <!-- Sign up button -->
            <button class="btn btn-info my-4 btn-block" type="submit">Sign in</button>



            <hr>

            <!-- Terms of service -->
            <p>By clicking
                <em>Sign up</em> you agree to our
                <a href="" target="_blank">terms of service</a> and
                <a href="" target="_blank">terms of service</a>. </p>

        </form>
        <!-- Default form sign in -->
    </div>

</div>

<?php
include ROOT . '/public/views/layouts/footer.php'; ?>