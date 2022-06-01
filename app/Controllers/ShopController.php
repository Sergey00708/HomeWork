<?php

namespace Sergey\App\Controllers;

class ShopController
{
    public function show(string $anithing, string $id)
    {
        echo 'ShopController show method'.'-'.$anithing. ' '. $id;
    }
}