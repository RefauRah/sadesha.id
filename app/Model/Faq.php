<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faq';
    protected $primaryKey = 'id';
    protected $fillable = [        
        'question',
        'answer'
    ];
}
