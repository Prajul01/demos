<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeGradeScaleRequest;
use Illuminate\Http\Request;
use App\Models\EmployeeGradeScale;

class EmployeeGradeScaleController extends Controller
{
    public function index()
    {
        $EmployeeGradeScale = EmployeeGradeScale::all();
        return response()->json([
            "success" => true,
            "message" => "EmployeeGradeScale  List",
            "data" => $EmployeeGradeScale
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
    public function store(EmployeeGradeScaleRequest $req)
    {

        $input = $req->all();
        $date = date('Y-m-d h:i:s');
        $EmployeeGradeScale = new EmployeeGradeScale();
        $EmployeeGradeScale->level = $req->input('level');
        $EmployeeGradeScale->grade = $req->input('grade');
        $EmployeeGradeScale->position = $req->input('position');
        $EmployeeGradeScale->amount = $req->input('amount');
        $EmployeeGradeScale->created_by =  $req->input('created_by');
        $EmployeeGradeScale->created_at = $date;


        $resp = [
            'success' => false,
            'message' => 'Save failed'
        ];

        if($EmployeeGradeScale->save()){
            $resp['success'] = true;
            $resp['message'] = 'EmployeeGradeScale  saved';
            $resp['data']=$input;
            $resp['id']=$EmployeeGradeScale->id;



        }else{  }

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
        $EmployeeGradeScale = EmployeeGradeScale::findOrFail($id);
        $response = $EmployeeGradeScale;
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
        $EmployeeGradeScale = EmployeeGradeScale::findOrFail($id);
        $response = $EmployeeGradeScale;
        return response()->json(["data" => $response]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeGradeScaleRequest $request, $id)
    {

        $EmployeeGradeScale=EmployeeGradeScale::find($id);
        $EmployeeGradeScale->updated_by =  '_by';
        $EmployeeGradeScale->update($request->all());
        return response()->json([
            "success" => true,
            "message" => "EmployeeGradeScale  updated",
            "data" => $EmployeeGradeScale
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info=EmployeeGradeScale::where('id',$id)->get();
//        $info->delete_flg =  '1';
        EmployeeGradeScale::findOrFail($id)->delete();


        return response()->json(["message"=>'EmployeeGradeScale  deleted',"data" => $info,"success" => true]);

    }
}