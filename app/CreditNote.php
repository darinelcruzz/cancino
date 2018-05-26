<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditNote extends Model
{
    protected $fillable = ['store_id', 'folio', 'amount', 'date_nc',
    'items', 'observations', 'document', 'date_pos', 'status', 'user_id'];
}
