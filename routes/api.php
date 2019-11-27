<?php

Route::get('clients', function ()
{
    return App\Client::where('type', '3')->orWhere('type', '2')->get(['business', 'id']);
});
