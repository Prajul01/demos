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
        $EducationYear = EducationYear::all();
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
    public function store(EducationYearRequest $req)
    {

        $input = $req->all();
        $date = date('Y-m-d h:i:s');
        $EducationYear = new EducationYear();
        $EducationYear->title = $req->input('name');
        $EducationYear->created_by =  $req->input('created_by');
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
    public function update(EducationYearRequest $request, $id)
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
    public function destroy($id)
    {
        $info=EducationYear::where('id',$id)->get();
//        $info->delete_flg =  '1';
        EducationYear::findOrFail($id)->delete();


        return response()->json(["message"=>'EducationYear  deleted',"data" => $info,"success" => true]);

    }
}
