<?php

namespace App\Http\Controllers;

use App\Models\_Aimer;
use App\Models\Aimer;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AimerController extends Controller
{
  public function index($id_article)
  {
    $existingAimer = Aimer::where('id_article', $id_article)
                          ->where('id', Auth::user()->id)
                          ->first();

    if (!$existingAimer) {
      $aimer = Aimer::create([
        'id_article' => $id_article,
        'id' => Auth::user()->id
      ]);
      event(new Registered($aimer));
    }else{
      Aimer::where('id', Auth::user()->id)
          ->where('id_article',$id_article)
          ->delete();
    }

    return redirect('/');
  }


    public function indexEvent(Request $request,$code,$id_user){
      try {
        $_aimer = _Aimer::create([
          'code' => $code,
          'id'=> $id_user
          ]);
        event(new Registered($_aimer));
      } catch (\Throwable $th) {
        _Aimer::where('code', $code)
          ->where('id', $id_user)
          ->delete();
      }
      return Redirect::to('/');
    }
}
