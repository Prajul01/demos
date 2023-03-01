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
        $FiscalYear = FiscalYear::all();
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
    public function store(FiscalYearRequest $req)
    {

        $input = $req->all();
        $date = date('Y-m-d h:i:s');
        $FiscalYear = new FiscalYear();
        $FiscalYear->name = $req->input('name');

        $FiscalYear->created_by =  $req->input('created_by');
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
    public function update(FiscalYearRequest $request, $id)
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
    public function destroy($id)
    {
        $info=FiscalYear::where('id',$id)->get();
//        $info->delete_flg =  '1';
        FiscalYear::findOrFail($id)->delete();


        return response()->json(["message"=>'FiscalYear  deleted',"data" => $info,"success" => true]);

    }
}
