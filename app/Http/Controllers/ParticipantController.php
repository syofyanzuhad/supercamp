<?php

namespace App\Http\Controllers;

use App\Helpers\TwilioWhatsApp;
use App\Lesson;
use App\Participant;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Participant = Participant::all();
        if (count($Participant) == null) {
            return response()->json(['msg' => 'participant not found'], 404);
        }
        return response()->json($Participant);
    }

    public function show_registered() {
        $student = Participant::where('status_user', '4')
        ->join('classname', 'classname.id_classname', '=', 'participants.class')
        ->join('lessons', 'lessons.id', '=', 'participants.class')
        ->join('month', 'month.id_month', '=', 'participants.student_month')
        ->join('status', 'status.id_status', '=', 'participants.status_user')
        ->get();
        $no = 0;
            $data = array();
            foreach($student as $list){
            $no ++;
            $row = array();
            // $row[] = "<input type='checkbox' name='id[]'' value='".$list->id_participant."'>";
            $row[] = $no;
            $row[] = $list->classname;
            $row[] = $list->student_date;
            $row[] = $list->month;
            $row[] = $list->student_year;
            $row[] = $list->name;
            $row[] = $list->city;
            $row[] = $list->status;
            $row[] = "<div class='btn-group'>
                    <a onclick='editForm(".$list->id_participant.")' class='btn btn-primary btn-sm'><i class='fa fa-pencil'></i></a>
                    <a onclick='deleteData(".$list->id_participant.")' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></a></div>";
            $data[] = $row;
            }
            
            $output = array("data" => $data);
            return response()->json($output);
            // return datatables()->of($output)->make(true);

    }

    public function show_confirmed() {
        $student = Participant::where('status_user', '5')
        ->join('classname', 'classname.id_classname', '=', 'participants.class')
        ->join('lessons', 'lessons.id', '=', 'participants.class')
        ->join('month', 'month.id_month', '=', 'participants.student_month')
        ->join('status', 'status.id_status', '=', 'participants.status_user')
        ->get();
        $no = 0;
            $data = array();
            foreach($student as $list){
            $no ++;
            $row = array();
            // $row[] = "<input type='checkbox' name='id[]'' value='".$list->id_participant."'>";
            $row[] = $no;
            $row[] = $list->classname;
            $row[] = $list->student_date;
            $row[] = $list->month;
            $row[] = $list->student_year;
            $row[] = $list->name;
            $row[] = $list->city;
            $row[] = $list->status;
            $row[] = "<div class='btn-group'>
                    <a onclick='editForm(".$list->id_participant.")' class='btn btn-primary btn-sm'><i class='fa fa-pencil'></i></a>
                    <a onclick='deleteData(".$list->id_participant.")' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></a></div>";
            $data[] = $row;
            }
            
            $output = array("data" => $data);
            return response()->json($output);
            // return datatables()->of($output)->make(true);

    }

    public function show_participant() {
        $student = Participant::where('status_user', '6')
        ->join('classname', 'classname.id_classname', '=', 'participants.class')
        ->join('lessons', 'lessons.id', '=', 'participants.class')
        ->join('month', 'month.id_month', '=', 'participants.student_month')
        ->join('duration', 'duration.id_duration', '=', 'lessons.class_duration')
        ->join('status', 'status.id_status', '=', 'participants.status_user')
        ->get();
        $no = 0;
            $data = array();
            foreach($student as $list){
            $no ++;
            $row = array();
            // $row[] = "<input type='checkbox' name='id[]'' value='".$list->id_participant."'>";
            $row[] = $no;
            $row[] = $list->classname;
            $row[] = $list->student_date;
            $row[] = $list->month;
            $row[] = $list->student_year;
            $row[] = $list->name;
            $row[] = $list->city;
            $row[] = $list->status;
            $row[] = "<div class='btn-group'>
                    <a onclick='editForm(".$list->id_participant.")' class='btn btn-primary btn-sm'><i class='fa fa-pencil'></i></a>
                    <a onclick='deleteData(".$list->id_participant.")' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></a></div>";
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
            'nama' => 'required',
            'id_number' => 'required|unique:participants',
            'photo' => 'required',
            'phone' => 'required|integer|unique:participants',
            'email' => 'required|email|unique:participants',
            'kota' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'kelas' => 'required',
            'gelombang' => 'required|integer',
            'bulan_kelas' => 'required|integer',
            'tahun_kelas' => 'required|integer',
            'kaos' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json(
                $validator->errors()
            );
        }

        $lesson = Lesson::find($request->kelas)
                            ->where('class_wave', $request->gelombang)
                            ->where('class_month', $request->bulan_kelas)
                            ->where('class_year', $request->tahun_kelas)->first();
        if ($lesson->quota == 0) {
            return response()->json(['msg'=>"full"]);
        }
        elseif ($lesson->quota < 1) {
            $lesson->quota = 0;
            $lesson->status_lesson = 2;
        } elseif ($lesson->quota >= 0 ) {
            $lesson->quota -= 1;
            // $lesson->quota = 1;
        } 

        $student = Participant::create(
            [ 
                'id_number' => $request->id_number,
                'name' => $request->nama,
                'image' => $request->photo,
                'phone' => $request->phone,
                'email' => $request->email,
                'city' => $request->kota,
                'address' => $request->alamat,
                'birth_place' => $request->tempat_lahir,
                'birth_date' => $request->tanggal_lahir,
                'class' => $request->kelas,
                'student_date' => $request->gelombang,
                'student_month' => $request->bulan_kelas,
                'student_year' => $request->tahun_kelas,
                't_shirt' => $request->kaos
            ]
        );

        $twilio = new TwilioWhatsApp;
        $twilio->send(+6287837883448, "Nama = ".$request->nama." Nomer = https://api.whatsapp.com/send?phone=".$request->phone);

        if ($student->save() && $lesson->save()) {
            return response()->json(['msg'=>"succes"]);
        }
        return response()->json(['msg'=>"failed"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Participant  $Participant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Participant  $Participant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Participant::where('id_participant', $id)
        ->join('classname', 'classname.id_classname', '=', 'participants.class')
        // ->join('lessons', 'lessons.id', '=', 'participants.class')
        ->join('month', 'month.id_month', '=', 'participants.student_month')
        ->join('status', 'status.id_status', '=', 'participants.status_user')
        ->first();
        $lesson = DB::table('classname')->get();
        echo json_encode([$student, $lesson]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Participant  $Participant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [ 
            'nama' => 'required',
            'id_number' => 'required',
            // 'photo' => 'required',
            'phone' => 'required|integer',
            'email' => 'required|email',
            'kota' => 'required',
            'alamat' => 'required',
            'kelas' => 'required',
        ]);

        if($validator->fails())
        {
            return response()->json([

                'errors' => $validator->errors()->toJson(),'status' => 400
            ], 400);
        }

        $student = Participant::find($id);
        // dd($student);
            $student->id_number = $request->id_number;
            $student->name = $request->nama;
            $student->image = $request->photo;
            $student->phone = $request->phone;
            $student->email = $request->email;
            $student->city = $request->kota;
            $student->address = $request->alamat;
            $student->birth_place = $request->tempat_lahir;
            $student->birth_date = $request->tanggal_lahir;
            $student->class = $request->kelas;
            $student->student_date = $request->gelombang;
            $student->student_month = $request->month;
            $student->student_year = $request->tahun;
            $student->t_shirt = $request->kaos;
            $student->status_user = $request->status;

        if ($student->update()) {
            echo json_encode(array('msg'=>'success'));
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Participant  $Participant
     * @return \Illuminate\Http\Response
     */

    public function show_draft()
    {
        $draft = DB::table('draft')
        ->join('classname', 'classname.id_classname', '=', 'draft.class')
        ->join('lessons', 'lessons.id', '=', 'draft.class')
        ->join('month', 'month.id_month', '=', 'draft.student_month')
        ->join('duration', 'duration.id_duration', '=', 'lessons.class_duration')
        ->join('status', 'status.id_status', '=', 'draft.status_user')
        ->get();
        $no = 0;
            $data = array();
            foreach($draft as $list){
                // dd($draft);
            $no ++;
            $row = array();
            $row[] = "<input type='checkbox' name='id[]'' value='".$list->id_draft."'>";
            $row[] = $no;
            $row[] = $list->classname;
            $row[] = $list->student_date;
            $row[] = $list->month;
            $row[] = $list->student_year;
            $row[] = $list->name;
            $row[] = $list->city;
            $row[] = $list->status;
            $row[] = "<div class='btn-group'>
                    <a onclick='infoForm(".$list->id_draft.")' class='btn btn-primary btn-sm'><i class='fa fa-info'></i></a>
                    <a onclick='deleteData(".$list->id_draft.")' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></a></div>";
            $data[] = $row;
            }
            
            $output = array("data" => $data);
            return response()->json($output);
    }

    public function edit_draft($id)
    {
        $student = DB::table('draft')
        ->where('id_draft', $id)
        ->join('classname', 'classname.id_classname', '=', 'draft.class')
        ->join('month', 'month.id_month', '=', 'draft.student_month')
        ->join('status', 'status.id_status', '=', 'draft.status_user')
        ->first();
        $lesson = DB::table('classname')->get();
        echo json_encode([$student, $lesson]);
    }


    public function destroy($id)
    {
        $student = Participant::find($id);
        $lesson = Lesson::where('subject', $student->class)
                        ->where('class_wave', $student->student_date)
                        ->where('class_month', $student->student_month)
                        ->where('class_year', $student->student_year)->first();
        if ($lesson->quota >= 36)
        {
            $lesson->quota = 36;
            $lesson->status_lesson = 1;
        } elseif ($lesson->quota >= 0 && $lesson->quota < 36) 
        {
            $lesson->status_lesson = 1;
            $lesson->quota += 1;
        }
        $lesson->update();
        $draft = DB::table('draft')->where('id_number', $student->id_number)
        ->first();
        if ($draft != null) {
            // dd($draft);
            $drafts = DB::table('draft')->where('id_number', $student->id_number)->update(
                [
                    'id_number' => $student->id_number,
                    'name' => $student->name,
                    'image' => $student->image,
                    'phone' => $student->phone,
                    'email' => $student->email,
                    'city' => $student->city,
                    'address' => $student->address,
                    'birth_place' => $student->birth_place,
                    'birth_date' => $student->birth_date,
                    'class' => $student->class,
                    'student_date' => $student->student_date,
                    'student_month' => $student->student_month,
                    'student_year' => $student->student_year,
                    't_shirt' => $student->t_shirt

                ]
            );
        } else {
            // dd($draft);
            $drafts = DB::table('draft')->insert(
                [
                    'id_number' => $student->id_number,
                    'name' => $student->name,
                    'image' => $student->image,
                    'phone' => $student->phone,
                    'email' => $student->email,
                    'city' => $student->city,
                    'address' => $student->address,
                    'birth_place' => $student->birth_place,
                    'birth_date' => $student->birth_date,
                    'class' => $student->class,
                    'student_date' => $student->student_date,
                    'student_month' => $student->student_month,
                    'student_year' => $student->student_year,
                    't_shirt' => $student->t_shirt

                ]
            );
            // $drafts->save();
        }
        // dd($lesson);
        $student = Participant::find($id);
        $student->delete();
    }

    // public function deleteSelected(Request $request)
    // {
        
    //     // dd(count($request['id']));
    //     foreach($request['id'] as $id){
            
    //         // dd($id);
    //         $student = Participant::where('id_participant', $id)->first();
    //         // dd($student);
    //         $lesson = Lesson::where('subject', $student->class)
    //                         ->where('class_wave', $student->class_date)
    //                         ->where('class_month', $student->class_month)
    //                         ->where('class_year', $student->class_year)->first();
    //         if ($lesson->quota >= 36)
    //         {
    //             $lesson->quota = 36;
    //             $lesson->status_lesson = 1;
    //         } elseif ($lesson->quota >= 0) 
    //         {
    //             if (count($request['id']) > 2) {
    //                 $lesson->quota += (count($request['id']) / 2);
    //                 // $lesson->update();
    //             } elseif (count($request['id']) == 2) {
    //                 $lesson->quota += 2;
    //             }
    //             else {
    //                 $lesson->status_lesson = 1;
    //                 $lesson->quota += count($request['id']);
    //                 // $lesson->update();
    //                 dd($lesson->quota);
    //             }
    //         }
    //         $participant = Participant::find($id);
    //         // $participant->delete();
            
            
    //         ($lesson->quota) ? 36 : $lesson->quota = "36";
                
    //         dd($lesson->quota);
    //         // echo $lesson->quota;
    //     }
    // }
}
