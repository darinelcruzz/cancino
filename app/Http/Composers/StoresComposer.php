<?php

namespace App\Http\Composers;

use Illuminate\View\View;
use App\{Store};

class StoresComposer
{

    function compose(View $view)
    {
        $view->storesArray = Store::where('type', '!=', 'c')->pluck('name', 'id')->toArray();
        $view->allStoresArray = Store::pluck('name', 'id')->toArray();

    }
}
