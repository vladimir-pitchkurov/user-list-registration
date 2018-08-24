<?php
include ROOT . '/public/views/layouts/header.php';
if (isset($errors)):
    foreach ($errors as $error):?>
        <p><?= $error; ?></p>
    <? endforeach;
endif; ?>
    <div class="registration-wrapper ">

        <div class="registration-window z-depth-3">
            <label class="h4 mt-1  tab active"><i class="fa fa-user-plus"></i>Registration</label>
            <label class="h4 tab"><i class="fa fa-sign-in"></i>Login</label>

            <form method="post" action="/user/register" class="text-center border border-light active tab-form p-5">

                <div class="form-row mb-4">
                    <div class="col">
                        <!-- First name -->
                        <input type="text" name="first_name" class="form-control" placeholder="First name" required>
                    </div>
                    <div class="col">
                        <!-- Last name -->
                        <input type="text" name="last_name" class="form-control" placeholder="Last name" required>
                    </div>
                </div>

                <!-- E-mail -->
                <input type="email" name="email" class="form-control mb-4" placeholder="E-mail" required>

                <!-- Password -->
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <small class="form-text text-muted mb-4">
                    At least 6 characters or digit
                </small>


                <textarea name="description" class="description" placeholder="description" required></textarea>


                <!-- Sign up button -->
                <button class="btn btn-info my-4 btn-block" type="submit">Sign in</button>


            </form>
            <!-- Default form register -->


            <form method="post" action="/user/login" name="sign-in"
                  class="text-center border border-light tab-form p-5 del">

                <!-- E-mail -->
                <input type="email" name="login-email" class="form-control mb-4" placeholder="E-mail" required>

                <!-- Password -->
                <input type="password" name="login-password" class="form-control" placeholder="Password" required>
                <small class="form-text text-muted mb-4">
                    At least 6 characters or digit
                </small>

                <!-- Sign up button -->
                <button class="btn btn-info my-4 btn-block" type="submit">Sign in</button>


            </form>
            <!-- Default form sign in -->
        </div>

    </div>

    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

<?php
include ROOT . '/public/views/layouts/footer.php'; ?>