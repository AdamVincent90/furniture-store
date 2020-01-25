<!-- Unique page content -->

<!-- PHP logic loads all uncompleted queries and displays them to the user in table format -->

<?php

$load_queries = new Query();
$customer_queries = $load_queries->load_query(); ?>
<h6>Enquiries from Customers</h6>
<nav class="navadmin">
    <ul>
        <li><a href="/admin/archive"> Completed Queries</a></li>
    </ul>
</nav>
<form method="post">

    <?php

    if (!empty($customer_queries)) {
        foreach ($customer_queries as $row) {
            $formatted_date = date('d-m-Y', strtotime($row['date'])); ?>

            <table class="queryTable">
                <tr>
                    <th>Customer Name</th>
                    <th>Customer Contact</th>
                    <th>Date Of Enquiry</th>
                    <th>Customer Enquiry</th>
                </tr>
                <td><?= $row['customer_name'] ?></td>
                <td><?= $row['customer_contact'] ?></td>
                <td><?= $formatted_date ?></td>
                <td><?= $row['customer_query'] ?></td>
                <input class="customer" type="submit" name="<?= $row['query_id'] ?>" value="Complete query"/>
            </table>


            <?php if (isset($_POST[$row['query_id']])) {
                $update_query =
                    [
                        'query_id' => $row['query_id'],
                        'complete' => 'yes',
                        'staff_name' => $_SESSION['loggedin']
                    ];

                $alter_query = new Query();
                $alter_query->alter_query($update_query);
                header('location: /admin/home');
            }

        }
    } ?>

</form>



