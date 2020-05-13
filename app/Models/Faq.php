<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table    =   'faqs';

    protected $fillable = [
        'question', 'answer', 'status', 'is_delete', 'created_at', 'updated_at'
    ];

}
