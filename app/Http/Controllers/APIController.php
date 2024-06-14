<?php   

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Makanan;

class APIController extends Controller
{
    public function searchmakanan(Request $request){
        $cari = $request -> input('q');
        $makanan = Makanan::where('nama_makanan','LIKE',"%$cari%")->get();
        if($makanan -> isEmpty()){
            return response()->json([
                'success' =>false,
                'data' => 'Data Tidak Ditemukan'
            ],200)->header('Access-Control-Allow-Origin','*');;
        }
        else{
            return response()->json([
                'success' =>true,
                'data' => $makanan
            ],200)->header('Access-Control-Allow-Origin','*');
        }
    }
}
