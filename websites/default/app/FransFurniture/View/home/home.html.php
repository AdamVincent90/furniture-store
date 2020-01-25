<!-- Unique page content -->

<h1>Welcome to Fran's Furniture</h1>

<!-- PHP logic which allows to display all banner messages onto the home page -->

<?php

$home_page = new Banner();
$updates = $home_page->load_updates();


foreach ($updates as $row) {
    $formatted_date = date('d-m-Y', strtotime($row['banner_date'])); ?>

    <ul class="furniture">
    <li>
        <?php if (file_exists('images/message/' . $row['banner_id'] . '.jpg')) { ?>
            <a href="images/message/<?= $row['banner_id'] ?>.jpg">
                <img src="/images/message/<?= $row['banner_id'] ?>.jpg" alt="No Image Available"/></a>
        <?php } ?>
        <div class="details">
            <h2><?= $row['banner_title'] ?></h2>
            <h3><?= $formatted_date ?></h3>
            <p><?= $row['banner_description'] ?></p>
            <h4>By <?= $row['staff_name'] ?></h4>
        </div>
    </li>

<?php } ?>