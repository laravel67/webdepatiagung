<div class="col-12 mb-4">
    <div class="card-header d-flex justify-content-between">
        <div>
            <h6 class="border-gray pb-2 mb-0"><i class="fa-solid fa-user-tie"></i> Profile</h6>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-4">
                <div class="col-md-12 mb-3">
                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name', $user->name) }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                        name="username" value="{{ old('username', $user->username) }}">
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email', $user->email) }}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror"
                        name="phone" value="{{ old('phone', $user->phone) }}">
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <input type="hidden" name="oldImage" value="{{ old('image', $user->image) }}">
                    <input id="image" type="file" class=" form-control-file @error('image') is-invalid @enderror"
                        name="image" value="{{ old('image', $user->image) }}">
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-0">
                <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-success">
                        {{ __('Update') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>