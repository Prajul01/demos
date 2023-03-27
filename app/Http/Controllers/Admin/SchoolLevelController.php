<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SchoolLevelController extends Controller
{
    public function list()
    {
        $SchoolLevel = SchoolLevel::where('delete_flg',0)->get();
        return response()->json([
            "success" => true,
            "message" => "SchoolLevel  List",
            "data" => $SchoolLevel
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

        $SchoolLevel = SchoolLevel::create($req->all());



        $resp = [
            'success' => false,
            'message' => 'Save failed'
        ];

        if($SchoolLevel->save()){
            $resp['success'] = true;
            $resp['message'] = 'SchoolLevel  saved';
            $resp['data']=$input;
            $resp['id']=$SchoolLevel->id;



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
        $SchoolLevel = SchoolLevel::findOrFail($id);
        $response = $SchoolLevel;
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
        $SchoolLevel = SchoolLevel::findOrFail($id);
        $response = $SchoolLevel;
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

        $SchoolLevel=SchoolLevel::find($id);
        $SchoolLevel->updated_by =  $req->input('updated_by');
        $SchoolLevel->update($req->all());
        return response()->json([
            "success" => true,
            "message" => "SchoolLevel  updated",
            "data" => $SchoolLevel
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
        $SchoolLevel=SchoolLevel::find($id);
        $SchoolLevel->delete_flg =  '1';
        $SchoolLevel->update($req->all());
        $resp = [
            'success' => True,
            'message' => 'Data Deleted',
            'data'=>$SchoolLevel,
        ];
        return response()->json($resp);
    }


    public function search(Request $request)
    {
        $filters = $request->only(['form_name', 'form_type', 'report']);

        $results = SchoolLevel::query();

        foreach ($filters as $key => $value) {
            if ($value) {
                $results = $results->whereRaw("LOWER($key) = LOWER(?)", [$value]);
            }
        }

        return response()->json($results->get());
    }
}
