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
            <div class="card border-info mb-3 card-user" style="max-width: 18rem;">
                <div class="card-header"><img
                            src="<?= (isset($user['image']) && $user['image']) ? $user['image'] : $empty_image; ?>"
                            alt="image" style="width: 100%;"></div>
                <div class="card-body text-info">
                    <h5 class="card-title"><?= $user['first_name']; ?></h5>
                    <h5 class="card-title"><?= $user['last_name']; ?></h5>
                    <p class="card-text"><?= $user['description']; ?></p>
                    <p><b>Contact:</b> <?= $user['email']; ?></p>
                </div>
            </div>

        <?php endforeach; ?>

    </div>
    <h1><?php echo $pagination->get(); ?></h1>
</div>


<?php
include ROOT . '/public/views/layouts/footer.php'; ?>
