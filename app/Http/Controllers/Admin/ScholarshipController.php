<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ScholarshipRequest;
use App\Models\Scholarship;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    public function list()
    {



        $scholarship = Scholarship::where('delete_flg',0)->get();
        return response()->json([
            "success" => true,
            "message" => "Scholarship List",
            "data" => $scholarship,
//            "id"=>auth()->user()->id
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
        $req->validate([
//            $validator = Validated::make($req->all(), [
                'school' => 'required',
            'account' => 'required',
            'total' => 'required',
            'remark' => 'required',
            'finacialyear' => 'required',
            'created_by' => 'required',
            ]);
//        ]);


        $date = date('Y-m-d h:i:s');
        $scholarship = new Scholarship();
        $scholarship->school = $req->input('school');
        $scholarship->account = $req->input('account');
        $scholarship->total = $req->input('total');
        $scholarship->remark = $req->input('remark');
        $scholarship->year = $req->input('year');
        $scholarship->created_by =  $req->input('created_by');

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
            $resp['success'] = false;
            $resp['message'] = 'Scholarship not saved';




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
        $scholarship = Scholarship::findOrFail($id);
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
        $scholarship = Scholarship::findOrFail($id);
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
        $scholarship = Scholarship::findOrFail($id);
//        school->save()
//        $scholarship->update();
        $date = date('Y-m-d h:i:s');
        if($scholarship->update()){
            $resp['success'] = true;
            $resp['message'] = 'User saved';
            $resp['data']=$scholarship;
            $resp['id']=$scholarship->id;
            $scholarship->updated_at =$date;
            $scholarship->updated_by="admintest";



        }else{



        }
        return response()->json($resp);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request,$id)
    {
        $Signature=Scholarship::find($id);
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
