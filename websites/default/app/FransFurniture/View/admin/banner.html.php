<!-- Unique page content -->

<h6>Add a notice to the home-page</h6>
<form method="post" enctype="multipart/form-data">
    <label>Banner Title</label>
    <input type="text" name="banner_title"/>
    <label>Banner Description</label>
    <textarea style="width: 48%;" name="banner-description" type="text" name="lastname">Enter Description</textarea>
    <label>Add Image</label>
    <input type="file" name="banner_image" multiple/>
    <label>Confirm Password</label>
    <input type="password" name="confirm_password"/>
    <input type="submit" name="submit-banner"/>
</form>

<!-- PHP logic which allows the user to add a new banner to be displayed on the home-page of the website -->

<?php if (isset($_POST['submit-banner'])) {
    $datetime = date_create()->format('Y-m-d H:i:s');
    $banner_record =
        [
            'banner_title' => $_POST['banner_title'],
            'banner_description' => $_POST['banner-description'],
            'banner_date' => $datetime,
            'staff_name' => $_SESSION['loggedin']
        ];

    $add_notice = new Banner();
    $add_notice->add_notice($banner_record);

    if ($_FILES['banner_image']['error'] == 0) {
        $fileName = $add_notice->load->lastInsertId();
        move_uploaded_file($_FILES['banner_image']['tmp_name'], 'images/message/' . $fileName . '.jpg');
    }


} ?>