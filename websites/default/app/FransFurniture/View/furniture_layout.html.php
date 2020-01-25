<!-- Generic furniture(public) content -->

<!-- PHP logic displays all current categories stored in the database and is updated upon a new category added -->

<section class="left">
    <ul>
        <li><a href="/furniture/main">All Furniture</a></li>

        <?php

        $loadCats = new Category();
        $fetch = $loadCats->load_categories();

        foreach ($fetch as $row) { ?>

            <li><a href="/furniture/category/<?= $row['id'] ?>">All <?= $row['name'] ?></a></li>
            <li class="small-font"><a href="/furniture/condition/<?= $row['id'] ?>/new">- New <?= $row['name'] ?></a>
            </li>
            <li class="small-font"><a href="/furniture/condition/<?= $row['id'] ?>/second-hand">- Second-Hand
                    <?= $row['name'] ?></a></li>
        <?php } ?>

    </ul>
</section>
<section class="right">
    <h1>Products</h1>
    <ul class="furniture cart">

        <?php

        foreach ($this->layout_data as $furniture)
        {
        if ($furniture['archive'] == 'no')
        {
        if (file_exists('images/furniture/' . $furniture['id']))
        { ?>

        <li class="image">
            <h2><?= $furniture['name'] ?> Pictures</h2>

            <?php for ($count = 0; $count < count(glob('images/furniture/' . $furniture['id'] . '/*.jpg')); $count++) { ?>

                <a href="/images/furniture/<?= $furniture['id'] ?>/<?= $count ?>.jpg">
                    <img style="border: 1px solid black; height: 150px;"
                         src="/images/furniture/<?= $furniture['id'] ?>/<?= $count ?>.jpg"
                         alt="Image Coming Soon"/></a> <?php } ?></li>
        <h6><?= $furniture['name'] ?></h6>
        <h4>£<?= $furniture['price'] ?></h4>
        <h4><?= $furniture['description'] ?></h4>
        <h4>Condition: <?= $furniture['cond'];
            }
            }
            } ?></h4>
    </ul>


