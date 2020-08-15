<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jawaban;
use App\Tags;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Jawabancontroller extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('beranda.jawaban.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'isi' => 'required',
            'tag' => 'required'
        ]);

        $tags = explode(',', $request->tag);
        //buat id tampung
        // dd($tags);
        $tag_ids = [];
        //sava jika belum ada kalau sudah ada tampung
        foreach ($tags as $tag_nama) {
            $tag = Tags::where("nama_tag", $tag_nama)->first();

            if ($tag) {
                $tag_ids[] =  $tag->id;
            } else {
                $new_tag = Tags::create(["nama_tag" => $tag_nama]);
                $tag_ids[] = $new_tag->id;
            }
        }
        $jawaban = new Jawaban;
        $jawaban->isi = $request->isi;
        $jawaban->user_id = Auth::id();
        $jawaban->pertanyaan_id = $request->id_pertanyaan;
        $jawaban->save();
        $jawaban->tags()->sync($tag_ids);

        return redirect('/pertanyaan')->with('status_done', 'Pertanyaan Berhasil Ditambahkan');
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
        return view('beranda.jawaban.create',['id_pertanyaan'=>$id]);
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
