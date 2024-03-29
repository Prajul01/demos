<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EducationYearRequest;
use App\Models\EducationYear;
use Illuminate\Http\Request;

class EducationYearController extends Controller
{
    public function list()
    {
        $EducationYear = EducationYear::where('delete_flg',0)->get();
        return response()->json([
            "success" => true,
            "message" => "EducationYear  List",
            "data" => $EducationYear
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
        $EducationYear = new EducationYear();
        $EducationYear->name = $req->input('name');
        $EducationYear->from_date_eng = $req->input('from_date_eng');
        $EducationYear->to_date_eng = $req->input('to_date_eng');
        $EducationYear->from_date_nep = $req->input('from_date_nep');
        $EducationYear->to_date_nep = $req->input('to_date_nep');
//        $EducationYear->created_by =  $req->input('created_by');
        $EducationYear->created_at = $date;


        $resp = [
            'success' => false,
            'message' => 'Save failed'
        ];

        if($EducationYear->save()){
            $resp['success'] = true;
            $resp['message'] = 'EducationYear  saved';
            $resp['data']=$input;
            $resp['id']=$EducationYear->id;



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
        $EducationYear = EducationYear::findOrFail($id);
        $response = $EducationYear;
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
        $EducationYear = EducationYear::findOrFail($id);
        $response = $EducationYear;
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

        $EducationYear=EducationYear::find($id);
        $EducationYear->updated_by =  '_by';
        $EducationYear->update($request->all());
        return response()->json([
            "success" => true,
            "message" => "EducationYear Cost updated",
            "data" => $EducationYear
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
        $Signature=EducationYear::find($id);
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
