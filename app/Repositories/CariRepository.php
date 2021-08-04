<?php

namespace App\Repositories;

use App\Models\kelas;

class CariRepository{

    public function cari($namaKelas = ''){
        
        $result = [
                'status' => false,
                'message' => ''
        ];

        try {
            if($namaKelas == ''){
                $result['message'] = 'Kelas Tidak di Temukan';
                 return $result;
            }
            // $cari  = $request->nama_kelas;
            $kelas = kelas::where('nama_kelas','like',"%".$namaKelas."%")->where('progres', 'Publish')->orWhere('progres', 'Update Kelas')->orWhere('progres', 'Update DiTolak')->with('orderkelas')->paginate(3);
            
            $count = $kelas->count();

            if($count == 0){
                $result['message'] = 'Kelas Tidak di Temukan';
                return $result;
            }
        
            $result['status'] = true;
            $result['message'] = $kelas;

            return $result;

        } catch (\Throwable $th) {
            $result['message'] = 'Kelas Tidak di Temukan'. $th->getMessage();
            return $result;
        }
    }
}

