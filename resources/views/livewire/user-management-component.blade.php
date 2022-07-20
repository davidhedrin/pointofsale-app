<div>
    <div class="row">
        <div class="col-lg-4">
            <div class="ibox">
                <div class="ibox-body">
                    <div class="flexbox mb-2 mt-2">
                        <div>
                            <h3 class="m-0">Users</h3>
                            <div>Jumlah User Terdaftar</div>
                        </div>
                        <div>
                            <h1 class="m-0" style="font-size: 45px">{{ $userCount->count() }}</h1>
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
                            <div class="px-3" style="border-right: 1px solid rgba(0,0,0,.1);">
                                <div class="text-muted">WEEKLY INCOME</div>
                                <div>
                                    <span class="h2 m-0">$850</span>
                                    <span class="text-success ml-2"><i class="fa fa-level-up"></i> +25%</span>
                                </div>
                            </div>
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
                            <div class="px-3" style="border-right: 1px solid rgba(0,0,0,.1);">
                                <div class="text-muted">WEEKLY INCOME</div>
                                <div>
                                    <span class="h2 m-0">$850</span>
                                    <span class="text-success ml-2"><i class="fa fa-level-up"></i> +25%</span>
                                </div>
                            </div>
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

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-head flexbox">
                    <div class="ibox-title">Tabel User</div>
                    <div><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-addNew-user">Add New</button></div>
                </div>
                <div class="ibox-body">
                    <div class="mb-1 mt-2">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group-icon">
                                        <div class="input-icon"><i class="fa fa-search" aria-hidden="true"></i></div>
                                        <input wire:model="search" class="form-control" type="text" placeholder="Temukan User...">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3">
                            </div>
                        </div>
                    </div>

                    @if(Session::has('msgAddUser'))
                    <div class="alert alert-success alert-bordered fade show">
                        <button class="close" data-dismiss="alert" aria-label="Close" style="cursor: pointer">×</button>
                        <strong>Success!</strong> {{ Session::get('msgAddUser') }}
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="1">No</th>
                                    <th width="1">R-Token</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No Phone</th>
                                    <th>Gander</th>
                                    <th>Tipe</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center" width="1">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php ($i = 1)
                                @forelse ($users as $us)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $us->register_token }}</td>
                                        <td>{{ $us->name }}</td>
                                        <td style="font-style: {{ $us->email == null ? "italic" : "" }}; color: {{ $us->email == null ? "gray" : "" }};">{{ $us->email != null ? $us->email : "-Proses Pendaftaran-" }}</td>
                                        <td style="font-style: {{ $us->no_phone == null ? "italic" : "" }}; color: {{ $us->no_phone == null ? "gray" : "" }};">{{ $us->no_phone != null ? $us->no_phone : "-Proses Pendaftaran-" }}</td>
                                        <td style="font-style: {{ $us->gander == null ? "italic" : "" }}; color: {{ $us->gander == null ? "gray" : "" }};">{{ $us->gander == "1" ? "Laki-laki" : ($us->gander == "2" ? "Perempuan" : "-Proses Pendaftaran-") }}</td>
                                        <td>{{ $us->user_type == "ADM" ? "Admin" : "User" }}</td>
                                        <td class="text-center">
                                            <span class="badge badge-{{ $us->flag_active == "Y" ? "success" : ($us->flag_active == "N" ? "danger" : "warning") }}">{{ $us->flag_active == "Y" ? "Active" : ($us->flag_active == "N" ? "Inactive" : "Panding") }}</span>
                                            @if ($us->email)
                                            <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right" style="width: 100px">
                                                <a class="dropdown-item text-success" wire:click="ActiveStatusUser({{ $us->id }})">Active</a>
                                                <a class="dropdown-item text-danger" wire:click="InactiveStatusUser({{ $us->id }})">Inactive</a>
                                            </div>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" wire:click="editUserClass({{ $us->id }})" data-toggle="modal" data-target="#modal-editData-user"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" wire:click="deleteUserClass({{ $us->id }}, '{{ $us->name }}')" data-toggle="modal" data-target="#modal-delete-user"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="8">Data tidak ditemukan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="mt-3">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal Add new user -->
    <div wire:ignore.self class="modal fade" id="modal-addNew-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Generate New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="storeNewUser">
                        <div class="form-group">
                            <div class="input-group">
                                <input wire:model="register_token" id="regis_token" style="font-weight: bold" class="form-control" type="text" placeholder='Tekan "TOKEN" Untuk Register Token' readonly>
                                <div class="input-group-addon" style="padding: 0px"><button class="btn btn-success" type="button" wire:click="generateRandomCode">TOKEN</button></div>
                            </div>
                            @error('register_token') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <select wire:model="user_type" class="form-control">
                                    <option value="">Pilih Tipe User</option>
                                    <option value="ADM">Admin</option>
                                    <option value="USR">User</option>
                                </select>
                            </div>
                            @error('user_type') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <input wire:model="name" class="form-control" type="text" placeholder="Masukkan Nama User">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Update data user -->
    <div wire:ignore.self class="modal fade" id="modal-editData-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Data User</h5>
                    <button wire:click="resetFromEditUserModal" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="updateDataUserClass">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tipe</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <select wire:model="tipe_user" class="form-control">
                                            <option value="ADM">Admin</option>
                                            <option value="USR">User</option>
                                        </select>
                                    </div>
                                    @error('tipe_user') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <div wire:ignore.self class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <select wire:model="flag_active" class="form-control" {{ $email == null ? "disabled" : "" }}>
                                            <option value="">Pilih Status User</option>
                                            <option value="Y">Active</option>
                                            <option value="N">Inactive</option>
                                        </select>
                                    </div>
                                    @error('flag_active') <span class="text-danger">{{ $message }}</span> @enderror
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
                            <label for="">Gender</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <select wire:model="gander" class="form-control" class="" name="" id="">
                                    <option value="">Pilih Gender</option>
                                    <option value="1">Laki-laki</option>
                                    <option value="2">Perempuan</option>
                                </select>
                            </div>
                            @error('gander') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="">No Telpon</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input wire:model="no_phone" class="form-control" type="text" placeholder="Masukkan No Handpone">
                            </div>
                            @error('no_phone') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input wire:model="email" class="form-control" type="email" name="email" placeholder="Masukkan Alamat Email" autocomplete="off">
                            </div>
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input wire:model="password" class="form-control" id="password" type="password" name="password" placeholder="Password">
                            </div>
                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Konfirmasi Password</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input wire:model="conf_password" class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password">
                            </div>
                            @error('conf_password') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group text-right">
                            <button wire:click="resetFromEditUserModal" type="button" class="btn btn-secondary" data-dismiss="modal">
                                Close
                            </button>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Delete User -->
    <div wire:ignore.self class="modal fade" id="modal-delete-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div wire:ignore.self class="modal-body text-center">
                    <h5 class="mt-2">Konfirmasi Hapus!</h5>
                    <p>Yakin ingin menghapus user "{{ $namaUser != null ? $namaUser : "" }}"</p>
                    <form wire:submit.prevent="destroyUserClass">
                        <div class="form-group">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
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
        $('#modal-addNew-user').modal('hide');
        $('#modal-delete-user').modal('hide');
        $('#modal-editData-user').modal('hide');
    });
</script>
@push('scripts')
    <script>
        Livewire.restart();
    </script>
@endpush