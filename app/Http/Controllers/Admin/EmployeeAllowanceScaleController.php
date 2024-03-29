<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeAllowanceScaleRequest;
use App\Models\EmployeeAllowanceScale;
use Illuminate\Http\Request;

class EmployeeAllowanceScaleController extends Controller
{
    public function list()
    {
        $EmployeeAllowanceScale = EmployeeAllowanceScale::where('delete_flg',0)->get();
        return response()->json([
            "success" => true,
            "message" => "EmployeeAllowanceScale  List",
            "data" => $EmployeeAllowanceScale
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
        $EmployeeAllowanceScale = new EmployeeAllowanceScale();
        $EmployeeAllowanceScale->level = $req->input('level');
        $EmployeeAllowanceScale->title = $req->input('title');
        $EmployeeAllowanceScale->amount = $req->input('amount');
        $EmployeeAllowanceScale->area = $req->input('area');
//        $EmployeeAllowanceScale->created_by =  $req->input('created_by');
        $EmployeeAllowanceScale->created_at = $date;


        $resp = [
            'success' => false,
            'message' => 'Save failed'
        ];

        if($EmployeeAllowanceScale->save()){
            $resp['success'] = true;
            $resp['message'] = 'EmployeeAllowanceScale  saved';
            $resp['data']=$input;
            $resp['id']=$EmployeeAllowanceScale->id;



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
        $EmployeeAllowanceScale = EmployeeAllowanceScale::findOrFail($id);
        $response = $EmployeeAllowanceScale;
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
        $EmployeeAllowanceScale = EmployeeAllowanceScale::findOrFail($id);
        $response = $EmployeeAllowanceScale;
        return response()->json(["data" => $response]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {

        $EmployeeAllowanceScale=EmployeeAllowanceScale::find($id);
        $EmployeeAllowanceScale->updated_by =  $req->input('area');
        $EmployeeAllowanceScale->update($req->all());
        return response()->json([
            "success" => true,
            "message" => "EmployeeAllowanceScale  updated",
            "data" => $EmployeeAllowanceScale
        ]);
//
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request,$id)
    {
        $Signature=EmployeeAllowanceScale::find($id);
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
