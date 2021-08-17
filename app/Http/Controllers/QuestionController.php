<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    //
    // public _construct(Question $question){

    //     $user = $request->user();
    // }

    public function question(){
        return response()->json(Question::get(),200);
    }


    
    public function store(Request $request, Question $question){

        $user = $request->user();
        $request->validate([

            'question' => 'required',
            'answer' => 'required'
            
        ]);
        $request->request->add(['user_id'=>$user->id]);
        $question = Question::create($request->all());
        
        return response()->json($question,200);
    }
}
