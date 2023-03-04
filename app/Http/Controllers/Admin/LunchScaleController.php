<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LunchScaleRequest;
use App\Models\LunchScale;
use Illuminate\Http\Request;

class LunchScaleController extends Controller
{
    public function list()
    {
        $LunchScale = LunchScale::where('delete_flg',0)->get();
        return response()->json([
            "success" => true,
            "message" => "LunchScale  List",
            "data" => $LunchScale
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
    public function store(LunchScaleRequest $req)
    {

        $input = $req->all();
        $date = date('Y-m-d h:i:s');
        $LunchScale = new LunchScale();
        $LunchScale->title = $req->input('title');
        $LunchScale->class = $req->input('class');
        $LunchScale->amount = $req->input('amount');
        $LunchScale->created_by =  $req->input('created_by');
        $LunchScale->created_at = $date;


        $resp = [
            'success' => false,
            'message' => 'Save failed'
        ];

        if($LunchScale->save()){
            $resp['success'] = true;
            $resp['message'] = 'LunchScale  saved';
            $resp['data']=$input;
            $resp['id']=$LunchScale->id;



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
        $LunchScale = LunchScale::findOrFail($id);
        $response = $LunchScale;
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
        $LunchScale = LunchScale::findOrFail($id);
        $response = $LunchScale;
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

        $LunchScale=LunchScale::find($id);
        $LunchScale->updated_by =  '_by';
        $LunchScale->update($request->all());
        return response()->json([
            "success" => true,
            "message" => "LunchScale Cost updated",
            "data" => $LunchScale
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
        $Signature=LunchScale::find($id);
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
