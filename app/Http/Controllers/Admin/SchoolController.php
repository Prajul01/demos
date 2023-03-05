<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SchoolRequest;
use App\Models\School;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {



        $school = School::where('delete_flg',0)->get();
        return response()->json([
            "success" => true,
            "message" => "School List",
            "data" => $school
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
    public function store(SchoolRequest $req)
    {
        $input = $req->all();
        $req->validate([

            'name' => 'required',
            'account' => 'required',
            'type' => 'required',
            'principal' => 'required',
            'phone' => 'required',
            'created_by'=>'required'
            ]);

        $date = date('Y-m-d h:i:s');
        $school = new School;
        $school->name = $req->input('name');
        $school->account = $req->input('account');
        $school->type = $req->input('type');
        $school->principal = $req->input('principal');
        $school->phone = $req->input('phone');
        $school->type = $req->input('type');
        $school->code = $req->input('code');
        $school->address = $req->input('address');
        $school->est_year = $req->input('est_year');
        $school->status = $req->input('status');
        $school->created_by =  'created_by';
//        $school->created_by = $req->input('created_by');

        $school->created_at = $date;
        $school->updated_at = $date;

        $resp = [
            'success' => false,
            'message' => 'Save failed'
        ];

        if($school->save()){
            $resp['success'] = true;
            $resp['message'] = 'User saved';
            $resp['data']=$input;
            $resp['id']=$school->id;



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
        $school = School::findOrFail($id);
        $response = $school;
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
        $school = School::findOrFail($id);
        $response = $school;
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
        $school = School::findOrFail($id);
//        school->save()
//        $school->update();
        $date = date('Y-m-d h:i:s');
        if($school->update()){
            $resp['success'] = true;
            $resp['message'] = 'User saved';
            $resp['data']=$school;
            $resp['id']=$school->id;
            $school->updated_at =$date;
            $school->updated_by="admintest";



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
        $Signature=School::find($id);
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
