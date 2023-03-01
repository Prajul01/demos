<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StudyMaterialRequest;
use App\Models\StudyMaterial;
use Illuminate\Http\Request;

class StudyMaterialController extends Controller
{
    public function list()
    {



        $scholarship = StudyMaterial::all();
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
    public function store(StudyMaterialRequest $req)
    {

        $input = $req->all();




        $date = date('Y-m-d h:i:s');
        $scholarship = new StudyMaterial();
        $scholarship->school = $req->input('school');
        $scholarship->account = $req->input('account');
        $scholarship->total = $req->input('total');
        $scholarship->remark = $req->input('remark');
        $scholarship->finacialyear = $req->input('finacialyear');
        $scholarship->created_by =  'created_by';

        $scholarship->created_at = $date;
//        $scholarship->updated_at = $date;


        $resp = [
            'success' => false,
            'message' => 'Save failed'
        ];

        if($scholarship->save()){
            $resp['success'] = true;
            $resp['message'] = 'Scholarship saved';
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
    public function update(StudyMaterialRequest $request, $id)
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
    public function destroy($id)
    {
        $info=StudyMaterial::where('id',$id)->get();
        StudyMaterial::findOrFail($id)->delete();


        return response()->json(["message"=>'StudyMaterial deleted',"data" => $info,"success" => true]);

    }
}
