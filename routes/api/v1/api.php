<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Http\Resources\post\PostResource;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/perro', function (Request $request) {
   return  Storage::move('hodor/public/files/1659110431.jpeg', 'hodor/public/filesnewfile-name.jpg'); 
});

Route::get('/gato', function (Request $request) {

    $companies = Post::get()->each(function ($post){
        $post->update(['slug' =>  Str::slug($post->title)]);
    });
    return 'okk';
});

//Auth
Route::prefix('/user')->group( function() {

    //Login
    Route::post('/login', 'api\v1\auth\LoginUser');

    //Current User
    Route::middleware('auth:api')->get('/current', 'api\v1\auth\CurrentUser');

    //Register User
    Route::post('/register', 'api\v1\auth\RegisterController');
});

//Users
Route::middleware('auth:api')->group(function() {
    Route::apiResource('users', 'api\v1\user\UserController');
    Route::patch('user/password', 'api\v1\user\UserController@password');

});

//Origins
Route::middleware('auth:api')->group(function() {
    Route::apiResource('/origins', 'api\v1\origin\OriginController');
});

//App Sessions
Route::middleware('auth:api')->group(function() {
    Route::apiResource('/app_sessions', 'api\v1\app_session\AppSessionController');
});

//Segments
Route::middleware('auth:api')->group(function() {
    Route::apiResource('/segments', 'api\v1\segment\SegmentController');
});

//Ad Campaigns
Route::middleware('auth:api')->group(function() {
    Route::apiResource('/ad_campaigns', 'api\v1\ad_campaign\AdCampaignController');
    Route::get('adCampaigns/{adCampaign}/displayAds', 'api\v1\ad_campaign\AdCampaignController@ads');
});

//Ads
Route::middleware('auth:api')->group(function() {
    Route::apiResource('/ads', 'api\v1\ad\AdController');
    Route::post('/ad/files','api\v1\ad\AdController@files');
});
   

Route::get('/display_ad','api\v1\ad\GenerateAd');
Route::get('/click_ad/{ad}','api\v1\ad\AdController@clickAd');

//Clients
Route::middleware('auth:api')->group(function() {
    Route::apiResource('/clients', 'api\v1\client\ClientController');
});

//Podcast Series
    Route::apiResource('/podcast_serie', 'api\v1\podcast_serie\PodcastSerieController');

Route::post('podcast_serie/files','api\v1\podcast_serie\PodcastSerieController@files');

//Podcasts

    Route::apiResource('/podcasts', 'api\v1\podcast\PodcastController');


//States

    Route::get('/states', 'api\v1\state\StateController@index');

//Cities
    Route::get('/cities', 'api\v1\city\CityController@index');
    Route::get('city/search', 'api\v1\city\CityController@search');

//Lives
    Route::apiResource('/live', 'api\v1\live\LiveController');

Route::post('/live/files','api\v1\live\LiveController@files');


//Blogs
Route::middleware('auth:api')->group(function() {
    Route::apiResource('/blogs', 'api\v1\blog\BlogController');

});

//News
Route::get('/news', 'api\v1\post\PostController@index');
Route::get('/news/categories', 'api\v1\category\CategoryController@index');

//Posts
Route::middleware('auth:api')->group(function() {
    Route::apiResource('/posts', 'api\v1\post\PostController');
    Route::post('post/image', 'api\v1\post\PostController@image');
});

//Categories
Route::middleware('auth:api')->group(function() {
    Route::apiResource('/categories', 'api\v1\category\CategoryController');
});