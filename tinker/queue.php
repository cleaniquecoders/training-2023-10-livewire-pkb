<?php

use App\Jobs\TakeOrder;

$orders = [];
for ($i=0; $i < 50; $i++) {
    $orders[] = "Burger #$i";
}

TakeOrder::dispatch($orders);

exit;
