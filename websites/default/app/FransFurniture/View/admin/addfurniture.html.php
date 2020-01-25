<?php

// Loads all category options before the web-page displays to the user

$load_categories = new Category();
$all_categories = $load_categories->load_categories(); ?>

    <!-- Unique page content -->

    <h6>Add Furniture</h6>
    <form method="POST" enctype="multipart/form-data">
        <label>Name</label>
        <input type="text" name="name"/>
        <label>Description</label>
        <textarea style="width: 48%;" name="description"></textarea>
        <label>Price</label>
        <input type="text" name="price"/>
        <label>Condition New/Second-Hand </label>
        <input type="text" name="cond"/>
        <label>Category</label>
        <select name="categoryId">
            <?php foreach ($all_categories as $row) { ?>
                <option value="<?= $row['id'] ?>"><?= $row['name'] ?>
                </option>
            <?php  } ?>
        </select>
        <label>Image</label>
        <input type="file" name="image[]" multiple=""/>
        <input type="submit" name="submit" value="Add"/>
    </form>

    <!-- Submits furniture to database php logic -->

<?php if (isset($_POST['submit'])) {
    $record =
        [
            'name' => $_POST['name'],
            'description' => $_POST['description'],
            'price' => $_POST['price'],
            'categoryId' => $_POST['categoryId'],
            'cond' => $_POST['cond']
        ];

    $add_furniture = new Furniture();
    $add_furniture->amend_furniture($record);
    $fileName = $add_furniture->load->lastInsertId();

    if (!file_exists('images/furniture/' . $fileName)) {
        mkdir('images/furniture/' . $fileName, '0777', true);
    }

    for ($count = 0; $count < count($_FILES['image']['tmp_name']); $count++) {
        move_uploaded_file($_FILES['image']['tmp_name'][$count], 'images/furniture/' . $fileName . '/' . $count . '.jpg');
    }

    header('location: /admin/furniture');
}