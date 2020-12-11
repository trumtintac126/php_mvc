<?php
$page = 'work';
require_once __DIR__ . '/components/header.php';
?>

    <div class="container">
        <h2>Management Your Work</h2>

        <div class="clearfix">
            <a href="/work/add" class="btn btn-primary pull-right" role="button">Add new work</a>
        </div>

        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>WorkName</th>
                <th>Start-Date</th>
                <th>End-Date</th>
                <th>Status</th>
                <th class="center-align">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data as $work) {
                include __DIR__ . '/components/workRecord.php';
            } ?>
            </tbody>
        </table>
    </div>

<?php require_once __DIR__ . '/components/footer.php'; ?>
