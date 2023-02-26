<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AadministrationScaleRequest;
use App\Http\Requests\AdministrationScaleRequest;
use App\Models\AadministrationScale;
use Illuminate\Http\Request;

class AdministrationScaleController extends Controller
{
    public function index()
    {
        $AadministrationScale = AadministrationScale::all();
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
    public function store(AdministrationScaleRequest $req)
    {

        $input = $req->all();
        $date = date('Y-m-d h:i:s');
        $AadministrationScale = new AadministrationScale();
        $AadministrationScale->title = $req->input('level');
        $AadministrationScale->class = $req->input('amount');
        $AadministrationScale->amount = $req->input('amount');
        $AadministrationScale->created_by =  $req->input('created_by');
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
    public function show($id)
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
    public function update(AdministrationScaleRequest $request, $id)
    {

        $AadministrationScale=AadministrationScale::find($id);
        $AadministrationScale->updated_by =  '_by';
        $AadministrationScale->update($request->all());
        return response()->json([
            "success" => true,
            "message" => "AadministrationScale Cost updated",
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
    public function destroy($id)
    {
        $info=AadministrationScale::where('id',$id)->get();
//        $info->delete_flg =  '1';
        AadministrationScale::findOrFail($id)->delete();


        return response()->json(["message"=>'AadministrationScale  deleted',"data" => $info,"success" => true]);

    }
}
