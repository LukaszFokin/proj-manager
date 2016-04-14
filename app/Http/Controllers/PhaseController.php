<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Phase;
use Illuminate\Http\Request;

use App\Http\Requests;

class PhaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phases = Phase::paginate(20);

        return view('phases.home', ['phases' => $phases]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $phase = new Phase();
        $activities = $phase->activities();

        return view('phases.form', ['phase' => $phase, 'activities' => $activities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $phase = new Phase();

        $this->validate($request, $phase->getRules());

        $phase = $phase->create($request->input());

        $activitiesModels = [];
        foreach($request->input('activities') as $order => $activity)
            $activitiesModels[] = new Activity(['name' => $activity, 'order' => $order]);

        $phase->activities()->saveMany($activitiesModels);

        $this->addSuccessMessage('Phase created successfully');

        return redirect('/phases');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phase = Phase::find($id);

        $activities = $phase->activities()->get();

        return view('phases.form', ['phase' => $phase, 'activities' => $activities]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addActivity(Request $request)
    {
        if($request->ajax())
        {
            $this->validate($request, ['new_activity' => 'required']);

            return response()->view('phases.activity', ['activity' => new Phase(['name' => $request->input('new_activity')])]);
        }

        return redirect('/phases');
    }
}
