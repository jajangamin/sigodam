<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //data pegawai by golongan


        $data['golongan'] =  DB::connection('mysql2')->table('peg_pakhir')
            ->select('ref_golruang.pangkat','peg_pakhir.kgolru', DB::raw("count(peg_pakhir.kgolru) as count"))
            ->join('ref_golruang','peg_pakhir.kgolru', '=', 'ref_golruang.kgolru')

            ->groupBy('peg_pakhir.kgolru')
            ->get();



        //jenis kelamin
        $data['jenis_kelamin'] =  DB::connection('mysql2')->table('peg_identpeg')
            ->select('ref_kelamin.nkelamin', DB::raw("count(peg_identpeg.kjkel) as count"))
            ->join('ref_kelamin','peg_identpeg.kjkel', '=', 'ref_kelamin.kjkel')
            ->groupBy('peg_identpeg.kjkel')
            ->get();

        //umur


        $data['umur']= DB::connection('mysql2')->table('peg_identpeg')
            ->select(
                DB::raw('(CASE
                  WHEN umur < 30 THEN "... - 30"
                  WHEN umur BETWEEN 30 AND 39 THEN "30 - 39"
                  WHEN umur BETWEEN 40 AND 49 THEN "40 - 49"
                  WHEN umur BETWEEN 50 AND 54 THEN "50 - 55"
                  WHEN umur BETWEEN 55 AND 57 THEN "55 - ..."
                  WHEN umur >= 58 THEN "58 - ..."
                  WHEN umur IS NULL THEN "(NULL)"
                  END
                   )AS range_umur,COUNT(*) AS jumlah'))
            ->from(DB::raw(" (SELECT tlahir,
       TIMESTAMPDIFF(YEAR, tlahir, CURDATE()) AS umur FROM peg_identpeg)  AS dummy_table "))
            ->groupBy('range_umur')
            ->orderBy('range_umur')
            ->get();



        return response()->json($data);
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
        //
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
