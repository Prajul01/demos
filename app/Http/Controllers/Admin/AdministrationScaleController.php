<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AadministrationScaleRequest;
use App\Http\Requests\AdministrationScaleRequest;
use App\Models\AadministrationScale;
use Illuminate\Http\Request;

class AdministrationScaleController extends Controller
{
    public function list()
    {
        $AadministrationScale = AadministrationScale::where('delete_flg',0)->get();
        return response()->json([
            "success" => true,
            "message" => "AdministrationScale  List",
            "data" => $AadministrationScale
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
        $AadministrationScale = new AadministrationScale();
        $AadministrationScale->level = $req->input('level');
//        $AadministrationScale->is_draft = $req->input('is_draft');
        $AadministrationScale->amount = $req->input('amount');
//        $AadministrationScale->created_by =  $req->input('created_by');
        $AadministrationScale->created_at = $date;


        $resp = [
            'success' => false,
            'message' => 'Save failed'
        ];

        if($AadministrationScale->save()){
            $resp['success'] = true;
            $resp['message'] = 'AadministrationScale  saved';
            $resp['data']=$input;
            $resp['id']=$AadministrationScale->id;



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
        $AadministrationScale = AadministrationScale::findOrFail($id);
        $response = $AadministrationScale;
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
        $AadministrationScale = AadministrationScale::findOrFail($id);
        $response = $AadministrationScale;
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

        $AadministrationScale=AadministrationScale::find($id);
//        $AadministrationScale->updated_by =  $req->input('updated_by');
//        $AadministrationScale->updated_by =  '_by';
        $AadministrationScale->update($req->all());
        return response()->json([
            "success" => true,
            "message" => "AadministrationScale  updated",
            "data" => $AadministrationScale
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
        $Signature=AadministrationScale::find($id);
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
