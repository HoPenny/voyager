<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $dates = ['enabled_at'];
    protected $fillable = ['subject', 'content', 'cgy_id', 'enabled', 'enabled_at', 'sort', 'pic'];

    public function articles()
    {
        return $this->belongsToMany(Article::class); //屬於誰的關聯,設Cgy屬於Article的關聯
    }
}