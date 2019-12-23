<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Lesson = Lesson::leftJoin('classname', 'classname.id_classname', '=', 'lessons.subject')
        ->join('date', 'date.id_date', '=', 'lessons.class_date')
        ->join('month', 'month.id_month', '=', 'lessons.class_month')
        ->join('duration', 'duration.id_duration', '=', 'lessons.class_duration')
        ->join('status', 'status.id_status', '=', 'lessons.status_lesson')
        ->get();
        if (count($Lesson) == null) {
            return response()->json(['msg' => 'lesson not found'], 404);
        }
        return response()->json($Lesson);
    }

    public function show_all() 
    {
        $lessons = Lesson::leftJoin('classname', 'classname.id_classname', '=', 'lessons.subject')
        ->Join('date', 'date.id_date', '=', 'lessons.class_date')
        ->join('month', 'month.id_month', '=', 'lessons.class_month')
        ->join('duration', 'duration.id_duration', '=', 'lessons.class_duration')
        ->join('status', 'status.id_status', '=', 'lessons.status_lesson')
        ->get();
        // dd($lessons);
            $no = 0;
            $data = array();
            foreach($lessons as $list){
            $no ++;
            $row = array();
            $row[] = "<input type='checkbox' name='id[]'' value='".$list->id."'>";
            $row[] = $no;
            $row[] = $list->classname;
            $row[] = $list->quota;
            $row[] = $list->class_wave;
            $row[] = $list->date;
            $row[] = $list->month;
            $row[] = $list->class_year;
            $row[] = $list->duration;
            $row[] = $list->status;
            $row[] = "<div class='btn-group'>
                    <a onclick='editForm(".$list->id.")' class='btn btn-primary btn-sm'><i class='fa fa-pencil'></i></a>
                    <a onclick='deleteData(".$list->id.")' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></a></div>";
            $data[] = $row;
            }
            
            $output = array("data" => $data);
            return response()->json($output);
            // return datatables()->of($output)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $classname = DB::table('classname')
        // ->insert(
        //     [
        //         'classname' => $request->kelas
        //     ]
        // );
        // $subject = DB::table('classname')->orderByDesc('id_classname')->first('id_classname');
        // dd($subject);
        $lesson = Lesson::create([
            'subject' => $request->kelas,
            'class_wave' => $request->gelombang,
            'class_date' => $request->gelombang,
            'class_month' => $request->bulan,
            'class_year' => $request->tahun,
            'class_duration' => $request->gelombang,
            'status_lesson' => $request->status,
        ]);

        if ($lesson->save()) {
            return response()->json(['msg'=>"succes"]);
        }
        return response()->json(['msg'=>"failed"]);
    }

    public function store_classname(Request $request)
    {
        $classname = DB::table('classname')
        ->insert(
            [
                'classname' => $request->kelas
            ]
        );
        if ($classname = true) {
            return response()->json(['msg'=>"succes"]);
        }
        return response()->json(['msg'=>"failed"]);
        // dd($subject);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show_classname(Lesson $lesson)
    {
        $classname = DB::table('classname')->get();
        $no = 0;
        $data = array();
        foreach($classname as $list){
        $no ++;
        $row = array();
        $row[] = "<input type='checkbox' name='id[]'' value='".$list->id_classname."'>";
        $row[] = $no;
        $row[] = $list->classname;
        $row[] = "<div class='btn-group'>
                <a onclick='editForm(".$list->id_classname.")' class='btn btn-primary btn-sm'><i class='fa fa-pencil'></i></a>
                <a onclick='deleteData(".$list->id_classname.")' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></a></div>";
        $data[] = $row;
        }
        
        $output = array("data" => $data);
        return response()->json($output);
        // return response()->json($classname);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson, $id)
    {
        $Lesson = Lesson::where('id', $id)
        ->join('classname', 'classname.id_classname', '=', 'lessons.subject')
        ->join('date', 'date.id_date', '=', 'lessons.class_wave')
        ->join('month', 'month.id_month', '=', 'lessons.class_month')
        ->join('duration', 'duration.id_duration', '=', 'lessons.class_duration')
        ->join('status', 'status.id_status', '=', 'lessons.status_lesson')
        ->first();
        echo json_encode([$Lesson]);
    }
    public function edit_classname($id)
    {
        $classname = DB::table('classname')->where('id_classname',$id)->first();
        echo json_encode([$classname]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update_classname(Request $request, $id)
    {
        $classname = DB::table('classname')->where('id_classname',$id)
        ->update(
            [
                'classname' => $request->kelas
            ]
        );

        if ($classname = true) {
            echo json_encode(array('msg'=>'success'));
        }

        // dd($request);
    }
    public function update(Request $request, $id)
    {
            // $classname = DB::table('classname')->where('id_classname',$request->class)
            // ->update(
            //     [
            //         'classname' => $request->kelas
            //     ]
            // );
    
            // dd($request);
            $lesson = Lesson::find($id);
            $lesson->subject = $request->kelas;
            $lesson->class_date = $request->gelombang;
            $lesson->class_month = $request->bulan;
            $lesson->class_year = $request->tahun;
            $lesson->status_lesson = $request->status;
        
        if ($lesson->update()) {
            echo json_encode(array('msg'=>'success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Lesson::find($id);
        $item->delete();
    }
    public function destroy_classname($id)
    {
        $item = DB::table('classname')->where('id_classname', $id);
        $item->delete();
    }

    public function deleteSelected(Request $request)
    {
        // dd($request);
        foreach($request['id'] as $id){
            $lesson = Lesson::find($id);
            $lesson->delete();
        }
    }
    public function deleteSelected_classname(Request $request)
    {
        // dd($request);
        foreach($request['id'] as $id){
            $classname = DB::table('classname')->where('id_classname', $id);
            $classname->delete();
        }
    }
}
