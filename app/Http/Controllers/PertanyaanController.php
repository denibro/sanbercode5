<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Pertanyaan;
use App\Jawaban;
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
        foreach ($pertanyaans as $pertanyaan) {
            $name = $pertanyaan->user_id;
            $name = User::find($name)->name;
            $names[] = $name; 
        }
        // dd($names[2]);
        // $pertanyaans->nama = User::where('id',$pertanyaans->user_id)->first();
        return view('beranda.utama', ['pertanyaans'=>$pertanyaans,'names'=>$names]);
        
    }



    public function index2()
    {
        $user = Auth::user();
        $pertanyaans = $user->pertanyaan;

        // $profile = User::where('name',Auth::user()->name)->first();
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
        $jawabans = Jawaban::where('pertanyaan_id',$id)->get();
        // dd($jawabans);
        return redirect('/profile')->with('jawabans',$jawabans);
    }
    public function show_umum($id)
    {
        $jawabans = Jawaban::where('pertanyaan_id',$id)->get();
        // dd($jawabans);
        return redirect('/pertanyaan')->with('jawabans',$jawabans);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = user::find($id);
        return view('profile.ubah_profile', compact('user') );
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
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->updated_at = now();
        $user->save();
        // dd($user);
        return redirect('/profile')->with('status_ubah','Pertanyaan Berhasil Diubah');
    }
    public function update2(Request $request, $id)
    {
        $jawaban = Jawaban::where('id_jawaban',$id)->first();
        $pertanyaan = Pertanyaan::where('id_pertanyaan',$jawaban->pertanyaan_id)->first();
        if($pertanyaan->ket == 'pertanyaan selesai dipilih')
        {
            return redirect('/profile')->with('pernah_diubah','Pertanyaan sudah pernah dipilih');
        }
        else
        {
            $pertanyaan->ket = 'pertanyaan selesai dipilih';
            $pertanyaan->save();
            $user = User::where('id',$jawaban->user_id)->first();
            $user->jml_reputasi += 15;
            $user->save();
            return redirect('/profile');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jawabans = Jawaban::where('pertanyaan_id',$id)->delete();
        $pertanyaan = Pertanyaan::find($id);
        $pertanyaan->delete();

        return redirect('/profile')->with('status','Pertanyaan Berhasil Dihapus');
    }
}
