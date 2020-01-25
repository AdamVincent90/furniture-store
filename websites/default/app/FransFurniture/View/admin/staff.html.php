<!-- Unique page content -->

<h6>All staff members</h6>
<nav>
    <ul>
        <li><a href="/admin/amendstaff"> Amend Staff Member</a></li>
        <li><a href="/admin/addstaff"> Add Staff Member</a></li>

    </ul>
</nav>
<table>

    <!-- PHP logic which loads all staff details of staff in table format, staff id's can be found on this page -->

    <?php $load_all_staff_details = new Staff();
    $all_staff = $load_all_staff_details->load_staff();

    foreach ($all_staff as $row) { ?>

        <tr>
            <td> First Name: <?= $row['firstname'] ?></td>
            <td> Last Name: <?= $row['lastname'] ?></td>
            <td> Log-in ID: <?= $row['staff_id'] ?></td>
        </tr>

    <?php } ?>

</table>
