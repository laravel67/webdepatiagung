<div class="col-12 mb-4">
    <div class="card-header">
        <div>
            <h6 class="border-gray pb-2 mb-0"><i class="fa-solid fa-key"></i> Ganti kata Sandi</h6>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="password" class="text-md-end">{{ __('Kata Sandi Baru')
                        }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">

                <div class="col-md-12">
                    <label for="password-confirm" class="text-md-end">{{ __('Konfirmasi Kata Sandi')
                        }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password">
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-success">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>