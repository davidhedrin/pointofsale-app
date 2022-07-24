<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Customers;
use Carbon\Carbon;
use Illuminate\Support\Str;

class CustomersComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = "";
    public $customer_code, $nama_lengkap, $no_phone, $alamat, $gander;
    public $customer_id;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'customer_code' => 'required|unique:customers',
            'nama_lengkap' => 'required',
            'no_phone' => 'required|numeric',
            'alamat' => 'required',
            'gander' => 'required',
        ]);
    }
    public function resetFromAddCustomer()
    {
        $this->customer_code = null;
        $this->nama_lengkap = null;
        $this->no_phone = null;
        $this->alamat = null;
        $this->gander = null;
    }

    public function generateCodeCustomer()
    {
        $this->customer_code = 'CUS-' . Carbon::now()->timestamp . strtoupper(Str::random(4));
    }

    public function storeNewCustomer()
    {
        $this->validate([
            'customer_code' => 'required|unique:customers',
            'nama_lengkap' => 'required',
            'no_phone' => 'required|numeric',
            'alamat' => 'required',
            'gander' => 'required',
        ]);

        $customer = new Customers;
        $customer->customer_code = $this->customer_code;
        $customer->nama_lengkap = $this->nama_lengkap;
        $customer->no_phone = $this->no_phone;
        $customer->alamat = $this->alamat;
        $customer->gander = $this->gander;
        $customer->save();
        
        $this->resetFromAddCustomer();
        $this->dispatchBrowserEvent('close-form-modal');
        session()->flash('msgAddCustomer', 'Customer baru telah berhasil ditambahkan!');
    }

    public function editDataCustomer(int $customerId)
    {
        $this->customer_id = $customerId;
        $custom = Customers::find($customerId);
        $this->customer_code = $custom->customer_code;
        $this->nama_lengkap = $custom->nama_lengkap;
        $this->no_phone = $custom->no_phone;
        $this->alamat = $custom->alamat;
        $this->gander = $custom->gander;
    }
    public function updateDataCustomer()
    {
        $this->validate([
            'nama_lengkap' => 'required',
            'no_phone' => 'required|numeric',
            'alamat' => 'required',
            'gander' => 'required',
        ]);

        $custom = Customers::find($this->customer_id);
        $custom->nama_lengkap = $this->nama_lengkap;
        $custom->no_phone = $this->no_phone;
        $custom->alamat = $this->alamat;
        $custom->gander = $this->gander;
        $custom->save();
        
        $this->resetFromAddCustomer();
        $this->dispatchBrowserEvent('close-form-modal');
        session()->flash('msgAddCustomer', 'Customer telah berhasil diperbaharui!');
    }

    public function deleteCustomer(int $customerId, $cust_nama)
    {
        $this->nama_lengkap = $cust_nama;
        $this->customer_id = $customerId;
    }
    public function destroyCustomer()
    {
        $custom = Customers::find($this->customer_id);
        $custom->delete();

        $this->resetFromAddCustomer();
        $this->dispatchBrowserEvent('close-form-modal');
        session()->flash('msgAddCustomer', 'Customer telah berhasil dihapus!');
    }

    public function loadAllData()
    {
        $customers = Customers::where('nama_lengkap', 'like', '%'.$this->search.'%')
        ->orwhere('no_phone', 'like', '%'.$this->search.'%')
        ->paginate(12);
        $countCust = Customers::all();

        return [
            'customers' => $customers,
            'countCust' => $countCust,
        ];
    }
    public function render()
    {
        return view('livewire.customers-component', $this->loadAllData())->layout('layouts.base');
    }
}
