<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StudyMaterialRequest;
use App\Models\StudyMaterial;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudyMaterialController extends Controller
{
    public function list()
    {



        $scholarship = StudyMaterial::where('delete_flg',0)->get();
        return response()->json([
            "success" => true,
            "message" => "Study Material List",
            "data" => $scholarship
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




//        $date = date('Y-m-d h:i:s');
//        $scholarship = new StudyMaterial();
//        $scholarship->school = $req->input('school');
//        $scholarship->account = $req->input('account');
//        $scholarship->total = $req->input('total');
//        $scholarship->remark = $req->input('remark');
//        $scholarship->finacialyear = $req->input('finacialyear');
//        $scholarship->created_by =  'created_by';
//
//        $scholarship->created_at = $date;

//        $scholarship->updated_at = $date;
        $scholarship=StudyMaterial::create($req->all());
//        return$scholarship ;


        $resp = [
            'success' => false,
            'message' => 'Save failed'
        ];

        if($scholarship->save()){
            $resp['success'] = true;
            $resp['message'] = 'Studymaterial saved';
            $resp['data']=$input;
            $resp['id']=$scholarship->id;



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
        $scholarship = StudyMaterial::findOrFail($id);
        $response = $scholarship;
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
        $scholarship = StudyMaterial::findOrFail($id);
        $response = $scholarship;
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

        $scholarship=StudyMaterial::find($id);
        $scholarship->update($request->all());
        return response()->json([
            "success" => true,
            "message" => "Study Material updated",
            "data" => $scholarship
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
        $Signature=StudyMaterial::find($id);
        $Signature->delete_flg =  '1';
        $Signature->update($request->all());
        $resp = [
            'success' => True,
            'message' => 'Data Deleted',
            'data'=>$Signature,
        ];
        return response()->json($resp);
    }
    public function search(Request $request)
    {
        $filters = $request->only(['educationyear','generated_by','state','statestatus']);

        $results = StudyMaterial::query();

        foreach ($filters as $key => $value) {
            if ($value) {
                $results = $results->whereRaw("LOWER($key) = LOWER(?)", [$value]);
            }
        }

        return response()->json($results->get());
    }
}
