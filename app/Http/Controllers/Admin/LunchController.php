<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LunchRequest;
use App\Models\Lunch;
use Illuminate\Http\Request;

class LunchController extends Controller
{
    public function list()
    {
        $Lunch = Lunch::where('delete_flg',0)->get();
        return response()->json([
            "success" => true,
            "message" => "Lunch  List",
            "data" => $Lunch
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
//        $date = date('Y-m-d h:i:s');
//        $Lunch = new Lunch();
        $Lunch = Lunch::create($req->all());
//        $Lunch->total = $req->input('total');
//        $Lunch->remark = $req->input('remark');
//        $Lunch->finacialyear = $req->input('finacialyear');
//        $Lunch->finacialyear = $req->input('total_students');
//        $Lunch->finacialyear = $req->input('total_attendance');
//        $Lunch->finacialyear = $req->input('remaining_total');
//        $Lunch->finacialyear = $req->input('rate');
//        $Lunch->created_by =  $req->input('created_by');

//        $Lunch->created_at = $date;
//        $Lunch->updated_at = $date;


        $resp = [
            'success' => false,
            'message' => 'Save failed'
        ];

        if($Lunch->save()){
            $resp['success'] = true;
            $resp['message'] = 'Lunch  saved';
            $resp['data']=$input;
            $resp['id']=$Lunch->id;
        }else{

        }
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
        $Lunch = Lunch::findOrFail($id);
        $response = $Lunch;
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
        $Lunch = Lunch::findOrFail($id);
        $response = $Lunch;
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

        $Lunch=Lunch::find($id);
        $Lunch->updated_by =  $req->input('created_by');
        $Lunch->update($req->all());
        return response()->json([
            "success" => true,
            "message" => "Lunch Cost updated",
            "data" => $Lunch
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
        $Signature=Lunch::find($id);
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
