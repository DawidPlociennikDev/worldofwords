<?php

namespace App\Http\Controllers;

use App\Http\Requests\WordRequest;
use App\Models\Word;
use Illuminate\Http\Response;

class WordController extends Controller
{
    public function randomWords()
    {
        $words = Word::all();

        return view('words', compact('words'));
    }

    public function translations(WordRequest $request)
    {
        $id = 1;
        $array = $request->get('translations');
        for ($i=0; $i < count($array) ; $i++) { 
            $words = Word::where('translation', null)->first()->update(['translation' => $array[$i]]);
        }

        return new Response(['message' => "Successfully updated"]);
    }
}
