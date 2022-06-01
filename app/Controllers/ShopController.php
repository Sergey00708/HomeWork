<?php

namespace Sergey\App\Controllers;

class ShopController
{
    public function show($anithing, $id)
    {
        echo 'ShopController show method'.'-'.$anithing. ' '. $id;
    }
}