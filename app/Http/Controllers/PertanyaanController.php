<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Pertanyaan;
use App\User;
use App\Vote_pertanyaan;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Question\Question;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    public function index()
    {
        $pertanyaans = Pertanyaan::all();
        return view('beranda.utama', ['pertanyaans' => $pertanyaans]);
    }

    public function index2()
    {
        $user = Auth::user();
        $pertanyaans = $user->pertanyaan;
        // $profile = User::where('name',Auth::user()->name)->first();
        // dd($vote);
        return view('profile.pertanyaan_pribadi', ['pertanyaans' => $pertanyaans, 'user' => $user]);
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
        $Question = new Pertanyaan;

        $Question->judul = $request->judulPertanyaan;
        $Question->isi = $request->isiPertanyaan;
        $Question->user_id = Auth::user()->id;

        $Question->save();

        return redirect('beranda');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
