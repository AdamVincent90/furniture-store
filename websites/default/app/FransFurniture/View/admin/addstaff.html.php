<!-- Unique page content -->

<h6>Add New Staff Member</h6>
<form method="post">
    <label>First Name</label>
    <input type="text" name="firstname"/>
    <label>Last Name</label>
    <input type="text" name="lastname"/>
    <label>Password</label>
    <input type="password" name="password"/>
    <label>Confirm Password</label>
    <input type="password" name="confirm_password"/>
    <input type="submit" name="add_staff"/>
</form>

<!-- add staff to the database php logic -->

<?php if (isset($_POST['add_staff'])) {
    $record =
        [
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'password' => $_POST['password']
        ];

    $new_staff = new Staff();
    $new_staff->add_staff($record);
    header('location: /admin/staff');
}