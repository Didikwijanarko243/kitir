<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;

class Login extends Component
{
    public $password;
    public $nip;

    protected $rules = [

        'nip' => 'required',
        'password' => 'required',

    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function login()
    {
        $validatedData = $this->validate();


        if (Auth::attempt(['nip' => $this->nip, 'password' => $this->password])) {
            $this->emit('notify', ['pesan' => 'Selamat Datang', 'type' => 'success']);
            
            return redirect('/home');
        } else {
            $this->emit('notify', ['pesan' => 'Email Atau Password Salah', 'type' => 'error']);
            return redirect('/');
        }

        
    }


    public function render()
    {
        return view('livewire.login');
    }
}
