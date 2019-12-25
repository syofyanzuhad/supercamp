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
        $this->kelas = DB::table('classname')->get();
        $this->draft = DB::table('draft')->get();
        $this->mentor = DB::table('mentor')->get();
        $this->pendaftar = DB::table('participants')->whereIn('status_user', ['4', '5'])
        ->get();
        $this->peserta = DB::table('participants')->where('status_user', '6')
        ->get();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kelas = $this->kelas;
        $draft = $this->draft;
        $mentor = $this->mentor;
        $pendaftar = $this->pendaftar;
        $peserta = $this->peserta;
        return view('home', compact('kelas', 'mentor', 'pendaftar', 'peserta', 'draft'));
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
        $kelas = $this->kelas;
        $draft = $this->draft;
        $mentor = $this->mentor;
        $pendaftar = $this->pendaftar;
        $peserta = $this->peserta;
        // if (count($Lesson) == null) {
        //     return response()->json(['msg' => 'lesson not found'], 404);
        // }
        return view('kelas/kelas', compact('Lesson', 'kelas', 'mentor', 'pendaftar', 'peserta', 'draft',  'status', 'month'));

    }
    public function mentor()
    {
        $kelas = $this->kelas;
        $draft = $this->draft;
        $mentor = $this->mentor;
        $pendaftar = $this->pendaftar;
        $peserta = $this->peserta;
        return view('mentor/mentor', compact('kelas', 'mentor', 'pendaftar', 'peserta', 'draft'));
    }
    public function pendaftar()
    {
        $status = DB::table('status')->get();
        $kelas = $this->kelas;
        $draft = $this->draft;
        $mentor = $this->mentor;
        $pendaftar = $this->pendaftar;
        $peserta = $this->peserta;
        return view('pendaftar/pendaftar', compact('status', 'kelas', 'mentor', 'pendaftar', 'peserta', 'draft'));
    }
    public function konfirmasi()
    {
        $status = DB::table('status')->get();
        $kelas = $this->kelas;
        $draft = $this->draft;
        $mentor = $this->mentor;
        $pendaftar = $this->pendaftar;
        $peserta = $this->peserta;
        return view('konfirmasi/konfirmasi', compact('status', 'kelas', 'mentor', 'pendaftar', 'peserta', 'draft'));
    }
    public function peserta()
    {
        $status = DB::table('status')->get();
        $kelas = $this->kelas;
        $draft = $this->draft;
        $mentor = $this->mentor;
        $pendaftar = $this->pendaftar;
        $peserta = $this->peserta;
        return view('peserta/peserta', compact('status', 'kelas', 'mentor', 'pendaftar', 'peserta', 'draft'));
    }
    public function pelajaran()
    {
        $status = DB::table('status')->get();
        $kelas = $this->kelas;
        $draft = $this->draft;
        $mentor = $this->mentor;
        $pendaftar = $this->pendaftar;
        $peserta = $this->peserta;
        return view('settings/pelajaran', compact('status', 'kelas', 'mentor', 'pendaftar', 'peserta', 'draft'));
    }
    public function administrasi()
    {
        $kelas = $this->kelas;
        $draft = $this->draft;
        $mentor = $this->mentor;
        $pendaftar = $this->pendaftar;
        $peserta = $this->peserta;
        return view('administrasi', compact('kelas', 'mentor', 'pendaftar', 'peserta', 'draft'));
    }
    public function laporan()
    {
        $kelas = $this->kelas;
        $draft = $this->draft;
        $mentor = $this->mentor;
        $pendaftar = $this->pendaftar;
        $peserta = $this->peserta;
        return view('laporan', compact('kelas', 'mentor', 'pendaftar', 'peserta', 'draft'));
    }
    public function user()
    {
        $kelas = $this->kelas;
        $draft = $this->draft;
        $mentor = $this->mentor;
        $pendaftar = $this->pendaftar;
        $peserta = $this->peserta;
        return view('user', compact('kelas', 'mentor', 'pendaftar', 'peserta', 'draft'));
    }
    public function status()
    {
        $status = DB::table('status')->get();
        $kelas = $this->kelas;
        $draft = $this->draft;
        $mentor = $this->mentor;
        $pendaftar = $this->pendaftar;
        $peserta = $this->peserta;
        return view('settings/status', compact('status', 'kelas', 'mentor', 'pendaftar', 'peserta', 'draft'));
    }
    public function draft()
    {
        $status = DB::table('status')->get();
        $draft = DB::table('draft')->get();
        $kelas = $this->kelas;
        $draft = $this->draft;
        $mentor = $this->mentor;
        $pendaftar = $this->pendaftar;
        $peserta = $this->peserta;
        return view('settings/draft', compact('kelas', 'mentor', 'pendaftar', 'peserta', 'draft',  'draft', 'status'));
    }


}
