<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    //

    public function question(){
        return response()->json(Question::get(),200);
    }

    public function store(Request $request, Question $question){
        $request->validate([

            'question' => 'required',
            'answer' => 'required'
            
        ]);

        $question = Question::create($request->all());
        return response()->json($question,200);
    }
}
