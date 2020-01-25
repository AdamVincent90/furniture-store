<!-- Unique page content -->

<h6>Archived Furniture</h6>
<table>
    <thead>
    <tr>
        <th>Product Name</th>
        <th style="width: 20%">Price</th>
        <th></th>
    </tr>

    <!-- PHP logic which loads all archived furniture to be displayed to the user -->

    <?php

    $archived_furniture = new Furniture();
    $result = $archived_furniture->edit_furniture('archive', 'yes');

    if (!empty($result)) {
        foreach ($result as $row) { ?>

            <tr>
                <td><?= $row['name'] ?></td>
                <td><?= $row['price'] ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>"/>
                        <input type="submit" name="submit" value="Un-Archive"/>
                    </form>
                </td>
            </tr>

        <?php }
    } ?>


    </thead>
</table>

<?php if (isset($_POST['submit'])) {
    $record =
        [
            'id' => $_POST['id'],
            'archive' => 'no'
        ];

    $unarchive_furniture = new Furniture();
    $unarchive_furniture->amend_furniture($record);
    header('location: /admin/furniture');
}