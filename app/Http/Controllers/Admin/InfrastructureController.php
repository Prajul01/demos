<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InfrastructureRequest;
use App\Models\Infrastructure;
use Illuminate\Http\Request;

class InfrastructureController extends Controller
{
    public function list()
    {
        $infrastructure = Infrastructure::where('delete_flg',0)->get();
        return response()->json([
            "success" => true,
            "message" => "Infrastructure  List",
            "data" => $infrastructure
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
        $infrastructure = new Infrastructure();
        $infrastructure->school = $req->input('school');
        $infrastructure->account = $req->input('account');
        $infrastructure->total = $req->input('total');
        $infrastructure->remark = $req->input('remark');
        $infrastructure->finacialyear = $req->input('finacialyear');
        $infrastructure->generated_by = $req->input('generated_by');
        $infrastructure->state = $req->input('state');
        $infrastructure->created_by =  'created_by';

        $infrastructure->created_at = $date;
//        $infrastructure->updated_at = $date;


        $resp = [
            'success' => false,
            'message' => 'Save failed'
        ];

        if($infrastructure->save()){
            $resp['success'] = true;
            $resp['message'] = 'Infrastructure Cost saved';
            $resp['data']=$input;
            $resp['id']=$infrastructure->id;



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
        $infrastructure = Infrastructure::findOrFail($id);
        $response = $infrastructure;
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
        $infrastructure = Infrastructure::findOrFail($id);
        $response = $infrastructure;
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

        $infrastructure=Infrastructure::find($id);
        $infrastructure->updated_by =  '_by';
        $infrastructure->update($request->all());
        return response()->json([
            "success" => true,
            "message" => "Infrastructure Cost updated",
            "data" => $infrastructure
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
        $Signature=Infrastructure::find($id);
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
