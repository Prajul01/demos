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
        $Signature = Signature::all();
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
    public function store(SignatureRequest $req)
    {

        $input = $req->all();
        $date = date('Y-m-d h:i:s');
        $Signature = new Signature();
        $Signature->title = $req->input('name');
        $Signature->class = $req->input('post');
        $Signature->amount = $req->input('signature');
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
    public function update(SignatureRequest $request, $id)
    {

        $Signature=Signature::find($id);
        $Signature->updated_by =  '_by';
        $Signature->update($request->all());
        return response()->json([
            "success" => true,
            "message" => "Signature Cost updated",
            "data" => $Signature
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
        $info=Signature::where('id',$id)->get();
//        $info->delete_flg =  '1';
        Signature::findOrFail($id)->delete();


        return response()->json(["message"=>'Signature  deleted',"data" => $info,"success" => true]);

    }
}
