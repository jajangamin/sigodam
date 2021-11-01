<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DB;

class DashboardController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // endpoint API
        $perda = Http::acceptJson()->get('https://jdih.ciamiskab.go.id/api/get_perda_count');
        $perbup = Http::acceptJson()->get('https://jdih.ciamiskab.go.id/api/get_perbup_count');
        $perda_year = Http::acceptJson()->get('https://jdih.ciamiskab.go.id/api/get_perda_by_tahun');
        $perbup_year = Http::acceptJson()->get('https://jdih.ciamiskab.go.id/api/get_perbup_by_tahun');
        // json_decode
        $perda = json_decode($perda);
        $perbup = json_decode($perbup);
        $t_perbup = json_decode($perda_year);
        $t_peda = json_decode($perbup_year);

        $datagol =  DB::connection('mysql2')->table('peg_pakhir')
            ->select('ref_golruang.pangkat','peg_pakhir.kgolru', DB::raw("count(peg_pakhir.kgolru) as count"))
            ->join('ref_golruang','peg_pakhir.kgolru', '=', 'ref_golruang.kgolru')

            ->groupBy('peg_pakhir.kgolru')
            ->get();
//            ->toArray();
        $pangkat = $datagol->pluck('pangkat');
        $jml_pangkat = $datagol->pluck('count');
        //jenis kelamin
        $datajk=  DB::connection('mysql2')->table('peg_identpeg')
            ->select('ref_kelamin.nkelamin', DB::raw("count(peg_identpeg.kjkel) as count"))
            ->join('ref_kelamin','peg_identpeg.kjkel', '=', 'ref_kelamin.kjkel')
            ->groupBy('peg_identpeg.kjkel')
            ->get();
        $jk = $datajk->pluck('nkelamin');
        $jml_jk  = $datajk->pluck('count');
        //umur
        $dataumur = DB::connection('mysql2')->table('peg_identpeg')
            ->select(
                DB::raw('(CASE
                WHEN umur BETWEEN 17 AND 19 THEN "17 - 19"
                  WHEN umur BETWEEN 20 AND 29 THEN "20 - 29"
                  WHEN umur BETWEEN 30 AND 39 THEN "30 - 39"
                  WHEN umur BETWEEN 40 AND 49 THEN "40 - 49"
                  WHEN umur BETWEEN 50 AND 59 THEN "50 - 59"
                  WHEN umur >= 60 THEN "60"
                  END
                   )AS range_umur,COUNT(*) AS jumlah')
            )
            ->from(DB::raw(" (SELECT tlahir,
       TIMESTAMPDIFF(YEAR, tlahir, CURDATE()) AS umur FROM peg_identpeg where  DAYNAME(tlahir) IS NOT NULL
       )   AS dummy_table   "))
            ->groupBy('range_umur')
            ->orderBy('range_umur')
            ->get();
        $umur = $dataumur->pluck('range_umur');
        $jml_umur  = $dataumur->pluck('jumlah');
//        return response()->json($data);
        return view('dashboard', [
            'pangkat'=> $pangkat, 
            'jml_pangkat' => $jml_pangkat,
            'jk'=> $jk, 
            'jml_jk' => $jml_jk,
            'umur'=> $umur, 
            'jml_umur' => $jml_umur,
            'total_perda' => $perda,
            'total_perbup' => $perbup
        ]);
    }

    public function jdih()
    {
          // endpoint API
          $perda = Http::acceptJson()->get('https://jdih.ciamiskab.go.id/api/get_perda_count');
          $perbup = Http::acceptJson()->get('https://jdih.ciamiskab.go.id/api/get_perbup_count');
          $perda_year = Http::acceptJson()->get('https://jdih.ciamiskab.go.id/api/get_perda_by_tahun');
          $perbup_year = Http::acceptJson()->get('https://jdih.ciamiskab.go.id/api/get_perbup_by_tahun');
          // json_decode
          $perda = json_decode($perda);
          $perbup = json_decode($perbup);

        return view('jdih', [
            'total_perda' => $perda,
        'total_perbup' => $perbup ]);
    }

    public function pikcovid()
    {
        return view('pikcovid');
    }
    public function prokes()
    {
        return view('prokes');
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
