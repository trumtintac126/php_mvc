<?php
$page = 'work';
require_once __DIR__ . '/components/header.php';
?>

    <div class="container">
        <div class="well">
            <h2>Edit a work</h2>
            <form id="work-form" class="form-horizontal" method="post" action="" autocomplete="off">
                <?php include __DIR__ . '/components/workForm.php' ?>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php
require_once __DIR__ . '/components/footer.php';