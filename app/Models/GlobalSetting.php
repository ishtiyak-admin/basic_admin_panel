<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class GlobalSetting extends Model
{
    protected $table    =   'global_settings';

    protected $fillable = [
        'label', 'slug', 'value', 'type', 'category', 'required', 'status', 'is_delete', 'created_at', 'updated_at'
    ];

}
