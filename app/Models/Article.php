<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;
    protected $dates = ['enabled_at'];
    protected $fillable = ['subject', 'content', 'cgy_id', 'enabled', 'enabled_at', 'sort', 'pic'];

    public function cgy()
    {
        return $this->belongsTo(Cgy::class); //屬於誰的關聯,設Cgy屬於Article的關聯
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class); //屬於誰的關聯,設Cgy屬於Article的關聯
    }
}
