<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeegradeRequest;
use App\Models\Employeegrade;
use Illuminate\Http\Request;

class EmployeegradeController extends Controller
{
    public function index()
    {
        $employeegrade = Employeegrade::where('delete_flg',0)->get();
        return response()->json([
            "success" => true,
            "message" => "Employeegrade  List",
            "data" => $employeegrade
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
        $Employeegrade = new Employeegrade();
        $Employeegrade->level = $req->input('level');
        $Employeegrade->gradelimit = $req->input('gradelimit');
        $Employeegrade->position = $req->input('position');
//        $Employeegrade->created_by =  $req->input('created_by');
        $Employeegrade->created_at = $date;


        $resp = [
            'success' => false,
            'message' => 'Save failed'
        ];

        if($Employeegrade->save()){
            $resp['success'] = true;
            $resp['message'] = 'Employeegrade  saved';
            $resp['data']=$input;
            $resp['id']=$Employeegrade->id;



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
        $Employeegrade = Employeegrade::findOrFail($id);
        $response = $Employeegrade;
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
        $Employeegrade = Employeegrade::findOrFail($id);
        $response = $Employeegrade;
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

        $Employeegrade=Employeegrade::find($id);
        $Employeegrade->updated_by =  '_by';
        $Employeegrade->update($request->all());
        return response()->json([
            "success" => true,
            "message" => "Employeegrade Cost updated",
            "data" => $Employeegrade
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
        $Signature=Employeegrade::find($id);
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
        $info=Employeegrade::withTrashed()->where('deleted_at', '<>', '', 'and')->get();
//        $info->delete_flg =  '1';



        return response()->json(["message"=>'Employeegrade  deleted',"data" => $info,"success" => true]);

    }
}
