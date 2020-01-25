<!-- Generic header content -->

<!-- PHP logic displays the correct title of the page -->

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/styles.css"/>
    <title>Fran's Furniture: <?php echo $this->layout_title; ?></title>
</head>
<body>
<header>
    <section>
        <aside>
            <h3>Opening Hours:</h3>
            <p>Mon-Fri: 09:00-17:30</p>
            <p>Sat: 09:00-17:00</p>
            <p>Sun: 10:00-16:00</p>
        </aside>
        <h1>Fran's Furniture</h1>

    </section>
</header>
<nav>
    <ul>
        <li><a href="/page/home" <?php echo($this->layout_name == 'home/home' ? 'class=active' : '') ?> >Home</a></li>
        <li><a href="/furniture/main" <?php echo($this->layout_name == 'furniture/main' ? 'class=active' : '') ?>>Our
                Furniture</a></li>
        <li><a href="/page/about" <?php echo($this->layout_name == 'home/about' ? 'class=active' : '') ?>>About Us</a>
        </li>
        <li><a href="/page/contact" <?php echo($this->layout_name == 'home/contact' ? 'class=active' : '') ?>>Contact
                us</a></li>
        <li><a href="/page/faq" <?php echo($this->layout_name == 'home/faq' ? 'class=active' : '') ?>>FAQ</a></li>
    </ul>
</nav>
<img src="/images/randombanner.php"/>
<main <?php echo(explode('/', $this->layout_name)[0] == 'home' ? 'class=home' : 'class=admin') ?>>






