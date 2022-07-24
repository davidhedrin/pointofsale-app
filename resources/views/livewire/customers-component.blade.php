<div>
    <div class="row">
        <div class="col-lg-4">
            <div class="ibox">
                <div class="ibox-body">
                    <div class="flexbox mb-2 mt-2">
                        <div>
                            <h3 class="m-0">Customers</h3>
                            <div>Jumlah Customer Terdaftar</div>
                        </div>
                        <div>
                            <h1 class="m-0" style="font-size: 45px">{{ $countCust->count() }}</h1>
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
                            <div class="px-3">
                                <div class="text-muted">WEEKLY SALES</div>
                                <div>
                                    <span class="h2 m-0">240</span>
                                    <span class="text-success ml-2"><i class="fa fa-level-up"></i> +25%</span>
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
    </div>

    <div class="ibox">
        <div class="ibox-head flexbox">
            <div class="ibox-title">Tabel Customers</div>
            <div><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-addNew-customer">Add New</button></div>
        </div>
        <div class="ibox-body">
            <div class="mb-1 mt-2">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="input-group-icon">
                                <div class="input-icon"><i class="fa fa-search" aria-hidden="true"></i></div>
                                <input wire:model="search" class="form-control" type="text" placeholder="Temukan Customer...">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-3">
                    </div>
                </div>
            </div>

            @if(Session::has('msgAddCustomer'))
            <div class="alert alert-success alert-bordered fade show">
                <button class="close" data-dismiss="alert" aria-label="Close" style="cursor: pointer">×</button>
                <strong>Success!</strong> {{ Session::get('msgAddCustomer') }}
            </div>
            @endif
            <div class="row">
                @forelse ($customers as $cus)
                <div class="colz-2 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('assets/img/users') }}/{{ $cus->gander == 1 ? "cus-male.png" : "cus-female.png" }}" />
                        <div class="card-body text-center">
                            <a href="javascript:void(0)" wire:click="editDataCustomer({{ $cus->id }})" data-toggle="modal" data-target="#modal-editData-customer"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a href="javascript:void(0)" wire:click="deleteCustomer({{ $cus->id }}, '{{ $cus->nama_lengkap }}')" data-toggle="modal" data-target="#modal-delete-customer"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            <div>{{ $cus->customer_code }}</div>
                            <div style="font-weight: bold; text-decoration: underline">{{ $cus->nama_lengkap }}</div>
                            <div>{{ $cus->no_phone }}</div>
                            <div>{{ $cus->alamat }}</div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-text text-center">Customer Tidak Ditemukan!.</h5>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
            <div class="mt-0">
                {{ $customers->links() }}
            </div>
            {{-- <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="1">No</th>
                            <th>Code</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Phone</th>
                            <th>Gander</th>
                            <th class="text-center" width="1">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php ($i = 1)
                        @forelse ($customers as $cus)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $cus->customer_code }}</td>
                                <td>{{ $cus->nama_lengkap }}</td>
                                <td>{{ $cus->alamat }}</td>
                                <td>{{ $cus->no_phone }}</td>
                                <td>{{ $cus->gander == "1" ? "Laki-laki" : "Perempuan" }}</td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" wire:click="" data-toggle="modal" data-target="#modal-editData-user"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="javascript:void(0)" wire:click="" data-toggle="modal" data-target="#modal-delete-user"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="7">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-3">
                    {{ $customers->links() }}
                </div>
            </div> --}}
        </div>
    </div>

    <!-- Modal Add new user -->
    <div wire:ignore.self class="modal fade" id="modal-addNew-customer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Customer Baru</h5>
                    <button wire:click="resetFromAddCustomer" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="storeNewCustomer">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Code Customer</label>
                                    <div class="input-group">
                                        <div class="input-group-addon" style="padding: 0px"><button class="btn btn-primary" type="button" wire:click="generateCodeCustomer"><i class="fa fa-qrcode" aria-hidden="true"></i></button></div>
                                        <input wire:model="customer_code" class="form-control" type="text" placeholder="Customer Code">
                                    </div>
                                    @error('customer_code') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Gander</label>
                                    <div wire:ignore.self class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <select wire:model="gander" class="form-control">
                                            <option value="">Pilih Gander</option>
                                            <option value="1">Laki-laki</option>
                                            <option value="2">Perempuan</option>
                                        </select>
                                    </div>
                                    @error('gander') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input wire:model="nama_lengkap" class="form-control" type="text" placeholder="Masukkan Nama Lengkap">
                            </div>
                            @error('nama_lengkap') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="">No Telepon</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input wire:model="no_phone" class="form-control" type="text" placeholder="Masukkan No Telepon">
                            </div>
                            @error('no_phone') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <textarea wire:model="alamat" class="form-control" id="" rows="3" placeholder="Masukkan Alamat Domisili"></textarea>
                            </div>
                            @error('alamat') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Edit user -->
    <div wire:ignore.self class="modal fade" id="modal-editData-customer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Customer</h5>
                    <button wire:click="resetFromAddCustomer" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="updateDataCustomer">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Code Customer</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-qrcode" aria-hidden="true"></i></div>
                                        <input wire:model="customer_code" class="form-control" type="text" placeholder="Customer Code" readonly>
                                    </div>
                                    @error('customer_code') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Gander</label>
                                    <div wire:ignore.self class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <select wire:model="gander" class="form-control">
                                            <option value="">Pilih Gander</option>
                                            <option value="1">Laki-laki</option>
                                            <option value="2">Perempuan</option>
                                        </select>
                                    </div>
                                    @error('gander') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input wire:model="nama_lengkap" class="form-control" type="text" placeholder="Masukkan Nama Lengkap">
                            </div>
                            @error('nama_lengkap') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="">No Telepon</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input wire:model="no_phone" class="form-control" type="text" placeholder="Masukkan No Telepon">
                            </div>
                            @error('no_phone') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <textarea wire:model="alamat" class="form-control" id="" rows="3" placeholder="Masukkan Alamat Domisili"></textarea>
                            </div>
                            @error('alamat') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Delete User -->
    <div wire:ignore.self class="modal fade" id="modal-delete-customer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete User</h5>
                    <button wire:click="resetFromAddCustomer" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div wire:ignore.self class="modal-body text-center">
                    <h5 class="mt-2">Konfirmasi Hapus!</h5>
                    <p>Yakin ingin menghapus user "{{ $nama_lengkap != null ? $nama_lengkap : "" }}"</p>
                    <form wire:submit.prevent="destroyCustomer">
                        <div class="form-group">
                            <button wire:click="resetFromAddCustomer" type="button" class="btn btn-secondary" data-dismiss="modal">
                                Close
                            </button>
                            <button class="btn btn-primary" type="submit">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('close-form-modal', event => {
        $('#modal-addNew-customer').modal('hide');
        $('#modal-editData-customer').modal('hide');
        $('#modal-delete-customer').modal('hide');
    });
</script>
@push('scripts')
    <script>
        Livewire.restart();
    </script>
@endpush