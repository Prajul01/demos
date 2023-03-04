<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ScholarshipScaleRequest;
use App\Models\ScholarshipScale;
use Illuminate\Http\Request;

class ScholarshipScaleController extends Controller
{
    public function list()
    {
        $ScholarshipScale = ScholarshipScale::where('delete_flg',0)->get();
        return response()->json([
            "success" => true,
            "message" => "ScholarshipScale  List",
            "data" => $ScholarshipScale
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
    public function store(ScholarshipScaleRequest $req)
    {

        $input = $req->all();
        $date = date('Y-m-d h:i:s');
        $ScholarshipScale = new ScholarshipScale();
        $ScholarshipScale->title = $req->input('title');
        $ScholarshipScale->class = $req->input('class');
        $ScholarshipScale->amount = $req->input('amount');
        $ScholarshipScale->created_by =  $req->input('created_by');
        $ScholarshipScale->created_at = $date;


        $resp = [
            'success' => false,
            'message' => 'Save failed'
        ];

        if($ScholarshipScale->save()){
            $resp['success'] = true;
            $resp['message'] = 'ScholarshipScale  saved';
            $resp['data']=$input;
            $resp['id']=$ScholarshipScale->id;



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
        $ScholarshipScale = ScholarshipScale::findOrFail($id);
        $response = $ScholarshipScale;
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
        $ScholarshipScale = ScholarshipScale::findOrFail($id);
        $response = $ScholarshipScale;
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

        $ScholarshipScale=ScholarshipScale::find($id);
        $ScholarshipScale->updated_by =  '_by';
        $ScholarshipScale->update($request->all());
        return response()->json([
            "success" => true,
            "message" => "ScholarshipScale Cost updated",
            "data" => $ScholarshipScale
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
        $Signature=ScholarshipScale::find($id);
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
