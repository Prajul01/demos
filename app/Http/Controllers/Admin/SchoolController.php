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



        $school = School::all();
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
    public function update(SchoolRequest $request, $id)
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
    public function destroy($id)
    {
        $info=School::where('id',$id)->get();
        School::findOrFail($id)->delete();


        return response()->json(["message"=>'school deleted',"data" => $info,"success" => true]);
//        return response()->json(["data" =>
// ["success" => true]
//]);
    }
}
