<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MaghFormSettingDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaghFormSettingDetailsController extends Controller
{
//    public function list()
//    {
//        $MaghFormSettingDetails = MaghFormSettingDetailsDetails::where('delete_flg',0)->get();
//        return response()->json([
//            "success" => true,
//            "message" => "MaghFormSettingDetails  List",
//            "data" => $MaghFormSettingDetails
//        ]);
//    }
    public function list(Request $req)
    {
        $MaghFormSettingDetails = MaghFormSettingDetails::where('delete_flg',0)->get();
        if($req->magh_form_id){
            $MaghFormSettingDetails = MaghFormSettingDetails::where('delete_flg',0)->where('magh_form_id',$req->magh_form_id)->get();
        }
        if($req->magh_form_detail_ids){
            $temp = $req->magh_form_detail_ids;
            $arr = explode(',',$temp);
            $ids = "'" . implode ( "', '", $arr ) . "'";
            $MaghFormSettingDetails = DB::select("
                SELECT
                    * 
                FROM
                    magh_form_setting_details
                WHERE
                    delete_flg = 0 
                AND id IN ({$ids}) "
            );

            if($req->filter){
                $MaghFormSettingDetails = DB::select("
                SELECT
                    * 
                FROM
                    magh_form_setting_details
                WHERE
                    delete_flg = 0 
                AND id NOT IN ({$ids}) "
            );
            }
            
        }
        return response()->json([
            "success" => true,
            "message" => "MaghFormSettingDetails  List",
            "data" => $MaghFormSettingDetails
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
        $MaghFormSettingDetails = new MaghFormSettingDetails();
        $MaghFormSettingDetails->magh_form_id = $req->input('magh_form_id');
        $MaghFormSettingDetails->month = $req->input('month');
        $MaghFormSettingDetails->name = $req->input('name');
        $MaghFormSettingDetails->type = $req->input('type');
        $MaghFormSettingDetails->visible = $req->input('visible');
        $MaghFormSettingDetails->status = $req->input('status');


        $resp = [
            'success' => false,
            'message' => 'Save failed'
        ];
        if($MaghFormSettingDetails->save()){
//            $row = Room::create($str);
//            $bed['magh_form_id']=$MaghFormSettingDetails->id;
////            $bed['bed_id'] =json_encode($request->input('bed_id'));
//            MaghFormSettingDetailsDetails::create($bed);
            $resp['success'] = true;
            $resp['message'] = 'MaghFormSettingDetails  saved';
            $resp['data']=$input;
            $resp['id']=$MaghFormSettingDetails->id;



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
        $MaghFormSettingDetails = MaghFormSettingDetails::findOrFail($id);
        $response = $MaghFormSettingDetails;
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
        $MaghFormSettingDetails = MaghFormSettingDetails::findOrFail($id);
        $response = $MaghFormSettingDetails;
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

        $MaghFormSettingDetails=MaghFormSettingDetails::find($id);
        $MaghFormSettingDetails->updated_by =  '_by';
        $MaghFormSettingDetails->update($request->all());
        return response()->json([
            "success" => true,
            "message" => "MaghFormSettingDetails Cost updated",
            "data" => $MaghFormSettingDetails
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
        $Signature=MaghFormSettingDetails::find($id);
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
