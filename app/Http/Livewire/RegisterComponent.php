<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterComponent extends Component
{
    public $nama_lengkap, $gender, $no_phone, $email, $password, $conf_password, $terms;
    public $form_register = false, $register_token;
    public $widthRegister = "1000px", $widthToken = "600px";

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'nama_lengkap' => 'required|min:6|max:15',
            'gender' => 'required',
            'no_phone' => 'required|numeric',
            'email' => 'required|email:filter|unique:users',
            'terms' => 'required',
            'password' => 'required',
            'conf_password' => 'required|same:password',

            'register_token' => 'required',
        ]);
    }

    public function resetFormRegister()
    {
        $this->nama_lengkap = null;
        $this->gender = null;
        $this->no_phone = null;
        $this->email = null;
        $this->password = null;
        $this->conf_password = null;
        $this->terms = null;
    }

    public function registerEditUser()
    {
        $this->validate([
            'nama_lengkap' => 'required|min:6|max:15',
            'gender' => 'required',
            'no_phone' => 'required|numeric',
            'email' => 'required|email:filter',
            'terms' => 'required',
            'password' => 'required',
            'conf_password' => 'required|same:password',
        ]);
        
        $user = User::where('register_token', $this->register_token)->first();
        $user->name = $this->nama_lengkap;
        $user->gander = $this->gender;
        $user->no_phone = $this->no_phone;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->acc_term = $this->terms;
        $user->save();
        
        session()->flush();
        $this->resetFormRegister();
        session()->flash('msgUsersRegis', 'Holaa... Pendaftaran berhasil, mohon tunggu sampai admin menyetujui. Terimakasih!');
        return redirect()->route('login');
    }

    public function checTokeRegisterUser()
    {
        $this->validate([
            'register_token' => 'required',
        ]);
        
        $user = User::where('register_token', $this->register_token)->first();
        if($user){
            if($user->email == null){
                $this->form_register = true;
                $this->nama_lengkap = $user->name;
            }else{
                session()->flash('msgCheckTokenInvalid', 'Opss... Token sudah terdaftar dan sudah pernah digunakan. Terimakasih!.');
            }
        }else{
            session()->flash('msgCheckToken', 'Maaf, Token tidak terdaftar sebagai user baru. Minta admin untuk membuatkan ulang Token.');
        }
    }

    public function render()
    {
        return view('livewire.register-component')->layout('layouts.guest');
    }
}
