<?php

Route::get('clients', function ()
{
    return App\Client::where('type', '4')->orWhere('type', '3')->get(['business', 'id']);
});
