<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kelas = DB::table('classname')->get();
        $mentor = DB::table('mentor')->get();
        $pendaftar = DB::table('participants')->whereIn('status_user', ['4', '5'])
        ->get();
        $peserta = DB::table('participants')->where('status_user', '6')
        ->get();
        return view('home', compact('kelas', 'mentor', 'pendaftar', 'peserta'));
    }
    public function kelas()
    {
        $status = DB::table('status')->get();
        $month = DB::table('month')->get();
        $Lesson = DB::table('lessons')->leftJoin('classname', 'classname.id_classname', '=', 'lessons.subject')
        ->join('date', 'date.id_date', '=', 'lessons.class_date')
        ->join('month', 'month.id_month', '=', 'lessons.class_month')
        ->join('duration', 'duration.id_duration', '=', 'lessons.class_duration')
        ->join('status', 'status.id_status', '=', 'lessons.status_lesson')
        ->get();
        $kelas = DB::table('classname')->get();
        $mentor = DB::table('mentor')->get();
        $pendaftar = DB::table('participants')->whereIn('status_user', ['4', '5'])
        ->get();
        $peserta = DB::table('participants')->where('status_user', '6')
        ->get();
        // if (count($Lesson) == null) {
        //     return response()->json(['msg' => 'lesson not found'], 404);
        // }
        return view('kelas/kelas', compact('Lesson', 'kelas', 'mentor', 'pendaftar', 'peserta', 'status', 'month'));

    }
    public function mentor()
    {
        $kelas = DB::table('classname')->get();
        $mentor = DB::table('mentor')->get();
        $pendaftar = DB::table('participants')->whereIn('status_user', ['4', '5'])
        ->get();
        $peserta = DB::table('participants')->where('status_user', '6')
        ->get();
        return view('mentor/mentor', compact('kelas', 'mentor', 'pendaftar', 'peserta'));
    }
    public function pendaftar()
    {
        $status = DB::table('status')->get();
        $kelas = DB::table('classname')->get();
        $mentor = DB::table('mentor')->get();
        $pendaftar = DB::table('participants')->whereIn('status_user', ['4', '5'])
        ->get();
        $peserta = DB::table('participants')->where('status_user', '6')
        ->get();
        return view('pendaftar/pendaftar', compact('status', 'kelas', 'mentor', 'pendaftar', 'peserta'));
    }
    public function konfirmasi()
    {
        $status = DB::table('status')->get();
        $kelas = DB::table('classname')->get();
        $mentor = DB::table('mentor')->get();
        $pendaftar = DB::table('participants')->whereIn('status_user', ['4', '5'])
        ->get();
        $peserta = DB::table('participants')->where('status_user', '6')
        ->get();
        return view('konfirmasi/konfirmasi', compact('status', 'kelas', 'mentor', 'pendaftar', 'peserta'));
    }
    public function peserta()
    {
        $status = DB::table('status')->get();
        $kelas = DB::table('classname')->get();
        $mentor = DB::table('mentor')->get();
        $pendaftar = DB::table('participants')->whereIn('status_user', ['4', '5'])
        ->get();
        $peserta = DB::table('participants')->where('status_user', '6')
        ->get();
        return view('peserta/peserta', compact('status', 'kelas', 'mentor', 'pendaftar', 'peserta'));
    }
    public function pelajaran()
    {
        $status = DB::table('status')->get();
        $kelas = DB::table('classname')->get();
        $mentor = DB::table('mentor')->get();
        $pendaftar = DB::table('participants')->whereIn('status_user', ['4', '5'])
        ->get();
        $peserta = DB::table('participants')->where('status_user', '6')
        ->get();
        return view('settings/pelajaran', compact('status', 'kelas', 'mentor', 'pendaftar', 'peserta'));
    }
    public function administrasi()
    {
        $kelas = DB::table('classname')->get();
        $mentor = DB::table('mentor')->get();
        $pendaftar = DB::table('participants')->whereIn('status_user', ['4', '5'])
        ->get();
        $peserta = DB::table('participants')->where('status_user', '6')
        ->get();
        return view('administrasi', compact('kelas', 'mentor', 'pendaftar', 'peserta'));
    }
    public function laporan()
    {
        $kelas = DB::table('classname')->get();
        $mentor = DB::table('mentor')->get();
        $pendaftar = DB::table('participants')->whereIn('status_user', ['4', '5'])
        ->get();
        $peserta = DB::table('participants')->where('status_user', '6')
        ->get();
        return view('laporan', compact('kelas', 'mentor', 'pendaftar', 'peserta'));
    }
    public function user()
    {
        $kelas = DB::table('classname')->get();
        $mentor = DB::table('mentor')->get();
        $pendaftar = DB::table('participants')->whereIn('status_user', ['4', '5'])
        ->get();
        $peserta = DB::table('participants')->where('status_user', '6')
        ->get();
        return view('user', compact('kelas', 'mentor', 'pendaftar', 'peserta'));
    }
    public function status()
    {
        $status = DB::table('status')->get();
        $kelas = DB::table('classname')->get();
        $mentor = DB::table('mentor')->get();
        $pendaftar = DB::table('participants')->whereIn('status_user', ['4', '5'])
        ->get();
        $peserta = DB::table('participants')->where('status_user', '6')
        ->get();
        return view('settings/status', compact('status', 'kelas', 'mentor', 'pendaftar', 'peserta'));
    }

}
