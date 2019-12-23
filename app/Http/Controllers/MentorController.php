<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MentorController extends Controller
{
    public function store_mentor(Request $request)
    {
        $mentor = DB::table('mentor')
        ->insert(
            [
                'mentor' => $request->mentor
            ]
        );
        if ($mentor = true) {
            return response()->json(['msg'=>"succes"]);
        }
        return response()->json(['msg'=>"failed"]);
    }

    public function show_mentor()
    {
        $mentor = DB::table('mentor')->get();
        $no = 0;
        $data = array();
        foreach($mentor as $list){
        $no ++;
        $row = array();
        $row[] = "<input type='checkbox' name='id[]'' value='".$list->id_mentor."'>";
        $row[] = $no;
        $row[] = $list->mentor;
        $row[] = "<div class='btn-group'>
                <a onclick='editForm(".$list->id_mentor.")' class='btn btn-primary btn-sm'><i class='fa fa-pencil'></i></a>
                <a onclick='deleteData(".$list->id_mentor.")' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></a></div>";
        $data[] = $row;
        }
        
        $output = array("data" => $data);
        return response()->json($output);
        // return response()->json($classname);
    }

    public function edit_mentor($id)
    {
        $mentor = DB::table('mentor')->where('id_mentor',$id)->first();
        echo json_encode([$mentor]);
    }

    public function update_mentor(Request $request, $id)
    {
        $mentor = DB::table('mentor')->where('id_mentor',$id)
        ->update(
            [
                'mentor' => $request->mentor
            ]
        );

        if ($mentor = true) {
            echo json_encode(array('msg'=>'success'));
        }
    }

    public function destroy_mentor($id)
    {
        $item = DB::table('mentor')->where('id_mentor', $id);
        $item->delete();
    }

    public function deleteSelected_mentor(Request $request)
    {
        // dd($request);
        foreach($request['id'] as $id){
            $mentor = DB::table('mentor')->where('id_mentor', $id);
            $mentor->delete();
        }
    }

}
