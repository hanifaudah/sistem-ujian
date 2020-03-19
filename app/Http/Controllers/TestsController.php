<?php

namespace App\Http\Controllers;

use App\Test;
use App\Problem;
use App\User;
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
        $users = User::all();
        //Validate
        $this->validate (
            $request,
            [
                'name' => 'required',
                'duration' => 'required'
            ]
        );
        //Initialize Test
        $test = new Test();
        $test->name = request('name');
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

    public function takeTest($id) {
        $test = Test::find($id);
        return view('tests.takeTest' , ['test' => $test]);
    }

    public function startTest($test_id, $problem_index) {
        $test = Test::find($test_id);
        $problem_set = ($test->problem_set());
        $count = count($problem_set);
        $problem = $problem_set[$problem_index];

        //Check if Checked
        $selected = "";
        $user = auth()->user();
        $test_score_set = json_decode($user->testScore, true);
        if (array_key_exists($test_id, $test_score_set)) {
            if (array_key_exists($problem->id, $test_score_set[$test_id])) {
                $selected = $test_score_set[$test_id][$problem->id];
            }
        }

        return view(
            'tests.startTest', 
            [
            'problem' => $problem, 
            'index' => $problem_index, 
            'count' => $count,
            'test_id' => $test_id,
            'selected' => $selected,
            ]
        );
    }

    public function storeGrade(Request $request, $test_id, $problem_id, $index) {
        $this->validate(
            $request,
            [
            'choices' => 'required',
            ]
        );

        $problem = Problem::find($problem_id);
        $test = Test::find($problem->test_id);
        $isCorrect = false;
        $user = auth()->user();
        $answer = request('choices');

        //Count
        $problem_set = ($test->problem_set());
        $count = count($problem_set);

        //Check answer
        // $isCorrect = ($answer == $problem->answer);

        //Add answer to user
        $test_score_set = json_decode($user->testScore, true);
        $test_score_set[$test->id][$problem->id] = $answer;

        $user->testScore = json_encode($test_score_set);
        $user->save();

        $index += ($index < $count-1) ? 1 : 0;
        return redirect("/startTest/$test->id/$index");
    }

    public function testResult($test_id) {
        $test = Test::find($test_id);
        $user = auth()->user();
        $sum = 0;
        $toBeGraded = json_decode($user->testScore, true)[$test_id];
        foreach ($toBeGraded as $problem_id => $answer) {
            $problem = Problem::find($problem_id);
            if ($problem->answer == $answer) {
                $sum++;
            }
        }

        $score = $sum / count($test->problem_set()) * 100;
        return view('tests.result', ['grade' => $score, 'test' => $test]);
    }
}
