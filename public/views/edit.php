<?php include ROOT . '/public/views/layouts/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-10 edit-user-wpapper z-depth-5">

            <div class="image-card align-content-center">
                <image src="<?php echo $user['image'] ?: $empty_image; ?>" class="avatar-edit-card"></image>
            </div>

            <form action="/user/update-image" method="post" enctype="multipart/form-data">
                <div class=" file-download">
                    <input type='file' class="btn btn-cyan btn-md " name="image" onchange="readURL(this);">
                    <img id="blah" class="avatar-preview " src="#" alt=""/>
                    <input class=" btn btn-cyan btn-md " type="submit" value="Изменить аватар"/>
                </div>
            </form>

            <form method="post" action="/user/update" class="text-center border border-light active tab-form p-5">

                <div class="form-row mb-4">
                    <div class="col">
                        <input type="text" name="first_name" class="form-control" placeholder="First name"
                               value="<?php echo $user['first_name']; ?>" required>
                    </div>
                    <div class="col">
                        <input type="text" name="last_name" class="form-control" placeholder="Last name"
                               value="<?php echo $user['last_name']; ?>" required>
                    </div>
                </div>

                <textarea name="description" class="description form-control"
                          required><?php echo $user['description']; ?></textarea>

                <button class="btn btn-info my-4 btn-block " type="submit">Save changes</button>
            </form>

            <?php if (Config::get('isOpenListForGuests')
                || Auth::userId()) echo '<a class="btn btn-success btn-md" href="/users">Go to User-List</a>';
            ?>

        </div>
    </div>
</div>

<?php include ROOT . '/public/views/layouts/footer.php'; ?>
