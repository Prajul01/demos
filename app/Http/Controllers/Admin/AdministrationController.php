<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdministrationRequest;
use App\Models\Administration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function store(Request $req)
    {

        $input = $req->all();
        $date = date('Y-m-d h:i:s');
        $administration = new Administration();
        $administration->school = $req->input('school');
        $administration->account = $req->input('account');
        $administration->amount = $req->input('amount');
        $administration->remark = $req->input('remark');
        $administration->grade = $req->input('grade');
        $administration->statestatus = $req->input('statestatus');
        $administration->finacialyear = $req->input('finacialyear');
        $administration->generated_by = $req->input('generated_by');
        $administration->state = $req->input('state');
        $administration->finacialyear = $req->input('finacialyear');


        $administration->created_at = $date;


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

//    public function search(Request $request){
//        $finacialyear = $request->input('finacialyear');
//        $generated_by = $request->input('generated_by');
//        $state = $request->input('state');
//        $statestatus = $request->input('statestatus');
//
//        $results = DB::table('administration')
//            ->where('finacialyear', '=', $finacialyear)
//            ->where('generated_by', '=', $generated_by)
//            ->where('state', '=', $state)
//            ->where('statestatus', '=', $statestatus)
//            ->get();
//
//        return response()->json($results);
//    }
    public function search(Request $request)
    {
        $filters = $request->only(['finacialyear','generated_by','state','statestatus']);

        $results = Administration::query();

        foreach ($filters as $key => $value) {
            if ($value) {
                $results = $results->whereRaw("LOWER($key) = LOWER(?)", [$value]);
            }
        }

        return response()->json($results->get());
    }
}
