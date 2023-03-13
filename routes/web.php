<?php

use App\Http\Controllers\ApiManager;
use App\Http\Controllers\createShortLink;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\deviceCheck;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\Lead;
use App\Models\Lead2;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use AshAllenDesign\ShortURL\Controllers\ShortURLController;
use AshAllenDesign\ShortURL\Models\ShortURL;
use Illuminate\Support\Facades\URL;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
$LARAVEL_HTTP_HOST = explode('//',URL::to('/'))[1];
$app_url =  explode('//',config("app.url"))[1];
if ($LARAVEL_HTTP_HOST === $app_url) {
    Route::get('test',[deviceCheck::class,'index']);
    Route::get('test2',function(){
        for($i=0;$i<20;$i++){
            Lead::create([
                'name'=> 'lead'.$i,
                'phone'=>$i,
                'compain_user_id'=>'1',
                'ip'=>'154.180.1.'.$i
            ]);
            Lead2::create([
                'name'=> 'lead'.$i,
                'phone'=>$i,
                'compain_user_id'=>'1',
                'ip'=>'185.16.38.'.$i
            ]);

            // return 'done';
        }
    
    });
    Route::get('deleteleads',[LeadController::class,'deleteleads']);


    Auth::routes(['register' => false]);

    Route::middleware('adminAccess')->group(function(){
        Route::get('register', [RegisterController::class,'showRegistrationForm'])->name('register');
        Route::post('register', [RegisterController::class,'register']);
    });
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('myleads',[LeadController::class,'index']);

    Route::get('/home/{compain_id?}', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('form/{shortURLKey}',function($shortURLKey){

        $shortURLKey = $shortURLKey;
        $url =ShortURL::where('url_key',$shortURLKey)->first();
        $details = ShortURL::where('url_key',$shortURLKey)->first();
        switch($details->compain_id){
            case 4 :
                return view('formpage',get_defined_vars());
            case 5 :
                return view('formpage2',get_defined_vars());
            case 6 :
                return view('formpage3',get_defined_vars());
        }
    })->middleware('IsForm');
    Route::get('/clientdashboard', function(){return view('clientdashboard');})->middleware('auth');
    Route::get('report',[ReportController::class,'index']);
    Route::get('/{shortURLKey}', ShortURLController::class);

    Route::get(config('short-url.prefix').'/{shortURLKey}', function($shortURLKey){
        $details = ShortURL::findByKey($shortURLKey);
        $Campaign_id = ApiManager::getCampaignId($details->compain_id,$details->user_id);
        if($details->compain_id ==4 |$details->compain_id ==5|$details->compain_id ==6){
            $shortURLKey =ShortURL::where('user_id',$details->user_id)->where('compain_id',$details->compain_id)->get()->last();
            ApiManager::ChangeCampaignLink($Campaign_id,url('form/'.$shortURLKey->url_key));
            $url = ApiManager::getCampaignLink($Campaign_id);
            return view('loading',['url'=>$url,'url2'=>$details->destination_url]);
        }
    else{
        $shortURLKey = ShortURL::where('user_id',$details->user_id)->where('compain_id',$details->compain_id)->get()->last();
        ApiManager::ChangeCampaignLink($Campaign_id,url("redirectpage/".$shortURLKey->url_key));
        $url = ApiManager::getCampaignLink($Campaign_id);
        return view('loading',['url'=>$url,'url2'=>$shortURLKey->url_key]);
    }
    });

    Route::get('redirectpage/{shortURLKey}', function($shortURLKey){
        return view('redirectpage',['url'=>$shortURLKey]);
    });


    Route::post('makeshortlink',[createShortLink::class,'index']);
    Route::post('addlead',[LeadController::class,'create']);
}else{
    Route::get('form/{shortURLKey}',function($shortURLKey){

        $shortURLKey = $shortURLKey;
        $url =ShortURL::where('url_key',$shortURLKey)->first();
        $details = ShortURL::where('url_key',$shortURLKey)->first();
        switch($details->compain_id){
            case 4 :
                return view('formpage',get_defined_vars());
            case 5 :
                return view('formpage2',get_defined_vars());
            case 6 :
                return view('formpage3',get_defined_vars());
        }
    })->middleware('IsForm');
    Route::get('/{shortURLKey}', ShortURLController::class);

    Route::get(config('short-url.prefix').'/{shortURLKey}', function($shortURLKey){
        $details = ShortURL::findByKey($shortURLKey);
        $Campaign_id = ApiManager::getCampaignId($details->compain_id,$details->user_id);
        if($details->compain_id ==4 |$details->compain_id ==5|$details->compain_id ==6){
            $shortURLKey =ShortURL::where('user_id',$details->user_id)->where('compain_id',$details->compain_id)->get()->last();
            ApiManager::ChangeCampaignLink($Campaign_id,url('form/'.$shortURLKey->url_key));
            $url = ApiManager::getCampaignLink($Campaign_id);
            return view('loading',['url'=>$url,'url2'=>$details->destination_url]);
        }else{
            $shortURLKey = ShortURL::where('user_id',$details->user_id)->where('compain_id',$details->compain_id)->get()->last();
            ApiManager::ChangeCampaignLink($Campaign_id,url("redirectpage/".$shortURLKey->url_key));
            $url = ApiManager::getCampaignLink($Campaign_id);
            return view('loading',['url'=>$url,'url2'=>$shortURLKey->url_key]);
        }
    });

    Route::get('redirectpage/{shortURLKey}', function($shortURLKey){
        return view('redirectpage',['url'=>$shortURLKey]);
    });
}


//URL::forceScheme('https');



