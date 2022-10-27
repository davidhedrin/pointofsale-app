<div>
    <div class="row">
        <div class="col-lg-4">
            <div class="ibox">
                <div class="ibox-body">
                    <div class="flexbox mb-2 mt-2">
                        <div>
                            <h3 class="m-0">Products</h3>
                            <div>Jumlah Product Terdaftar</div>
                        </div>
                        <div>
                            <h1 class="m-0" style="font-size: 45px">12</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox">
                <div class="ibox-body">
                    <div class="flexbox mb-2 mt-2">
                        <div>
                            <h3 class="m-0">Statistics</h3>
                            <div>Your shop sales analytics</div>
                        </div>
                        <div class="d-inline-flex">
                            <div class="px-3" style="border-right: 1px solid rgba(0,0,0,.1);"></div>
                            <div class="px-3">
                                <div class="text-muted">WEEKLY SALES</div>
                                <div>
                                    <span class="h2 m-0">240</span>
                                    <span class="text-warning ml-2"><i class="fa fa-level-down"></i> -12%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox">
                <div class="ibox-body">
                    <div class="flexbox mb-2 mt-2">
                        <div>
                            <h3 class="m-0">Statistics</h3>
                            <div>Your shop sales analytics</div>
                        </div>
                        <div class="d-inline-flex">
                            <div class="px-3" style="border-right: 1px solid rgba(0,0,0,.1);"></div>
                            <div class="px-3">
                                <div class="text-muted">WEEKLY INCOME</div>
                                <div>
                                    <span class="h2 m-0">$850</span>
                                    <span class="text-success ml-2"><i class="fa fa-level-up"></i> +25%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="ibox">
        <div class="ibox-head flexbox">
            <div class="ibox-title">
                <div class="form-group pt-3">
                    <div class="input-group-icon">
                        <div class="input-icon"><i class="fa fa-search" aria-hidden="true"></i></div>
                        <input wire:model="search" style="width: 300px" class="form-control" type="text" placeholder="Temukan Produk...">
                    </div>
                </div>
            </div>
            <div><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-addNew-product">Add New</button></div>
        </div>
        <div class="ibox-body">
            @if(Session::has('msgAddProduct'))
            <div class="alert alert-success alert-bordered fade show">
                <button class="close" data-dismiss="alert" aria-label="Close" style="cursor: pointer">×</button>
                <strong>Success!</strong> {{ Session::get('msgAddProduct') }}
            </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="1">No</th>
                            <th>Gambar</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Merek</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Stok</th>
                            <th class="text-center" width="1">Status</th>
                            <th class="text-center" width="1">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php ($i = 1)
                        @forelse ($products as $prod)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td><img src="{{ asset('storage/products') }}/{{ $prod->image_product }}" alt="" width="60"></td>
                                <td>{{ $prod->kode_produk }}</td>
                                <td>{{ $prod->nama_produk }}</td>
                                <td>{{ $prod->merk_produk }}</td>
                                <td>{{ $prod->harga_beli }}</td>
                                <td>{{ $prod->harga_jual }}</td>
                                <td>{{ $prod->stok_produk }}</td>
                                <td class="text-center">
                                    <span class="badge badge-{{ $prod->flag_active == null ? "danger" : ($prod->flag_active == "Y" ? "success" : "warning") }}">{{ $prod->flag_active == null ? "New" : ($prod->flag_active == "Y" ? "Dijual" : "Proses") }}</span>
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="javascript:void(0)" class="text-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="8">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{-- <div class="mt-3">
                    {{ $users->links() }}
                </div> --}}
            </div>
        </div>
    </div>

    
    <!-- Modal Add new user -->
    <div wire:ignore.self class="modal fade" id="modal-addNew-product" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">New Product</h5>
                    <button wire:click="resetFromAddProd" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="storeNewProduct" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-th-list" aria-hidden="true"></i></div>
                                <select wire:model="category_id" class="form-control">
                                    <option value="">Category Produk</option>
                                    @foreach ($categorys as $categ)
                                        <option value="{{ $categ->id }}">{{ $categ->nama_category }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-barcode" aria-hidden="true"></i></div>
                                <input wire:model="kode_produk" class="form-control" type="text" placeholder='Masukkan Kode Produk'>
                            </div>
                            @error('kode_produk') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-tags" aria-hidden="true"></i></div>
                                <input wire:model="nama_produk" class="form-control" type="text" placeholder='Masukkan Nama Produk'>
                            </div>
                            @error('nama_produk') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-th-list" aria-hidden="true"></i></div>
                                <input wire:model="merk_produk" class="form-control" type="text" placeholder='Masukkan Merek Produk'>
                            </div>
                            @error('merk_produk') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon" style="padding: 0 9px"><strong>Rp</strong></div>
                                <input wire:model="harga_beli" class="form-control" type="text" placeholder='Masukkan Harga Beli'>
                            </div>
                            @error('harga_beli') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon" style="padding: 0 9px"><strong>Rp</strong></div>
                                <input wire:model="harga_jual" class="form-control" type="text" placeholder='Masukkan Harga Jual'>
                            </div>
                            @error('harga_jual') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon" style="padding: 0 11px"><i class="fa fa-archive" aria-hidden="true"></i></div>
                                <input wire:model="stok_produk" class="form-control" type="text" placeholder='Masukkan Stok Produk'>
                            </div>
                            @error('stok_produk') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input wire:model="image_product" type="file">
                            </div>
                            @error('image_product') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener('close-form-modal', event => {
        $('#modal-addNew-product').modal('hide');
    });
</script>