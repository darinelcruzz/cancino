<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shopping extends Model
{
    protected $fillable = ['folio', 'date', 'amount', 'type', 'reference', 'store_id', 'status', 'user_id'];

    function store()
    {
        return $this->belongsTo(Store::class);
    }
}
