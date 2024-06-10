<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Makanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class PageController extends Controller
{
    public function home(){
        return view("home",["key" => "home"]);
    }
    
    public function makanan(){
        //$movies = Movies::all();
        $makanan = Makanan::orderBy('id','desc')->get();
        
        return view("makanan", ["key" => "makanan","mv"=>$makanan]);
        }
        public function formaddmakanan(){
            return view("form-add",["key"=>"makanan"]);
        }   
        public function savemakanan(Request $request){
            if ($request->hasFile('deskripsi')) {
                $file_name = time().'-'.$request->file('deskripsi')->getClientOriginalName();
                $path = $request->file('deskripsi')->storeAs('deskripsi', $file_name,'public');
                $deskripsi_path = $path;
            } else {
                $deskripsi_path = null;
            }

            Makanan::create([
                'nama_makanan' => $request->nama_makanan,
                'asal_daerah' => $request->asal_daerah,
                'gizi' => $request->gizi,
                'kategori' => $request->kategori,
                'expired' => $request->expired,
                'deskripsi' => $deskripsi_path
            ]);
            return redirect('/makanan')->with('alert','Data Berhasil Disimpan');
        }

        public function formeditmakanan($id){
            $makanan = Makanan::find($id);
            return view("form-edit", ["key"=>"makanan","mv"=>$makanan]);
        }
        public function updatemakanan($id,Request $request){
            $makanan = Makanan::find($id);
            $makanan->nama_makanan = $request->nama_makanan;
            $makanan->asal_daerah = $request->asal_daerah;
            $makanan->gizi = $request->gizi;
            $makanan->kategori = $request->kategori;
            $makanan->expired = $request->expired;
            if($request->deskripsi)
            {
                if($$makanan->deskripsi)
                {
                    Storage::disk('public')->delete($makanan->deskripsi);
                    
                }
            $file_name = time().'-'.$request->file('deskripsi')->getClientOriginalName();
            $path = $request->file('deskripsi')->storeAs('deskripsi', $file_name,'public');
            $makanan->deskripsi = $path;
            }
            $makanan->save();
            return redirect('/makanan')->with('alert','Data Berhasil Di Ubah');
        }
    
        public function deletemakanan($id){
            $makanan = Makanan::find($id);
    
            if($makanan->deskripsi){
                Storage::disk('public')->delete($makanan->deskripsi);
            }
    
            $makanan->delete();
            return redirect('/makanan')->with('alert','Data Berhasil dihapus');
        }
        public function login(){
            return view('login');
        }
        public function formedituser(){
            return view("formedituser", ['key'=>""]);
        }
        public function updateuser(Request $request){
            if ($request->password_baru == $request->konfirmasi_password){
                $user = Auth::user();
                $user->password = bcrypt($request->password_baru);
                $user->save();
    
                return redirect("/user")->with("info","Password Berhasil Diubah");
            }
            else{
                return redirect("/user")->with("info","Password Gagal Diubah");
            }
        }
}