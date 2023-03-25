<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Audit;
use Illuminate\Http\Request;

class AuditController extends Controller
{
    public function list()
    {
        $Audit = Audit::where('delete_flg',0)->get();
        return response()->json([
            "success" => true,
            "message" => "Audit  List",
            "data" => $Audit
        ]);
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {

        $input = $req->all();

        $Audit = Audit::create($req->all());



        $resp = [
            'success' => false,
            'message' => 'Save failed'
        ];

        if($Audit->save()){
            $resp['success'] = true;
            $resp['message'] = 'Audit  saved';
            $resp['data']=$input;
            $resp['id']=$Audit->id;



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
        $Audit = Audit::findOrFail($id);
        $response = $Audit;
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
        $Audit = Audit::findOrFail($id);
        $response = $Audit;
        return response()->json(["data" => $response]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $req
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {

        $Audit=Audit::find($id);
        $Audit->updated_by =  $req->input('updated_by');
        $Audit->update($req->all());
        return response()->json([
            "success" => true,
            "message" => "Audit  updated",
            "data" => $Audit
        ]);
//
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $req,$id)
    {
        $Audit=Audit::find($id);
        $Audit->delete_flg =  '1';
        $Audit->update($req->all());
        $resp = [
            'success' => True,
            'message' => 'Data Deleted',
            'data'=>$Audit,
        ];
        return response()->json($resp);
    }
}
