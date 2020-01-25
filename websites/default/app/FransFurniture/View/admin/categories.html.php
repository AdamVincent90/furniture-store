<!-- Unique page content -->

<h6>Categories</h6>
<nav>
    <ul>
        <a class="new" href="/admin/addcategory">Add new category</a>
    </ul>
</nav>
<table>
    <thead>
    <tr>
        <th>Name</th>
        <th style="width: 5%">&nbsp;</th>
        <th style="width: 5%">&nbsp;</th>
    </tr>

    <!-- PHP logic which is used to retrieve all categories from the database to be displayed to the user -->

    <?php

    $display_category = new Category();
    $categories = $display_category->load_categories();

    foreach ($categories as $category) { ?>
        <tr>
            <td><?= $category['name'] ?></td>
            <td><a style="float: right" href="/admin/categories/<?= $category['id'] ?>">Edit</a></td>
            <td>
                <form method="post">
                    <input type="hidden" name="id" value="<?= $category['id'] ?>"/>
                    <input type="submit" name="delete_category" value="Delete"/>
                </form>
            </td>
        </tr>
        <?php if (isset($_POST['delete_category'])) {
            $delete_category = new Category();
            $delete_category->delete_category($_POST['id']);
            header('location: /admin/categories');
        }
    } ?>

    </thead>
</table>

<?php

if (!empty($this->layout_data)) {
    $load_category = new Category();
    $category = $load_category->load_category_details($this->layout_data);

    foreach ($category as $row) { ?>

        <form method="post">
            <label>Category Name</label>
            <input type="text" name="category_name" value="<?= $row['name'] ?>"/>
            <input type="submit" name="amend_category" value="Amend Category"/>
        </form>

    <?php }
} ?>

<?php if (isset($_POST['amend_category'])) {
    $category_record =
        [
            'id' => $this->layout_data,
            'name' => $_POST['category_name']
        ];

    $amend_category = new Category();
    $amend_category->amend_category($category_record);

}




