<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FiscalYearRequest;
use App\Models\FiscalYear;
use Illuminate\Http\Request;

class FiscalYearController extends Controller
{
    public function list()
    {
        $FiscalYear = FiscalYear::where('delete_flg',0)->get();
        return response()->json([
            "success" => true,
            "message" => "FiscalYear  List",
            "data" => $FiscalYear
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
        $FiscalYear = new FiscalYear();
        $FiscalYear->name = $req->input('name');
        $FiscalYear->from_date_eng = $req->input('from_date_eng');
        $FiscalYear->to_date_eng = $req->input('to_date_eng');
        $FiscalYear->from_date_nep = $req->input('from_date_nep');
        $FiscalYear->to_date_nep = $req->input('to_date_nep');

//        $FiscalYear->created_by =  $req->input('created_by');
        $FiscalYear->created_at = $date;


        $resp = [
            'success' => false,
            'message' => 'Save failed'
        ];

        if($FiscalYear->save()){
            $resp['success'] = true;
            $resp['message'] = 'FiscalYear  saved';
            $resp['data']=$input;
            $resp['id']=$FiscalYear->id;



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
        $FiscalYear = FiscalYear::findOrFail($id);
        $response = $FiscalYear;
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
        $FiscalYear = FiscalYear::findOrFail($id);
        $response = $FiscalYear;
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

        $FiscalYear=FiscalYear::find($id);
        $FiscalYear->updated_by =  '_by';
        $FiscalYear->update($request->all());
        return response()->json([
            "success" => true,
            "message" => "FiscalYear Cost updated",
            "data" => $FiscalYear
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
        $Signature=FiscalYear::find($id);
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
