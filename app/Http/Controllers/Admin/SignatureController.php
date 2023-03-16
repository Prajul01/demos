<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignatureRequest;
use App\Models\Signature;
use Illuminate\Http\Request;

class SignatureController extends Controller
{
    public function list()
    {
        $Signature = Signature::where('delete_flg',0)->get();
        return response()->json([
            "success" => true,
            "message" => "Signature  List",
            "data" => $Signature
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
        $Signature = new Signature();
        $Signature->name = $req->input('name');
        $Signature->post = $req->input('post');
        $Signature->signature = $req->input('signature');
        $Signature->created_by =  $req->input('created_by');
        $Signature->created_at = $date;


        $resp = [
            'success' => false,
            'message' => 'Save failed'
        ];

        if($Signature->save()){
            $resp['success'] = true;
            $resp['message'] = 'Signature  saved';
            $resp['data']=$input;
            $resp['id']=$Signature->id;



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
        $Signature = Signature::findOrFail($id);
        $response = $Signature;
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
        $Signature = Signature::findOrFail($id);
        $response = $Signature;
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

        $Signature=Signature::find($id);
        $Signature->updated_by =  '_by';
        $Signature->update($request->all());
        return response()->json([
            "success" => true,
            "message" => "Signature Cost updated",
            "data" => $Signature
        ]);

    }


    public function destroy( Request $request,$id)
    {
        $Signature=Signature::find($id);
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
