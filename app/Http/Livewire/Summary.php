<?php

namespace App\Http\Livewire;

use App\Models\regulerModel;
use App\Models\rekapModel;
use App\Models\simpananWajib;
use Livewire\Component;

class Summary extends Component
{
    public $bulan;

    public $data;
    public function render()
    {
        return view('livewire.summary');
    }


    public function filter()
    {
        // dd($this->bulan);
        $explode = explode('-',$this->bulan);

        $rekap = rekapModel::where('nip_id','6891153JA')->where('tahun',$explode[0])->where('bulan',$explode[1])->with(['pegawai'])->first();
        $swajib =simpananWajib::where('nip_id','6891153JA')->where('tahun',$explode[0])->where('bulan',$explode[1])->with(['pegawai'])->first();
        $reguler =regulerModel::where('nip_id','6891153JA')->where('tahun',$explode[0])->where('bulan',$explode[1])->where('pinjaman_id',1)->with(['pegawai'])->first();
        $bjs =regulerModel::where('nip_id','6891153JA')->where('tahun',$explode[0])->where('bulan',$explode[1])->where('pinjaman_id',2)->with(['pegawai'])->first();

        $this->data = collect(['rekap'=>$rekap, 'wajib'=>$swajib, 'reguler'=>$reguler, 'bjs'=>$bjs]);

        // dd($this->data['rekap']->pot_simpanan_wajib);
        // dd($rekap);

    }


}
