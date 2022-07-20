<div>
    <style>
        .centers-contens {
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
        .centers-contens-image {
            position: relative;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            text-align: center;
        }
        .alertMsg{
            position: fixed;
            margin-top: 20px;
            margin-right: 20px;
            width: 350px;
            top: 0;
            right: 0;
        }

        .width-register{
            width: 1000px;
        }
        .width-token{
            width: 600px;
        }
        @media only screen and (max-width: 600px) {
            .width-register{
                width: 350px;
            }
            .width-token{
                width: 350px;
            }
            .centers-contens {
                position: absolute;
                left: 53%;
                top: 50%;
                width: 350px;
                -webkit-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
            }
        }
    </style>
    
    @if(Session::has('msgCheckToken'))
    <div class="alert alert-warning alert-bordered fade show alertMsg">
        <button class="close" data-dismiss="alert" aria-label="Close" style="cursor: pointer">×</button>
        <strong>Warning!</strong> {{ Session::get('msgCheckToken') }}
    </div>
    @elseif (Session::has('msgCheckToken'))
    <div class="alert alert-warning alert-bordered fade show alertMsg">
        <button class="close" data-dismiss="alert" aria-label="Close" style="cursor: pointer">×</button>
        <strong>Warning!</strong> {{ Session::get('msgCheckToken') }}
    </div>
    @elseif (Session::has('msgCheckTokenInvalid'))
    <div class="alert alert-info alert-bordered fade show alertMsg">
        <button class="close" data-dismiss="alert" aria-label="Close" style="cursor: pointer">×</button>
        <strong>Informasi!</strong> {{ Session::get('msgCheckTokenInvalid') }}
    </div>
    @endif

    <div wire:ignore.self class="row centers-contens {{ $form_register == true ? $widthRegister : $widthToken }}" style="background-color: white; padding: 20px; border-radius: 10px;">
        @if ($form_register == true)
        <div class="col-md-6">
            <div class="centers-contens-image">
                <img src="{{ asset('assets/img/register.svg') }}" alt="">
                <h1 class="mt-3" style="letter-spacing: 8px">REGISTER</h1>
            </div>
        </div>
        <div class="col-md-6">
            <form wire:submit.prevent="registerEditUser">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                        <input wire:model="nama_lengkap" class="form-control" type="text" placeholder="Masukkan Nama Lengkap">
                    </div>
                    @error('nama_lengkap') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                        <select wire:model="gender" class="form-control" class="" name="" id="">
                            <option value="">Pilih Gender</option>
                            <option value="1">Laki-laki</option>
                            <option value="2">Perempuan</option>
                        </select>
                    </div>
                    @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                        <input wire:model="no_phone" class="form-control" type="text" placeholder="Masukkan No Handpone">
                    </div>
                    @error('no_phone') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                        <input wire:model="email" class="form-control" type="email" name="email" placeholder="Masukkan Alamat Email" autocomplete="off">
                    </div>
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                        <input wire:model="password" class="form-control" id="password" type="password" name="password" placeholder="Password">
                    </div>
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                        <input wire:model="conf_password" class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password">
                    </div>
                    @error('conf_password') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div>
                    <div class="form-group text-left @error('terms') mb-0 @enderror">
                        <label class="ui-checkbox ui-checkbox-info">
                            <input wire:model="terms" value="Yes" type="checkbox" name="agree">
                            <span class="input-span"></span>I agree the terms and policy
                        </label>
                    </div>
                    <div class="mb-3">
                        @error('terms') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-info btn-block" type="submit">Sign up</button>
                </div>
                <div class="text-center">Already a member?
                    <a class="color-blue" href="{{ route('login') }}">Login here</a>
                </div>
            </form>
        </div>
        @else
        <div class="col-md-12">
            <div class="centers-contens-image">
                <img class="mt-4 mb-2" src="{{ asset('assets/img/register-token.png') }}" alt="Logo" width="200">
                <form wire:submit.prevent="checTokeRegisterUser">
                    <div class="text-center"><p style="font-weight: bold">Masukkan "TOKEN" pendaftaran yang diberikan oleh Admin</p></div>
                    <div class="form-group mt-3 mb-4" style="text-align: left !important">
                        <input wire:model="register_token" class="form-control" type="text" placeholder="Masukkan Token Register">
                        @error('register_token') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group mb-0">
                        <button class="btn btn-primary btn-block" type="submit">Konfirmasi</button>
                    </div>
                </form>
            </div>
        </div>
        @endif
    </div>

    <!-- Modal -->
    {{-- <div wire:init="OpenModalTokenRegis" wire:ignore.self class="modal fade" id="modal-registerToken-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Register Token</h5>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="">
                        <div class="text-center"><p style="font-weight: bold">Masukkan "TOKEN" pendaftaran yang diberikan oleh Admin</p></div>
                        <div class="form-group">
                            <input wire:model="" class="form-control" type="text" placeholder="Masukkan Token Register">
                            @error('') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group text-right mb-0">
                            <button class="btn btn-primary mb-0" type="submit">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
</div>

<script>
    window.addEventListener('open-form-modal', event => {
        $('#modal-registerToken-user').modal('show');
    });
</script>
