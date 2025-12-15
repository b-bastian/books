<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * Summary of fillable
     * @var list<string>
     */
    protected $fillable = ['isbn', 'title', 'pages'];
}
