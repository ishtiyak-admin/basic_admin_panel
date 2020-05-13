<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $table    =   'enquiries';

    protected $fillable = [
        'name', 'email', 'message', 'replied', 'reply_message', 'attachment', 'status', 'is_delete', 'created_at', 'updated_at'
    ];

}
