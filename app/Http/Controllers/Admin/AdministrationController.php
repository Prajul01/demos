<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdministrationRequest;
use App\Models\Administration;
use Illuminate\Http\Request;

class AdministrationController extends Controller
{
    public function list()
    {



        $administration = Administration::where('delete_flg',0)->get();
        return response()->json([
            "success" => true,
            "message" => "Administration Cost List",
            "data" => $administration
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function store(AdministrationRequest $req)
    {

        $input = $req->all();
        $date = date('Y-m-d h:i:s');
        $administration = new Administration();
        $administration->school = $req->input('school');
        $administration->account = $req->input('account');
        $administration->total = $req->input('total');
        $administration->remark = $req->input('remark');
        $administration->grade = $req->input('grade');
        $administration->finacialyear = $req->input('finacialyear');
        $administration->created_by =  'created_by';

        $administration->created_at = $date;
//        $administration->updated_at = $date;


        $resp = [
            'success' => false,
            'message' => 'Save failed'
        ];

        if($administration->save()){
            $resp['success'] = true;
            $resp['message'] = 'Administration Cost saved';
            $resp['data']=$input;
            $resp['id']=$administration->id;



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
        $administration = Administration::findOrFail($id);
        $response = $administration;
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
        $administration = Administration::findOrFail($id);
        $response = $administration;
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

        $administration=Administration::find($id);
        $administration->update($request->all());
        return response()->json([
            "success" => true,
            "message" => "Administration Cost updated",
            "data" => $administration
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
        $Signature=Administration::find($id);
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
