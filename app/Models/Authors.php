<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    /**
     * Summary of fillable
     * @var list<string>
     */
    protected $fillable = ['isbn', 'title', 'pages'];
}
