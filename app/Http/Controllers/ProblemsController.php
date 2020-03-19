<?php

namespace App\Http\Controllers;

use App\Problem;
use App\Test;
use Illuminate\Http\Request;

class ProblemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "Problem List";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $test_id = $id;
        return view('problems.create', ['test_id' => $test_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate (
            $request,
            [
                'question' => 'required',
                'choices' => 'required',
                'answer' => 'required'
            ]
        );

        $problem = new Problem();
        $problem->question = request('question');
        $problem->choices = json_encode(request('choices'));
        $problem->answer = request('answer');
        $problem->test_id = $id;

        //Save
        $problem->save();

        return redirect("/tests/$id")->with('success', 'Problem Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Problem  $problem
     * @return \Illuminate\Http\Response
     */
    public function show ($id, $index)
    {
        $count = count((Problem::where('test_id' , Problem::find($id)->test_id)->get()));
        $problem = Problem::find($id);
        return view('problems.show', ['count' => $count, 'index' => $index, 'problem' => $problem]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Problem  $problem
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $problem = Problem::find($id);
        $choices = json_decode($problem->choices);
        return view('problems.edit', ['problem' => $problem , 'choices' => $choices]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Problem  $problem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate (
            $request,
            [
                'question' => 'required',
                'choices' => 'required',
                'answer' => 'required'
            ]
        );

        $problem = Problem::find($id);
        $problem->question = request('question');
        $problem->choices = json_encode(request('choices'));
        $problem->answer = request('answer');

        //Save
        $problem->save();

        return redirect("/tests/$problem->test_id")->with('success', 'Question Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Problem  $problem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Problem $problem)
    {
        
    }
}
