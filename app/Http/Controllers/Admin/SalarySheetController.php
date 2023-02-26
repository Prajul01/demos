<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalarySheetRequest;
use App\Models\SalarySheet;
use Illuminate\Http\Request;

class SalarySheetController extends Controller
{
    public function index()
    {
        $SalarySheet = SalarySheet::all();
        return response()->json([
            "success" => true,
            "message" => "SalarySheet  List",
            "data" => $SalarySheet
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
    public function store(SalarySheetRequest $req)
    {

        $input = $req->all();
        $date = date('Y-m-d h:i:s');
        $SalarySheet = new SalarySheet();
        $SalarySheet->title = $req->input('fiscalyear');
        $SalarySheet->class = $req->input('month');
        $SalarySheet->created_by =  $req->input('created_by');
        $SalarySheet->created_at = $date;


        $resp = [
            'success' => false,
            'message' => 'Save failed'
        ];

        if($SalarySheet->save()){
            $resp['success'] = true;
            $resp['message'] = 'SalarySheet  saved';
            $resp['data']=$input;
            $resp['id']=$SalarySheet->id;



        }else{  }

        return response()->json($resp);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $SalarySheet = SalarySheet::findOrFail($id);
        $response = $SalarySheet;
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
        $SalarySheet = SalarySheet::findOrFail($id);
        $response = $SalarySheet;
        return response()->json(["data" => $response]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SalarySheetRequest $request, $id)
    {

        $SalarySheet=SalarySheet::find($id);
        $SalarySheet->updated_by =  '_by';
        $SalarySheet->update($request->all());
        return response()->json([
            "success" => true,
            "message" => "SalarySheet Cost updated",
            "data" => $SalarySheet
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
        $info=SalarySheet::where('id',$id)->get();
//        $info->delete_flg =  '1';
        SalarySheet::findOrFail($id)->delete();


        return response()->json(["message"=>'SalarySheet  deleted',"data" => $info,"success" => true]);

    }
}
