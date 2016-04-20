<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ProjectLabel;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProjectLabelsController extends Controller
{

    private $project_label;

    public function __construct()
    {
        parent::__construct();
        $this->project_label = new Projectlabel();
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
        $project_label = $this->project_label;

        if($name = $request->input('name'))
            $project_label = $project_label->where('name', 'LIKE', '%'.$request->input('name').'%');

        if($projectId = $request->input('project_id'))
            $project_label = $project_label->where('project_id', '=', $request->input('project_id', ''));

        return view('project_labels.home', ['project_labels' => $project_label->paginate(20)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project_labels.form', ['project_label' => $this->project_label]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->project_label->getRules());

        $project_label = $this->project_label->create($request->input());

        $this->addSuccessMessage('Phase created successfully');

        return redirect('/project_labels');
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
        return view('project_labels.form', ['project_label' => $this->project_label->find($id)]);
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
        $this->validate($request, $this->project_label->getRules());

        $project_label = $this->project_label->find($id);

        $project_label->update($request->input());

        $this->addSuccessMessage('Project Label updated successfully');

        return redirect('/project_labels');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->project_label->find($id)->delete();

        $this->addSuccessMessage('Project label deleted successfully');

        return redirect('/project_labels');
    }

}
