<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{
    public function store_status(Request $request)
    {
        $status = DB::table('status')
        ->insert(
            [
                'status' => $request->status
            ]
        );
        if ($status = true) {
            return response()->json(['msg'=>"succes"]);
        }
        return response()->json(['msg'=>"failed"]);
    }

    public function show_status()
    {
        $status = DB::table('status')->get();
        $no = 0;
        $data = array();
        foreach($status as $list){
        $no ++;
        $row = array();
        $row[] = "<input type='checkbox' name='id[]'' value='".$list->id_status."'>";
        $row[] = $no;
        $row[] = $list->status;
        $row[] = "<div class='btn-group'>
                <a onclick='editForm(".$list->id_status.")' class='btn btn-primary btn-sm'><i class='fa fa-pencil'></i></a>
                <a onclick='deleteData(".$list->id_status.")' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></a></div>";
        $data[] = $row;
        }
        
        $output = array("data" => $data);
        return response()->json($output);
        // return response()->json($classname);
    }

    public function edit_status($id)
    {
        $status = DB::table('status')->where('id_status',$id)->first();
        echo json_encode([$status]);
    }

    public function update_status(Request $request, $id)
    {
        $status = DB::table('status')->where('id_status',$id)
        ->update(
            [
                'status' => $request->status
            ]
        );

        if ($status = true) {
            echo json_encode(array('msg'=>'success'));
        }
    }

    public function destroy_status($id)
    {
        $item = DB::table('status')->where('id_status', $id);
        $item->delete();
    }

    public function deleteSelected_status(Request $request)
    {
        // dd($request);
        foreach($request['id'] as $id){
            $status = DB::table('status')->where('id_status', $id);
            $status->delete();
        }
    }

}
