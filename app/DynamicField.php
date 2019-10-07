<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DynamicField extends Model
{
    //
    protected $table = 'dynamic_fields';
    protected $fillable = [
        'nama', 'username','password','email','telefon','posisi'
    ];
}
