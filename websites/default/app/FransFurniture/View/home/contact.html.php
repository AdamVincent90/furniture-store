<!-- Unique page content -->

<p xmlns="http://www.w3.org/1999/html">Please call us on 01604 90345 or email
    <a href="mailto:enquiries@fransfurniture.co.uk">enquiries@fransfurniture.co.uk</a>

<h2>Or contact us through our query service</h2>
<p>Estimated response time: 2-4 days</p>

<form method="post">
    <label>Your full name</label>
    <input type="text" name="full-name"/>
    <label>Your email address</label>
    <input type="text" name="email-address"/>
    <label>Your query</label>
    <textarea style="width: 48%;" name="customer-query">Enter your query here</textarea>
    <input type="submit" value="Send Query" name="submit-query"/>
</form>

<!-- PHP logic which allows a customer to send a query for the staff and to be displayed within the admin area-->

<?php if (isset($_POST['submit-query'])) {
    $datetime = date_create()->format('Y-m-d H:i:s');
    $query_record =
        [
            'customer_name' => $_POST['full-name'],
            'customer_contact' => $_POST['email-address'],
            'customer_query' => $_POST['customer-query'],
            'date' => $datetime,
            'complete' => 'no',
        ];

    $send_query = new Query();
    $send_query->add_query($query_record); ?>

    <script> alert("Your query submitted, Fran's furniture will contact you") </script>


<?php } ?>