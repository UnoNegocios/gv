<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

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

    public function sendPush(){
       return $response = Http::withHeaders([
            'Content-Type' => 'application/json; charset=utf-8',
            'Authorization' => 'Basic ZjQxZmY3ZmEtYTYxMC00YmQ1LTk3ZDctNGY3NWQ1OTVhMzM0'
        ])
        ->post('https://onesignal.com/api/v1/notifications', [
            'app_id' => 'c33062e7-5ed4-4481-885d-05756086d45f',
            'contents' => ['en' => $this->short_description],
            'headings' => ['en' => $this->title],
            'included_segments' => ['Subscribed Users'],
            'url' => 'https://gamavision.com/'. $this->slug,
        ]);
    }
}

