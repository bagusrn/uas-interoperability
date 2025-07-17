<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isNull;

class SewaKomikController extends Controller
{
    public function tambah_data(Request $request)
    {
        DB::table('komiks')->insert([$request->all()]);
        return response()->json($request->all());
    }

    public function show_data()
    {
        $dataKomik = DB::table('komiks')->whereNull('deleted_at')->get();
        return response()->json($dataKomik);
    }

    public function edit_data(Request $request)
    {
        $data = array(
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'genre' => $request->genre,
            'tahun_rilis' => $request->tahun_rilis,
            'harga_sewa' => $request->harga_sewa,
            'cover' => $request->cover,
            'status' => $request->status,
        );

        DB::table('komiks')->where('id', $request->id)->update($data);
        $dataEdit = DB::table('komiks')->where('id', $request->id)->first();

        return response()->json($dataEdit);
    }

    public function delete_data(Request $request)
    {
        DB::table('komiks')->where('id', $request->id)->update(['deleted_at' => Carbon::now()]);
        $dataEdit = DB::table('komiks')->where('id', $request->id)->first();

        return response()->json(['Status' => 'Data Berhasil Di Hapus']);
    }
}
