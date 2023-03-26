<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MaghFormSetting;
use App\Models\MaghFormSettingDetails;
use Illuminate\Http\Request;

class MaghFormSettingController extends Controller
{
    public function list()
    {
        $MaghFormSetting = MaghFormSetting::where('delete_flg',0)->get();
        return response()->json([
            "success" => true,
            "message" => "MaghFormSetting  List",
            "data" => $MaghFormSetting
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
        $MaghFormSetting = new MaghFormSetting();
        $MaghFormSetting->fiscalyear = $req->input('fiscalyear');
        $MaghFormSetting->name = $req->input('name');
        $MaghFormSetting->nagarTeacher = $req->input('nagarTeacher');
        $MaghFormSetting->state = $req->input('state');
        $MaghFormSetting->header = $req->input('header');
        $MaghFormSetting->status = $req->input('status');
        $MaghFormSetting->created_at = $date;


        $resp = [
            'success' => false,
            'message' => 'Save failed'
        ];

        if($MaghFormSetting->save()){
//            $row = Room::create($str);
//            $bed['magh_form_id']=$MaghFormSetting->id;
////            $bed['bed_id'] =json_encode($request->input('bed_id'));
//            MaghFormSettingDetails::create($bed);
            $resp['success'] = true;
            $resp['message'] = 'MaghFormSetting  saved';
            $resp['data']=$input;
            $resp['id']=$MaghFormSetting->id;



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
        $MaghFormSetting = MaghFormSetting::findOrFail($id);
        $response = $MaghFormSetting;
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
        $MaghFormSetting = MaghFormSetting::findOrFail($id);
        $response = $MaghFormSetting;
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

        $MaghFormSetting=MaghFormSetting::find($id);
        $MaghFormSetting->updated_by =  '_by';
        $MaghFormSetting->update($request->all());
        return response()->json([
            "success" => true,
            "message" => "MaghFormSetting Cost updated",
            "data" => $MaghFormSetting
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
        $Signature=MaghFormSetting::find($id);
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
