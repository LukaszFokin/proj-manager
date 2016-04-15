<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Phase;
use Illuminate\Http\Request;

use App\Http\Requests;

class PhaseController extends Controller
{

    private $phase;

    public function __construct()
    {
        $this->phase = new Phase();
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $phases = $this->phase;

        if($name = $request->input('name'))
            $phases = $phases->where('name', 'LIKE', '%'.$request->input('name').'%');

        if($projectId = $request->input('project_id'))
            $phases = $phases->where('project_id', '=', $request->input('project_id', ''));

        return view('phases.home', ['phases' => $phases->paginate(20)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('phases.form', ['phase' => $this->phase]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->phase->getRules());

        $phase = $this->phase->create($request->input());

        $activitiesModels = [];
        if($request->input('activities')) {
            foreach ($request->input('activities') as $order => $activity)
                $activitiesModels[] = new Activity(['name' => $activity, 'order' => $order]);
        }

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
        return view('phases.form', ['phase' => $this->phase->find($id)]);
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
        $this->validate($request, $this->phase->getRules());

        $phase = $this->phase->find($id);

        $activitiesModels = [];
        if(count($request->input('activities'))) {
            foreach ($request->input('activities') as $order => $activity)
                $activitiesModels[] = new Activity(['name' => $activity, 'order' => $order]);
        }

        // Delete and insert new relations
        $phase->activities()->delete();
        $phase->activities()->saveMany($activitiesModels);

        $phase->update($request->input());

        $this->addSuccessMessage('Phases updated successfully');

        return redirect('/phases');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->phase->find($id)->update(['status' => DELETED]);

        $this->addSuccessMessage('Phase deleted successfully');

        return redirect('/phases');
    }

    /**
     * Get activities by ajax request
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function addActivity(Request $request)
    {
        if($request->ajax())
        {
            $this->validate($request, ['new_activity' => 'required']);

            return response()->view('phases.activity', ['activity' => new Phase(['name' => $request->input('new_activity')])]);
        }

        return redirect('/phases');
    }

    /**
     * Get phases project by ajx
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function getProjectPhases(Request $request)
    {
        if($request->ajax())
        {
            return response(getParentPhasesSelect('parent_id', 'Parent Phase', null, $request->input('project_id')));
        }

        return redirect('/phases');
    }
}
