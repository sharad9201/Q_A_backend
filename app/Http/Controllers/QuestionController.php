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

    public function update(Request $request, $id){


        $question = Question::find($id);
        if(is_null($question)){
            return response()->json(["messsage"=>"record not found"],404);
        }
        $user = $request->user();
        $request->request->add(['user_id'=>$user->id]);
        
        $question->update($request->all());

        return response()->json($question,200);
    }
}
