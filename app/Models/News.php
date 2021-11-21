<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'text',
        'shop_id',
        'user_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
