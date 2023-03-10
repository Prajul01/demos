<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends BackendBaseController
{
    protected $route = 'role.';
    protected $panel = 'Role';
    protected $view = 'backend.role.';
    protected $title;
    protected $model;

    function __construct()
    {
        $this->model = new Role();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $this->title = 'List';
        $data['row'] = $this->model->get();

        return view($this->__loadDataToView($this->view . 'index'), compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->title = 'Create';
//        $data['sem'] = semesters::pluck('name', 'id');
//        $data['sub'] = subjects::pluck('title', 'id');


        return view($this->__loadDataToView($this->view . 'create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $file = $request->file('image_file');
        if ($request->hasFile("image_file")) {
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/images/lab/'), $fileName);
            $request->request->add(['image' => $fileName]);
        }
        $request->request->add(['created_by' => auth()->user()->id]);
        $data['row'] = $this->model->create($request->all());
        if ($data['row']) {
            request()->session()->flash('success', $this->panel . 'Created Successfully');
        } else {
            request()->session()->flash('error', $this->panel . 'Creation Failed');
        }
//        return redirect()->route('category.index',compact('data'));
        return redirect()->route($this->__loadDataToView($this->route . 'index'));

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $this->title = 'View';
        $data['row'] = $this->model->findOrFail($id);
//        dd($data['row']);
        return view($this->__loadDataToView($this->view . 'view'), compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->title = 'Edit';
        $data['row'] = $this->model->findOrFail($id);
//        $data['sem'] = semesters::pluck('name', 'id');
//        $data['sub'] = subjects::pluck('title', 'id');

        return view($this->__loadDataToView($this->view . 'edit'), compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $file = $request->file('image_file');
        if ($request->hasFile("image_file")) {
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/images/lab/'), $fileName);
            $request->request->add(['image' => $fileName]);
        }
        $data['row'] = $this->model->findOrFail($id);
        $request->request->add(['updated_by' => auth()->user()->id]);
        if (!$data ['row']) {
            request()->session()->flash('error', 'Invalid Request');
            return redirect()->route($this->__loadDataToView($this->route . 'index'));
        }
        if ($data['row']->update($request->all())) {
            $request->session()->flash('success', $this->panel . ' Update Successfully');
        } else {
            $request->session()->flash('error', $this->panel . ' Update failed');

        }
        return redirect()->route($this->__loadDataToView($this->route . 'index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $this->model->findorfail($id)->delete();
//        unlink(public_path('uploads/images/syllabus/'.$data->image));
//        $this->model->where('id',$data->id)->delete();
        return redirect()->route($this->__loadDataToView($this->route . 'index'))->with('success', $this->panel . ' Deleted Successfully');
    }
    function assignPermission($role_id){
        $data['row'] = Role::find($role_id);

        /* to get assigned permission*/
        $data['permissions'] = $data['row']->permissions()->get();
//        dd($data['permissions']);
        $assigned_permission = [];
        foreach($data['permissions'] as $permission){
            array_push($assigned_permission,$permission->id);
        }
//        dd($assigned_permission);
        $data['assigned_permission'] = $assigned_permission;
        /*end of assigned permission*/

        $data['modules'] = Module::all();
        $this->title = 'Assign permission';
        return view($this->__loadDataToView($this->view.'assign_permission'),compact('data'));
    }

    function postPermission(Request $request){
        $data['row'] = Role::find($request->input('role_id'));
        $data['row']->permissions()->sync($request->input('permission_id'));
        return redirect()->route($this->route.'index');

    }
}
