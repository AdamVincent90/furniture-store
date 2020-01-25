<!-- Unique page content -->

<!-- Log-in Area logic allows the staff member to enter his details to access the admin area of the website. -->

<?php

session_start();

if (isset($_SESSION['loggedin'])) {
    header('location: /admin/home');
}

?>

    <h6>Log in portal</h6>
    <form action="dashboard" method="post">
        <label>Enter Username</label>
        <input type="text" name="username"/>
        <label>Enter Password</label>
        <input type="password" name="pass"/>
        <input type="submit" name="submit" value="Log In"/>
    </form>

<?php

if (isset($_POST['submit'])) {
    $sign_in = new LogIn();
    $sign_in->verify();
}


