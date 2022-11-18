<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // the guarded array is left empty for mass assignment protection
    protected $guarded = [];
    // removes timestamps
    public $timestamps = false;
    // protected $fillable - ['title', ]

    public function category()
        {
            return $this->belongsTo(Category::class);
        }
    
}
