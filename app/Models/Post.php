<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Carbon;

class Post extends Model
{
    use \Staudenmeir\EloquentJsonRelations\HasJsonRelationships;
    use HasFactory;

    protected $fillable =[
        'title',
        'status',
        'content',
        'featured_media_path',
        'categories',
        'tags',
        'author_id',
        'visibility',
        'short_description',
        'slug'
    ];

    protected $casts =[
        'categories' => 'array',
        'tags' => 'array',
        'visibility' => 'array'
    ];

    public function Categories()
    {
        return $this->belongsToJson(Category::class, 'categories');
    }

    public function Tags()
    {
        return $this->belongsToJson(Tag::class, 'tags->[]');
    }

    public function author(){
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getDate(){
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $fecha = Carbon::parse($this->created_at);
        $mes = $meses[($fecha->format('n')) - 1];
        return $inputs['Fecha'] = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');
    }
}

