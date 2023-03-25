<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeGradeLimitRequest;
use App\Http\Requests\EmployeegradeRequest;
use App\Models\EmployeeGradeLimit;

use Illuminate\Http\Request;

class EmployeeGradeLimitController extends Controller
{
    public function list()
    {
        $EmployeeGradeLimit = EmployeeGradeLimit::where('delete_flg',0)->get();
        return response()->json([
            "success" => true,
            "message" => "EmployeeGradeLimit  List",
            "data" => $EmployeeGradeLimit
        ]);
    }
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

        $input = $req->all();
        $date = date('Y-m-d h:i:s');
        $EmployeeGradeLimit = new EmployeeGradeLimit();
        $EmployeeGradeLimit->level = $req->input('level');
        $EmployeeGradeLimit->gradelimit = $req->input('gradelimit');
        $EmployeeGradeLimit->position = $req->input('position');
//        $EmployeeGradeLimit->created_by =  $req->input('created_by');
        $EmployeeGradeLimit->created_at = $date;


        $resp = [
            'success' => false,
            'message' => 'Save failed'
        ];

        if($EmployeeGradeLimit->save()){
            $resp['success'] = true;
            $resp['message'] = 'EmployeeGradeLimit  saved';
            $resp['data']=$input;
            $resp['id']=$EmployeeGradeLimit->id;



        }else{  }

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
        $EmployeeGradeLimit = EmployeeGradeLimit::findOrFail($id);
        $response = $EmployeeGradeLimit;
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
        $EmployeeGradeLimit = EmployeeGradeLimit::findOrFail($id);
        $response = $EmployeeGradeLimit;
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

        $EmployeeGradeLimit=EmployeeGradeLimit::find($id);
        $EmployeeGradeLimit->updated_by =  '_by';
        $EmployeeGradeLimit->update($request->all());
        return response()->json([
            "success" => true,
            "message" => "EmployeeGradeLimit  updated",
            "data" => $EmployeeGradeLimit
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request,$id)
    {
        $Signature=EmployeeGradeLimit::find($id);
        $Signature->delete_flg =  '1';
        $Signature->update($request->all());
        $resp = [
            'success' => True,
            'message' => 'Data Deleted',
            'data'=>$Signature,
        ];
        return response()->json($resp);
    }

}
