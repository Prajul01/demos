<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InfrastructureScaleRequest;
use App\Models\InfrastructureScale;
use Illuminate\Http\Request;

class InfrastructureScaleController extends Controller
{
    public function index()
    {
        $InfrastructureScale = InfrastructureScale::all();
        return response()->json([
            "success" => true,
            "message" => "InfrastructureScale  List",
            "data" => $InfrastructureScale
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
    public function store(InfrastructureScaleRequest $req)
    {

        $input = $req->all();
        $date = date('Y-m-d h:i:s');
        $InfrastructureScale = new InfrastructureScale();
        $InfrastructureScale->level = $req->input('level');
        $InfrastructureScale->infrastructure = $req->input('infrastructure');
        $InfrastructureScale->amount = $req->input('amount');
        $InfrastructureScale->created_by =  $req->input('created_by');
        $InfrastructureScale->created_at = $date;


        $resp = [
            'success' => false,
            'message' => 'Save failed'
        ];

        if($InfrastructureScale->save()){
            $resp['success'] = true;
            $resp['message'] = 'InfrastructureScale  saved';
            $resp['data']=$input;
            $resp['id']=$InfrastructureScale->id;



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
        $InfrastructureScale = InfrastructureScale::findOrFail($id);
        $response = $InfrastructureScale;
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
        $InfrastructureScale = InfrastructureScale::findOrFail($id);
        $response = $InfrastructureScale;
        return response()->json(["data" => $response]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InfrastructureScaleRequest $request, $id)
    {

        $InfrastructureScale=InfrastructureScale::find($id);
        $InfrastructureScale->updated_by =  '_by';
        $InfrastructureScale->update($request->all());
        return response()->json([
            "success" => true,
            "message" => "InfrastructureScale Cost updated",
            "data" => $InfrastructureScale
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
        $info=InfrastructureScale::where('id',$id)->get();
//        $info->delete_flg =  '1';
        InfrastructureScale::findOrFail($id)->delete();


        return response()->json(["message"=>'InfrastructureScale  deleted',"data" => $info,"success" => true]);

    }
}