<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'book';
    protected $fillable = ['isbn', 'title', 'author', 'publish_year', 'description', 'cover', 'category_id'];
    protected $primaryKey = 'isbn';
    protected $keyType = 'string';

    public $incrementing = false;
    //

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
