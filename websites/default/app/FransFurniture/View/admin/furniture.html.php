<!-- Unique page content -->

<h6>Furniture Management</h6>
<nav>
    <ul>
        <li><a class="new" href="/admin/addfurniture">Add new furniture</a></li>
        <li><a class="new" href="/admin/furniturearchive">Archived furniture</a></li>
    </ul>
</nav>
<table>
    <thead>
    <tr>
        <th>Name</th>
        <th style="width: 10%">Price</th>
        <th style="width: 5%">&nbsp;</th>
        <th style="width: 5%">&nbsp;</th>
    </tr>


    <?php $furniture_list = new Furniture();
    $all_furniture = $furniture_list->load_categories();

    foreach ($all_furniture as $row) {
        if ($row['archive'] == 'no') { ?>
            <tr>
                <td><?= $row['name'] ?></td>
                <td><?= $row['price'] ?></td>
                <td><a style="float: right" href="/admin/furniture/<?= $row['id'] ?>">Edit/Archive</a></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>"/>
                        <input type="submit" name="delete" value="Delete"/>
                    </form>
                </td>
            </tr>
        <?php }
    } ?>

    </thead>
</table>

<?php if (!empty($this->layout_data)) {
    $load_furniture = new Furniture();
    $furniture_result = $load_furniture->edit_furniture('id', $this->layout_data);

    foreach ($furniture_result as $row) { ?>

        <form method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
            <label>Name</label>
            <input type="text" name="name" value="<?php echo $row['name']; ?>"/>
            <label>Price</label>
            <input type="text" name="price" value="<?php echo $row['price']; ?>"/>
            <label>Condition (new/second-hand)</label>
            <input type="text" name="condition" value="<?php echo $row['cond']; ?>"/>
            <label>Description</label>
            <textarea style="width: 48%;" name="description"><?php echo $row['description']; ?></textarea>
            <input type="submit" name="edit_furniture" value="Edit Furniture details">
            <input type="submit" name="archive_furniture" value="Archive this furniture">
        </form>
    <?php }
} ?>

<?php if (isset($_POST['archive_furniture'])) {
    $record =
        [
            'id' => $this->layout_data,
            'archive' => 'yes'
        ];

    $edit_furniture = new Furniture();
    $edit_furniture->amend_furniture($record);
} ?>

<?php if (isset($_POST['edit_furniture'])) {
    $record =
        [
            'id' => $this->layout_data,
            'name' => $_POST['name'],
            'description' => $_POST['description'],
            'price' => $_POST['price'],
            'cond' => $_POST['condition']
        ];

    $edit_furniture = new Furniture();
    $edit_furniture->amend_furniture($record);
} ?>

<?php if (isset($_POST['delete'])) {
    $delete_furniture = new Furniture();
    $delete_furniture->delete_furniture($_POST['id']);
}