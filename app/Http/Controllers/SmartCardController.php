<?php

namespace App\Http\Controllers;
use App\Models\SmartCard;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SmartCardController extends Controller
{
    public function index(Request $request) {

        
    }
    public function store(Request $request) {

        $users = SmartCard::where('cardnumber', '=', $request->input('cardnumber'))->first();
        if ($users === null) {
            
            return response()->json('Not there');
        } else {
          // User exists
          return redirect()->route('smartcard');
        }
    }
}