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
    public function store(Request $req)
    {


        $file = $req->file('logo');
        if ($req->hasFile("logo")) {
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/images/logo'), $fileName);
            $req->request->add(['logo' => $fileName]);
        }
        $School = new School();

        $School->logo = $req->input('logo');
        $School->school_type = $req->input('school_type');
        $School->school = $req->input('school');
        $School->tole = $req->input('tole');
        $School->title_nepali = $req->input('title_nepali');
        $School->est_year = $req->input('est_year');
        $School->school_code = $req->input('school_code');
        $School->principal_name = $req->input('principal_name');
        $School->school_email = $req->input('school_email');
        $School->school_phone = $req->input('school_phone');
        $School->ward_no = $req->input('ward_no');
        $School->school_level = $req->input('school_level');
        $School->class_eight = $req->input('class_eight');
        $School->enroll_class = $req->input('enroll_class');
        $School->principal_no = $req->input('principal_no');
        $School->principal_email = $req->input('principal_email');
        $School->bank_name = $req->input('bank_name');
        $School->account_no = $req->input('account_no');
        $School->status = $req->input('status');
        $School->status = $req->input('moto');
        $School->created_by = $req->input('created_by');
        $School->delete_flg = $req->input('delete_flg');
        $School->is_draft = $req->input('is_draft');
        $resp = [
            'success' => false,
            'message' => 'Save failed'
        ];

        if($School->save()){
            $resp['success'] = true;
            $resp['message'] = 'School saved';
            $resp['data']=$School;
            //$resp['id']=$school->id;
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
        $school->updated_by = $request->input('updated_by');

        //$bed=Bed::find($id);
        $school->update($request->all());
        $date = date('Y-m-d h:i:s');
        if($school->update()){
            $resp['success'] = true;
            $resp['message'] = 'User Updated';
            $resp['data']=$school;
            $resp['id']=$school->id;
            $school->updated_at =$date;
            //$school->updated_by="admintest";
            //$school->delete_flg="1";



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
