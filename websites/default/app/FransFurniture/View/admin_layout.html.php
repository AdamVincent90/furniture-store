<!-- Generic admin page content -->

<!-- Logic loads all available admin related functions to use only within the admin area of the website -->

<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
    header('location: /login/dashboard');
} ?>

    <section class="left" style="text-align: center">
        <form method="post">
            <button type="submit" name="end_session">log out</button>

        </form>
        <p style="color: white; margin-bottom: 40%">Hello <?= $_SESSION['loggedin'] ?></p>
        <ul>
            <li><a href="/admin/home">Customer Enquiries</a></li>
            <li><a href="/admin/banner">Add Announcement</a></li>
            <li><a href="/admin/staff">Manage Staff</a></li>
            <li><a href="/admin/categories">Manage Categories</a></li>
            <li><a href="/admin/furniture">Manage Furniture</a></li>
        </ul>
    </section>


<?php if (isset($_POST['end_session'])) {
    session_destroy();
    header('location: /login/dashboard/');
}