<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Http\Resources\QuestionResource;

use Symfony\Component\HttpFoundation\Response;
 class QuestionController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('JWT', ['except' => ['index','show']]);
    }
    public function index()
    {
        return QuestionResource::collection(Question::latest()->get());
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {  
        //auth()->user()->question()->create($request->all());
         Question::create($request->all());
        return response('created',Response::HTTP_CREATED);

    }

    
    public function show(Question $question)
    {
        return new QuestionResource($question);
    }

    
    public function edit()
    {
        //
    }

    
    public function update(Request $request, Question $question)
    {
        $question->update($request->all());
        return response('updated',Response::HTTP_ACCEPTED);
    }

    
    public function destroy(Question $question)
    {
        
        $question->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
}
