<!-- Unique page content -->

<h6>Completed queries</h6>

<!-- PHP logic which allows to load all completed query and to display to the user in table format -->

<?php

$load_completed_queries = new Query();
$completed_tasks = $load_completed_queries->load_archives();

if (!empty($completed_tasks)) {
    foreach ($completed_tasks as $row) {
        $formatted_date = date('d-m-Y', strtotime($row['date'])); ?>

        <table>
            <tr>
                <th>Customer Name</th>
                <th>Customer Contact</th>
                <th>Date Of Enquiry</th>
                <th>Customer Enquiry</th>
                <th>Completed By</th>
            </tr>
            <td><?= $row['customer_name'] ?></td>
            <td><?= $row['customer_contact'] ?></td>
            <td><?= $formatted_date ?></td>
            <td><?= $row['customer_query'] ?></td>
            <td><?= $row['staff_name'] ?></td>
        </table>

    <?php }
} ?>