<div>
    <style>
        .centers-contens {
            position: absolute;
            left: 50%;
            top: 50%;
            width: 450px;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
        .alertMsg{
            position: fixed;
            margin-top: 20px;
            margin-right: 20px;
            width: 350px;
            top: 0;
            right: 0;
        }
        @media only screen and (max-width: 600px) {
            .centers-contens {
                position: absolute;
                left: 50%;
                top: 50%;
                width: 350px;
                -webkit-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
            }
        }
    </style>
    @if(Session::has('msgUsersRegis'))
    <div class="alert alert-success alert-bordered fade show alertMsg">
        <button class="close" data-dismiss="alert" aria-label="Close" style="cursor: pointer">×</button>
        <strong>Success!</strong> {{ Session::get('msgUsersRegis') }}
    </div>
    @elseif (Session::has('msgUserNotFound'))
    <div class="alert alert-info alert-bordered fade show alertMsg">
        <button class="close" data-dismiss="alert" aria-label="Close" style="cursor: pointer">×</button>
        <strong>Infomasi!</strong> {{ Session::get('msgUserNotFound') }} 
        <a href="{{ route('register') }}" style="font-weight: bold">Daftar</a>
    </div>
    @elseif (Session::has('msgPassWrong'))
    <div class="alert alert-warning alert-bordered fade show alertMsg">
        <button class="close" data-dismiss="alert" aria-label="Close" style="cursor: pointer">×</button>
        <strong>Warning!</strong> {{ Session::get('msgPassWrong') }}
    </div>
    @elseif (Session::has('msgFlagNull'))
    <div class="alert alert-warning alert-bordered fade show alertMsg">
        <button class="close" data-dismiss="alert" aria-label="Close" style="cursor: pointer">×</button>
        <strong>Warning!</strong> {{ Session::get('msgFlagNull') }}
    </div>
    @elseif (Session::has('msgFlagN'))
    <div class="alert alert-danger alert-bordered fade show alertMsg">
        <button class="close" data-dismiss="alert" aria-label="Close" style="cursor: pointer">×</button>
        <strong>Warning!</strong> {{ Session::get('msgFlagN') }}
    </div>
    @endif
    <div class="centers-contens">
        <form wire:submit.prevent="checkUserLogin">
            <h2 class="login-title">Log in</h2>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-envelope"></i></div>
                    <input wire:model="email" class="form-control" type="email" name="email" placeholder="Email" autocomplete="off">
                </div>
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                    <input wire:model="password" class="form-control" type="password" name="password" placeholder="Password">
                </div>
                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group d-flex justify-content-between">
                <label class="ui-checkbox ui-checkbox-info">
                    <input wire:model="remember" type="checkbox">
                    <span class="input-span"></span>Remember me</label>
                <a href="forgot_password.html">Forgot password?</a>
            </div>
            <div class="form-group">
                <button class="btn btn-info btn-block" type="submit">Login</button>
            </div>
            <div class="social-auth-hr">
                <span>Register</span>
            </div>
            <div class="text-center">Ingin menjadi user?
                <a class="color-blue" href="{{ route('register') }}">Daftar disini</a>
            </div>
        </form>
    </div>
</div>
