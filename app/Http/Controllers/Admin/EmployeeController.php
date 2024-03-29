<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function list()
    {



        $emplooyee = Employee::where('delete_flg',0)->get();
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
    public function store(Request $req)
    {
        //$input = $req->all();

//        $req->request->add(['updated_by' => auth()->user()->id]);
        $emp=Employee::create($req->all());
        $date = date('Y-m-d h:i:s');


        $emplooyee = new Employee();
//        return auth()->user()->name;
        $emplooyee->name = $req->input('name');
        $emplooyee->school_name = $req->input('school_name');
        $emplooyee->category = $req->input('category');
        $emplooyee->type = $req->input('type');
        $emplooyee->post = $req->input('post');
        $emplooyee->grade = $req->input('grade');
        $emplooyee->phone = $req->input('phone');
        $emplooyee->status = $req->input('status');
        $emplooyee->gender = $req->input('gender');
        $emplooyee->marital_status = $req->input('marital_status	');
        $emplooyee->contact_no = $req->input('contact_no	');
        $emplooyee->bank = $req->input('bank');
        $emplooyee->account_no = $req->input('account_no');
        $emplooyee->provident_no = $req->input('provident_no');
        $emplooyee->citizen_inv_no = $req->input('citizen_inv_no');
//        $emplooyee->created_by =  "admin";

        //$emplooyee->created_by = $req->input('created_by');

        $emplooyee->created_at = $date;


        $resp = [
            'success' => false,
            'message' => 'Save failed'
        ];

        if($emp->save()){
            $resp['success'] = true;
            $resp['message'] = 'Employyee saved';
            $resp['data']=$emp;
            //$resp['id']=$emplooyee->id;



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
    public function view($id)
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
    public function update(Request $request, $id)
    {


        $emplooyee = Employee::findOrFail($id);
        $emplooyee->updated_by = $request->input('updated_by');
        $emplooyee->update($request->all());
//        school->save()
//        $emplooyee->update();
        $date = date('Y-m-d h:i:s');
        if($emplooyee->update()){
            $resp['success'] = true;
            $resp['message'] = 'Employee updated';
            $resp['data']=$emplooyee;
            $resp['id']=$emplooyee->id;
//            $emplooyee->updated_at =$date;
//            $emplooyee->updated_by="admintest";



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
    public function destroy( Request $request,$id)
    {
        $Signature=Employee::find($id);
        $Signature->delete_flg =  '1';
        $Signature->update($request->all());
        $resp = [
            'success' => True,
            'message' => 'Data Deleted',
            'data'=>$Signature,
        ];
        return response()->json($resp);
    }



    public function search(Request $request)
    {
        $filters = $request->only(['gender', 'type', 'position', 'school_name', 'level']);

        $results = Employee::query();

        foreach ($filters as $key => $value) {
            if ($value) {
                $results = $results->whereRaw("LOWER($key) = LOWER(?)", [$value]);
            }
        }

        return response()->json($results->get());
    }
}
