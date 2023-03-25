<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InfrastructureScaleRequest;
use App\Models\InfrastructureScale;
use Illuminate\Http\Request;

class InfrastructureScaleController extends Controller
{
    public function list()
    {
        $InfrastructureScale = InfrastructureScale::where('delete_flg',0)->get();
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
    public function store(Request $req)
    {

        $input = $req->all();
        $date = date('Y-m-d h:i:s');
        $InfrastructureScale = new InfrastructureScale();
        $InfrastructureScale->level = $req->input('level');
        $InfrastructureScale->infrastructure = $req->input('infrastructure');
        $InfrastructureScale->amount = $req->input('amount');
//        $InfrastructureScale->created_by =  $req->input('created_by');
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
    public function view($id)
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
    public function update(Request $request, $id)
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
    public function destroy( Request $request,$id)
    {
        $Signature=InfrastructureScale::find($id);
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
