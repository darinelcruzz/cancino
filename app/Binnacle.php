<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Binnacle extends Model
{
    protected $fillable = ['date', 'client_id', 'observations', 'reason', 'document', 'notes', 'amount', 'status', 'user_id'];

    function store()
    {
        return $this->belongsTo(Store::class);
    }

    function client()
    {
        return $this->belongsTo(Client::class);
    }
}
