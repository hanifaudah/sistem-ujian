<?php

namespace App\Http\Controllers;

use App\Test;
use App\Problem;
use Illuminate\Http\Request;

class TestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $tests = Test::all();
        return view('tests.index', ['user' => $user, 'tests' => $tests]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate
        $this->validate (
            $request,
            [
                'name' => 'required',
                'numOfQuestions' => 'required',
                'duration' => 'required'
            ]
        );
        //Initialize Test
        $test = new Test();
        $test->name = request('name');
        $test->numberOfQuestions = request('numOfQuestions');
        $test->duration = (int)request('duration');

        //Save Test
        $test->save();

        return redirect('tests')->with('success', 'Test Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $test = Test::find($id);
        $problems = Problem::where('test_id', $test->id)->get();
        return view('tests.show', ['test' => $test, 'problems' => $problems]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test = Test::find($id);
        $test->delete();

        return redirect('/tests')->with('success', 'Test Deleted');
    }
}
