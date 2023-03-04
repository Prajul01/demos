<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeSalaryScaleRequest;
use App\Models\EmployeeSalaryScale;
use Illuminate\Http\Request;

class EmployeeSalaryScaleController extends Controller
{
    public function list()
    {
        $EmployeeSalaryScale = EmployeeSalaryScale::where('delete_flg',0)->get();
        return response()->json([
            "success" => true,
            "message" => "EmployeeSalaryScale  List",
            "data" => $EmployeeSalaryScale
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
    public function store(EmployeeSalaryScaleRequest $req)
    {

        $input = $req->all();
        $date = date('Y-m-d h:i:s');
        $EmployeeSalaryScale = new EmployeeSalaryScale();
        $EmployeeSalaryScale->level = $req->input('level');
        $EmployeeSalaryScale->position = $req->input('position');
        $EmployeeSalaryScale->amount = $req->input('amount');
        $EmployeeSalaryScale->created_by =  $req->input('created_by');
        $EmployeeSalaryScale->created_at = $date;


        $resp = [
            'success' => false,
            'message' => 'Save failed'
        ];

        if($EmployeeSalaryScale->save()){
            $resp['success'] = true;
            $resp['message'] = 'EmployeeSalaryScale  saved';
            $resp['data']=$input;
            $resp['id']=$EmployeeSalaryScale->id;



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
        $EmployeeSalaryScale = EmployeeSalaryScale::findOrFail($id);
        $response = $EmployeeSalaryScale;
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
        $EmployeeSalaryScale = EmployeeSalaryScale::findOrFail($id);
        $response = $EmployeeSalaryScale;
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

        $EmployeeSalaryScale=EmployeeSalaryScale::find($id);
        $EmployeeSalaryScale->updated_by =  '_by';
        $EmployeeSalaryScale->update($request->all());
        return response()->json([
            "success" => true,
            "message" => "EmployeeSalaryScale Cost updated",
            "data" => $EmployeeSalaryScale
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
        $Signature=EmployeeSalaryScale::find($id);
        $Signature->delete_flg =  '1';
        $Signature->update($request->all());
        $resp = [
            'success' => True,
            'message' => 'Data Deleted',
            'data'=>$Signature,
        ];
        return response()->json($resp);
    }
    public function recycle()
    {
        $info=EmployeeSalaryScale::withTrashed()->where('deleted_at', '<>', '', 'and')->get();
//        $info->delete_flg =  '1';



        return response()->json(["message"=>'EmployeeSalaryScale  deleted',"data" => $info,"success" => true]);

    }
}
