<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Products;
use App\Models\Categorys;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class ProductComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $category_id, $kode_produk, $nama_produk, $merk_produk, $harga_beli, $harga_jual, $stok_produk, $image_product;

    public function resetFromAddProd()
    {
        $this->category_id = null;
        $this->kode_produk = null;
        $this->nama_produk = null;
        $this->merk_produk = null;
        $this->harga_beli = null;
        $this->harga_jual = null;
        $this->stok_produk = null;
        $this->image_product = null;
    }
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'category_id' => 'required',
            'kode_produk' => 'required|unique:products',
            'nama_produk' => 'required',
            'merk_produk' => 'required',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok_produk' => 'required|numeric',
            // 'image_product' => 'required',
        ]);
    }

    public function storeNewProduct()
    {
        $this->validate([
            'category_id' => 'required',
            'kode_produk' => 'required|unique:products',
            'nama_produk' => 'required',
            'merk_produk' => 'required',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok_produk' => 'required|numeric',
            // 'image_product' => 'required',
        ]);
        $product = new Products;
        $product->category_id = $this->category_id;
        $product->kode_produk = $this->kode_produk;
        $product->nama_produk = $this->nama_produk;
        $product->merk_produk = $this->merk_produk;
        $product->harga_beli = $this->harga_beli;
        $product->harga_jual = $this->harga_jual;
        $product->stok_produk = $this->stok_produk;
        if($this->image_product){
            $imageName = Carbon::now()->timestamp. '.' . $this->image_product->extension();
            $this->image_product->storeAs('products',$imageName);
            $product->image_product = $imageName;
        }
        // $product->image_product = $this->image_product;
        $product->save();

        $this->resetFromAddProd();
        $this->dispatchBrowserEvent('close-form-modal');
        session()->flash('msgAddProduct', 'Produk baru telah berhasil ditambahkan!');
    }

    public function loadAllData()
    {
        $products = Products::paginate(12);
        $category = Categorys::all();
        return [
            'products' => $products,
            'categorys' => $category,
        ];
    }
    public function render()
    {
        return view('livewire.product-component', $this->loadAllData())->layout('layouts.base');
    }
}
