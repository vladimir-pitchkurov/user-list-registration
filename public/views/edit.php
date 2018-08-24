<?php
include ROOT . '/public/views/layouts/header.php';
if (isset($errors)):
    foreach ($errors as $error):?>
        <p><?= $error; ?></p>
    <? endforeach;
endif; ?>

<div class="container edit-user-wpapper z-depth-5">

    <div class="image-card align-content-center">
        <image src="<?= $user['image'] ?: $empty_image; ?>" class="avatar-edit-card"></image>
    </div>
    <form action="/user/update-image" method="post" enctype="multipart/form-data">

        <div class="col file-download">
            <input type='file' class="btn btn-cyan btn-md " name="image" onchange="readURL(this);">
            <img id="blah" class="avatar-preview " src="#" alt=""/>
            <input class=" btn btn-cyan btn-md " type="submit" value="Изменить аватар"/>
        </div>


    </form>

    <form method="post" action="/user/update" class="text-center border border-light active tab-form p-5">

        <div class="form-row mb-4">
            <div class="col">
                <!-- First name -->
                <input type="text" name="first_name" class="form-control" placeholder="First name"
                       value="<?= $user['first_name']; ?>" required>
            </div>
            <div class="col">
                <!-- Last name -->
                <input type="text" name="last_name" class="form-control" placeholder="Last name"
                       value="<?= $user['last_name']; ?>" required>
            </div>
        </div>


        <textarea name="description" class="description form-control" required><?= $user['description']; ?></textarea>


        <!-- Sign up button -->
        <button class="btn btn-info my-4 btn-block " type="submit">Sign in</button>


    </form>

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
