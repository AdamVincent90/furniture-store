<!-- Unique page content -->

<h6>Select staff member</h6>
<form method="post">
    <select name="staff_option">

        <?php $staff = new Staff();
        $staff_fetch = $staff->load_staff(); ?>

        <?php foreach ($staff_fetch as $staff) { ?>

            <option value="admin/amendstaff/<?= $staff['staff_id'] ?>">
                <?= $staff['firstname'] ?>
                <?= $staff['lastname'] ?>
            </option>

        <?php } ?>
    </select>
    <input type="submit" name="staff_select"/>
</form>


<!-- PHP logic which allows the user to select a stored staff member and load the their contents to html code below -->

<?php if (isset($_POST['staff_select'])) {
    header('location: /' . $_POST['staff_option'] . '');
}; ?>

<?php if (!empty($this->layout_data)) {
    $single_staff = new Staff;
    $staff_result = $single_staff->load_staff_details($this->layout_data);

    function invalid()
    {
        echo '<p>Invalid Username or Password</p>';
    }

    foreach ($staff_result as $row) { ?>

        <form method="post">
            <br><label>Staff ID</label>
            <input type="text" value="<?= $row['staff_id'] ?>" readonly/>
            <label>First Name</label>
            <input type="text" name="firstname" value="<?= $row['firstname'] ?>"/>
            <label>Last Name</label>
            <input type="text" name="lastname" value="<?= $row['lastname'] ?>"/>
            <label>Confirm Password</label>
            <input type="password" name="password"/>
            <input type="submit" name="amend_staff" value="Amend Staff Member"/>
            <input type="submit" name="delete_staff" value="Delete Staff Member"/>
        </form>

    <?php }
} ?>

<!-- php page logic which allows the deletion and amendment of staff -->

<?php if (isset($_POST['delete_staff'])) {
    $delete_user = new Staff();
    $delete_user->delete_staff($this->layout_data);
}

if (isset($_POST['amend_staff'])) {
    $record =
        ['staff_id' => $this->layout_data,
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname']
        ];
    $amend_user = new Staff();
    $amend_user->edit_staff_details($record);

}


