<?php

namespace App\Http\Livewire;

use App\Imports\KitirImport;
use App\Models\regulerModel;
use App\Models\rekapModel;
use App\Models\simpananWajib;
use App\Models\uploadModel;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class FormUpload extends Component
{
    use WithFileUploads;

    public $file;
    public $rekap = "REKAP POTONGAN";
    protected $rules = [

        'file' => 'required|mimes:xlsx',

    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function save()
    {
        $valid = $this->validate();
        // dd($this->file->getRealPath());
        // dd($this->file->getFilename());

        $this->file->storeAs('public/import/', $this->file->getFilename());

        if ($valid) {
            $upload = new uploadModel();
            $upload->nama_file =  $this->file->getFilename();
            $upload->location =  $this->file->getRealPath();
            $upload->status =  "SUKSES";
            $upload->jam =  Carbon::now()->format('H:i:s');
            $upload->tanggal =  Carbon::now()->format('Y-m-d');
            $upload->save();
        }

        $import = new KitirImport();
        $import->onlySheets('REKAP POTONGAN', 'Simp. Wajib', 'Reguler', 'BJS');
        $row = Excel::toArray($import, $this->file->getRealPath());

        $rekap = collect($row['REKAP POTONGAN']);
        $swajib = collect($row['Simp. Wajib']);
        $reguler = collect($row['Reguler']);
        $bjs = collect($row['BJS']);

        //filter
        $rekapfiltered = $rekap->whereNotNull('urut');
        $swajibfiltered = $swajib->whereNotNull('no');
        $regulerfiltered = $reguler->whereNotNull('0');
        $bjsfiltered = $bjs->whereNotNull('1');

        //insert rekap
        // dd($rekapfiltered->all());
        $insert_rekap = [];
        foreach ($rekapfiltered->all() as $item) {
            $insert_rekap[] = [
                'nip_id' => $item['pegawai'][0],
                'pot_simpanan_wajib' => $item['s_wajib'],
                'pot_reguler' => $item['reguler'],
                'pot_bjs' => $item['bjs'],
                'pot_toko' => $item['toko'],
                'pot_khusus' => $item['pinjaman_khusus'],
                'pot_pi' => $item['pi'],
                'pot_sosial' => $item['sosial_pp'],
                'bulan' => Carbon::now()->format('m'),
                'tahun' => Carbon::now()->format('Y'),
                'tanggal' => Carbon::now()->format('Y-m-d'),
                'uniqkey' => $item['pegawai'][0] . "-" . Carbon::now()->format('Y-m')
            ];
        }

        $insert_swajib = [];
        foreach ($swajibfiltered->all() as $item) {
            $insert_swajib[] = [
                'nip_id' => $item['nipeg'],
                // 'periode_anggota' => '01/'.$item['periode_masuk_keanggotaan'],
                'bulan' => Carbon::now()->format('m'),
                'tahun' => Carbon::now()->format('Y'),
                'total_simpanan_pokok' => $item['s_simp_pokok_2013'],
                'total_simpanan_wajib' => $item['s_simpanan_wajib'],
                'total_simpanan_khusus' => $item['s_simpanan_khusus'],

            ];
        }

        $insert_reguler = [];
        foreach ($regulerfiltered->all() as $item) {
            $insert_reguler[] = [
                'pinjaman_id' => 1,
                'nip_id' => $item[1],
                'tanggal' => Carbon::now()->format('Y-m-d'),
                'jumlah_pinjaman' => $item[4],
                'bunga' => $item[5],
                'tenor' => $item[6],
                'pot_pokok' => $item['pokok'][0],
                'bulan' => Carbon::now()->format('m'),
                'tahun' => Carbon::now()->format('Y'),
                'pot_bunga' => $item['bunga'][0],
                'pot_jumlah' => $item['jumlah'][0],
                'saldo_pokok' => $item['pokok'][1],
                'saldo_bunga' => $item['bunga'][1],
                'saldo_jumlah' => $item['jumlah'][1],
                'pot_ke' => $item[13],
                'keterangan' => $item[14],

            ];
        }

        $insert_bjs = [];
        foreach ($bjsfiltered->all() as $item) {
            $insert_bjs[] = [
                'pinjaman_id' => 2,
                'nip_id' => $item[2],
                'tanggal' => Carbon::now()->format('Y-m-d'),
                'jumlah_pinjaman' => $item[5],
                'bunga' => $item[6],
                'tenor' => $item[7],
                'pot_pokok' => $item['pokok'][0],
                'bulan' => Carbon::now()->format('m'),
                'tahun' => Carbon::now()->format('Y'),
                'pot_bunga' => $item['bunga'][0],
                'pot_jumlah' => $item['jumlah'][0],
                'saldo_pokok' => $item['pokok'][1],
                'saldo_bunga' => $item['bunga'][1],
                'saldo_jumlah' => $item['jumlah'][1],
                'pot_ke' => $item[14],
                'keterangan' => $item[15],

            ];
        }




        try {
            regulerModel::where('bulan', Carbon::now()->format('m'))->where('tahun', Carbon::now()->format('Y'))->delete();
            regulerModel::insert($insert_reguler);
            regulerModel::insert($insert_bjs);

            simpananWajib::where('bulan', Carbon::now()->format('m'))->where('tahun', Carbon::now()->format('Y'))->delete();
            simpananWajib::insert($insert_swajib);

            rekapModel::where('bulan', Carbon::now()->format('m'))->where('tahun', Carbon::now()->format('Y'))->delete();
            rekapModel::insert($insert_rekap);

            $this->emit('notify', ['pesan' => 'Data Berhasil Di Import', 'type' => 'success']);
            
        } catch (\Throwable $th) {
            $this->emit('notify', ['pesan' => 'Gagal Parse Data', 'type' => 'error']);
        
        }
        return redirect('/master');
    }

    public function render()
    {
        return view('livewire.form-upload');
    }
}
