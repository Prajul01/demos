<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index()
    {



        $emplooyee = Employee::all();
        return response()->json([
            "success" => true,
            "message" => "Employee List",
            "data" => $emplooyee
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $req)
    {
        $input = $req->all();
        $req->validate([

            'name' => 'required',
            'school_name' => 'required',
            'category' => 'required',
            'type' => 'required',
            'post' => 'required',
            'grade' => 'required',
            'phone' => 'required',
//            'created_by'=>'required'
        ]);

        $date = date('Y-m-d h:i:s');

        $emplooyee = new Employee();
        $emplooyee->name = $req->input('name');
        $emplooyee->school_name = $req->input('school_name');
        $emplooyee->category = $req->input('category');
        $emplooyee->type = $req->input('type');
        $emplooyee->post = $req->input('post');
        $emplooyee->grade = $req->input('grade');
        $emplooyee->phone = $req->input('phone');
        $emplooyee->created_by =  "admin";

        //$emplooyee->created_by = $req->input('created_by');

        $emplooyee->created_at = $date;


        $resp = [
            'success' => false,
            'message' => 'Save failed'
        ];

        if($emplooyee->save()){
            $resp['success'] = true;
            $resp['message'] = 'Employyee saved';
            $resp['data']=$input;
            $resp['id']=$emplooyee->id;



        }else{



        }

        return response()->json($resp);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emplooyee = Employee::findOrFail($id);
        $response = $emplooyee;
        return response()->json(["data" => $response]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emplooyee = Employee::findOrFail($id);
        $response = $emplooyee;
        return response()->json(["data" => $response]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {
        $emplooyee = Employee::findOrFail($id);
//        school->save()
//        $emplooyee->update();
        $date = date('Y-m-d h:i:s');
        if($emplooyee->update()){
            $resp['success'] = true;
            $resp['message'] = 'User saved';
            $resp['data']=$emplooyee;
            $resp['id']=$emplooyee->id;
            $emplooyee->updated_at =$date;
            $emplooyee->updated_by="admintest";



        }else{



        }
        return response()->json($resp);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info=Employee::where('id',$id)->get();
        Employee::findOrFail($id)->delete();


        return response()->json(["message"=>'Employee deleted',"data" => $info,"success" => true]);

    }
}
