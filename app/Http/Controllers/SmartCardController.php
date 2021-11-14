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
            
            return response()->json('Verification Failed, Check Inputs');
        } else {
          // User exists
          
          return redirect()->route('smartcard')->with('message', 'Logged in!');;
        }
    }
}
