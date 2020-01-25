<!-- Unique page content -->

<h6>Add Category</h6>

<form method="POST">
    <label>Name</label>
    <input type="text" name="name"/>
    <input type="submit" name="add_category">
</form>

<!-- Add category to the database php logic -->

<?php if (isset($_POST['add_category'])) {
    $record =
        [
            'name' => $_POST['name'],
        ];

    $new_category = new Category();
    $new_category->amend_category($record);
}
