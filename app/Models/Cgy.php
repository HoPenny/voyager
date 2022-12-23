<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cgy extends Model
{
    use HasFactory;
    protected $dates = ['enabled_at'];
    protected $fillable = ['cgy_id', 'title', 'desc', 'salary', 'enabled'];
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

}