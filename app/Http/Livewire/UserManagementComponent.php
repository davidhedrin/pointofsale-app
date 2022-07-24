<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserManagementComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = "", $searchGander = "";
    public $register_token, $name, $user_type;
    public $nama_lengkap, $gander, $no_phone, $email, $password, $conf_password, $tipe_user, $flag_active;
    public $user_id, $namaUser;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'register_token' => 'required|unique:users',
            'name' => 'required|min:6|max:15',

            'nama_lengkap' => 'nullable|min:6|max:15',
            'no_phone' => 'nullable|numeric',
            'password' => 'required',
            'conf_password' => 'required|same:password',
        ]);
    }
    public function resetFormAddUser()
    {
        $this->register_token = null;
        $this->name = null;
    }
    public function resetFromEditUserModal()
    {
        $this->nama_lengkap = null;
        $this->gander = null;
        $this->no_phone = null;
        $this->email = null;
        $this->password = null;
        $this->conf_password = null;
        $this->tipe_user = null;
        $this->flag_active = null;
        $this->user_id = null;
        $this->namaUser = null;
    }

    public function generateRandomCode()
    {
        $randomToken = Carbon::now()->timestamp . strtoupper(Str::random(10));
        $this->register_token = $randomToken;
    }

    public function storeNewUser()
    {
        $this->validate([
            'register_token' => 'required|unique:users',
            'name' => 'required|min:6|max:15',
        ]);

        $user = new User();
        $user->register_token = $this->register_token;
        $user->name = $this->name;
        $user->user_type = $this->user_type;
        $user->save();

        $this->resetFormAddUser();
        $this->dispatchBrowserEvent('close-form-modal');
        session()->flash('msgAddUser', 'User baru telah berhasil ditambahkan. Hubingi user untuk mendaftar!');
    }

    public function editUserClass(int $userId)
    {
        $this->user_id = $userId;
        $user = User::find($userId);
        $this->nama_lengkap = $user->name;
        $this->gander = $user->gander;
        $this->no_phone = $user->no_phone;
        $this->email = $user->email;
        $this->password = $user->password;
        $this->conf_password = $user->password;
        $this->tipe_user = $user->user_type;
        $this->flag_active = $user->flag_active;
    }
    public function updateDataUserClass()
    {
        $this->validate([
            'nama_lengkap' => 'nullable|min:6|max:15',
            'no_phone' => 'nullable|numeric',
            'password' => 'required',
            'conf_password' => 'required|same:password',
        ]);

        $user = User::find($this->user_id);
        $user->name = $this->nama_lengkap;
        $user->gander = $this->gander;
        $user->no_phone = $this->no_phone;
        $user->email = $this->email;
        $user->user_type = $this->tipe_user;
        $user->flag_active = $this->flag_active;
        if($user->password != $this->password){
            $user->password = Hash::make($this->password);
        }
        $user->save();
        
        $this->resetFormAddUser();
        $this->dispatchBrowserEvent('close-form-modal');
        session()->flash('msgAddUser', 'User telah berhasil diperbaharui!');
    }

    public function deleteUserClass($userId, $nama)
    {
        $this->user_id = $userId;
        $this->namaUser = $nama;
    }
    public function destroyUserClass()
    {
        $user = User::find($this->user_id);
        $user->delete();
        
        $this->resetFormAddUser();
        $this->dispatchBrowserEvent('close-form-modal');
        session()->flash('msgAddUser', 'User telah berhasi dihapus!');
    }

    public function ActiveStatusUser(int $userId)
    {
        $user = User::find($userId);
        $user->flag_active = "Y";
        $user->save();
        session()->flash('msgAddUser', 'User telah berhasil diaktifkan!');
    }
    public function InactiveStatusUser(int $userId)
    {
        $user = User::find($userId);
        $user->flag_active = "N";
        $user->save();
        session()->flash('msgAddUser', 'User telah berhasil dinonaktifkan!');
    }

    public function loadAllData()
    {
        $users = User::where('name', 'like', '%'.$this->search.'%')
        ->orwhere('email', 'like', '%'.$this->search.'%')
        ->orwhere('register_token', 'like', '%'.$this->search.'%')
        ->orderBy('flag_active', 'ASC')->paginate(12);

        $userCount = User::all();
        
        return [
            'users' => $users,
            'userCount' => $userCount,
        ];
    }
    public function render()
    {
        return view('livewire.user-management-component', $this->loadAllData())->layout('layouts.base');
    }
}
