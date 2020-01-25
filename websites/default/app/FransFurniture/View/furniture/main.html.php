<!-- Unique page content -->

<!-- logic checks stock of the filtered items, displays no current stock if no stock is in the database/and or archived-->

<?php

$check = new Furniture();
$check->check_stock($this->layout_data);