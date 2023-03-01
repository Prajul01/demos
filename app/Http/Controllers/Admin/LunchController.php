<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LunchRequest;
use App\Models\Lunch;
use Illuminate\Http\Request;

class LunchController extends Controller
{
    public function list()
    {
        $Lunch = Lunch::all();
        return response()->json([
            "success" => true,
            "message" => "Lunch  List",
            "data" => $Lunch
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
    public function store(LunchRequest $req)
    {

        $input = $req->all();
        $date = date('Y-m-d h:i:s');
        $Lunch = new Lunch();
        $Lunch->school = $req->input('school');
        $Lunch->account = $req->input('account');
        $Lunch->total = $req->input('total');
        $Lunch->remark = $req->input('remark');
        $Lunch->finacialyear = $req->input('finacialyear');
        $Lunch->created_by =  'created_by';

        $Lunch->created_at = $date;
//        $Lunch->updated_at = $date;


        $resp = [
            'success' => false,
            'message' => 'Save failed'
        ];

        if($Lunch->save()){
            $resp['success'] = true;
            $resp['message'] = 'Lunch  saved';
            $resp['data']=$input;
            $resp['id']=$Lunch->id;
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
        $Lunch = Lunch::findOrFail($id);
        $response = $Lunch;
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
        $Lunch = Lunch::findOrFail($id);
        $response = $Lunch;
        return response()->json(["data" => $response]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LunchRequest $request, $id)
    {

        $Lunch=Lunch::find($id);
        $Lunch->updated_by =  '_by';
        $Lunch->update($request->all());
        return response()->json([
            "success" => true,
            "message" => "Lunch Cost updated",
            "data" => $Lunch
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
        $info=Lunch::where('id',$id)->get();
        Lunch::findOrFail($id)->delete();


        return response()->json(["message"=>'Lunch  deleted',"data" => $info,"success" => true]);

    }
}
