<?php
include ROOT . '/public/views/layouts/header.php';
if (isset($errors)):
    foreach ($errors as $error):?>
        <p><?= $error; ?></p>
    <? endforeach;
endif; ?>

<div class="container">
    <div class="row">

        <?php foreach ($users as $user): ?>
            <!--Panel-->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card border-info mb-3 card-user  " >
                    <div class="card-header">
                        <img
                                class="avatar-list"
                                src="<?= (isset($user['image']) && $user['image']) ? $user['image'] : $empty_image; ?>"
                                alt="image">
                    </div>
                    <div class="card-body text-info">
                        <h5 class="card-title"><?= $user['first_name']; ?></h5>
                        <h5 class="card-title"><?= $user['last_name']; ?></h5>
                        <p class="card-text"><?= $user['description']; ?></p>
                        <? if($showEmail): ?>
                        <p><b>Contact email:</b> <?= $user['email']; ?></p>
                        <? endif; ?>
                    </div>
                    <? if(Auth::userId() === $user['id']):?>
                        <a class="btn btn-success btn-md" href="/user/edit">Edit profile</a>
                   <? endif; ?>
                </div>
            </div>

        <?php endforeach; ?>

    </div>
    <h1><?php echo $pagination->get(); ?></h1>
</div>

<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content ">
            <img class="modal-avatar-image" src="<?= $empty_image; ?>" alt="img">
        </div>
    </div>
</div>

<?php
include ROOT . '/public/views/layouts/footer.php'; ?>
