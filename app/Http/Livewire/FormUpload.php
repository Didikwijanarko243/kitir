<?php

namespace App\Http\Livewire;

use App\Imports\KitirImport;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class FormUpload extends Component
{
    use WithFileUploads;

    public $file;

    protected $rules = [

        'file' => 'required|mimes:xlsx,xls',

    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function save()
    {
        $validatedData = $this->validate();
        // dd($this->file->getRealPath());
        // dd($this->file->getFilename());

        $this->file->storeAs('public/import/', $this->file->getFilename());
        $import = new KitirImport();
        $import->onlySheets('REKAP POTONGAN', 'Simp. Wajib','Reguler','BJS');
        $row = Excel::toArray($import, $this->file->getRealPath());
        dd($row);
    }

    public function render()
    {
        return view('livewire.form-upload');
    }
}
