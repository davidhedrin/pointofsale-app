<div>
    <style>
        .centers-contens {
            position: absolute;
            left: 50%;
            top: 50%;
            width: 450px;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }

        .alertMsg {
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

        .loading-center {
            position: absolute;
            top: 43%;
        }

        .spinner-spin {
            -webkit-animation-name: spin;
            -webkit-animation-duration: 1500ms;
            -webkit-animation-iteration-count: infinite;
            -webkit-animation-timing-function: linear;
            -moz-animation-name: spin;
            -moz-animation-duration: 1500ms;
            -moz-animation-iteration-count: infinite;
            -moz-animation-timing-function: linear;
            -ms-animation-name: spin;
            -ms-animation-duration: 1500ms;
            -ms-animation-iteration-count: infinite;
            -ms-animation-timing-function: linear;

            animation-name: spin;
            animation-duration: 1500ms;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @-ms-keyframes spin {
            from {
                -ms-transform: rotate(0deg);
            }

            to {
                -ms-transform: rotate(360deg);
            }
        }

        @-moz-keyframes spin {
            from {
                -moz-transform: rotate(0deg);
            }

            to {
                -moz-transform: rotate(360deg);
            }
        }

        @-webkit-keyframes spin {
            from {
                -webkit-transform: rotate(0deg);
            }

            to {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }
    </style>

    @if(Session::has('msgEmailVerify'))
    <div class="alert alert-success alert-bordered fade show alertMsg">
        <button class="close" data-dismiss="alert" aria-label="Close" style="cursor: pointer">×</button>
        <strong>Success!</strong> {{ Session::get('msgEmailVerify') }}
    </div>
    @elseif (Session::has('msgEmailVerifyLimit'))
    <div class="alert alert-warning alert-bordered fade show alertMsg">
        <button class="close" data-dismiss="alert" aria-label="Close" style="cursor: pointer">×</button>
        <strong>Warning!</strong> {{ Session::get('msgEmailVerifyLimit') }} <span class="text-danger">{{
            Session::get('msgEmailSecLimit') }}</span> detik.
    </div>
    @endif
    <div class="centers-contens">
        <h3 class="m-t-10 m-b-10">Email Verification</h3>
        <h5 class="mt-3">"{{ Auth::user()->email }}"</h5>
        <p class="mb-4 text-center">Selamat akun anda telah <span class="text-success">Disetujui</span>.
            Sebelum lanjut, Tekan tombol di bawah ini dan verifikasi E-Mail terlebih dahulu.</p>
        <div class="form-group">
            <button wire:click="sendEmailVerify" data-toggle="modal" data-target="#modal-loadingEmail-verify" class="btn btn-info btn-block"
                type="submit">Kirim Verifikasi E-Mail</button>
        </div>
        <a href="{{ route('logout') }}">Kembali</a>
    </div>


    <!-- Modal Delete User -->
    <div class="modal fade loading-center" id="modal-loadingEmail-verify" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h3><i class="fa fa-spinner spinner-spin" aria-hidden="true"></i> Kirim Verifikasi Email...</h3>
                    <span>Mohon tunggu sampai proses selesai</span>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    window.addEventListener('close-form-modal', event => {
        $('#modal-loadingEmail-verify').modal('hide');
    });
</script>