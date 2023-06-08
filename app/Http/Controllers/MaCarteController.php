<?php

namespace App\Http\Controllers;

use QrCode;

class MaCarteController extends Controller
{
    public function index(){
      
      $data ='https://www.netflix.com/fr/';
      $qrCode = QrCode::size(200)->generate($data);
      // dd($qrCode);

      return view('MaCarte', compact('qrCode'));
    }
}
