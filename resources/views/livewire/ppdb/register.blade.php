<div class="p-2 p-md-3 bg-white rounded shadow-sm my-lg-5">
    @if ($this->checkActive())
    <h3 class="border-bottom border-gray pb-2 mb-0 text-center">
        <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Formulir Pendafataran</font>
        </font>
    </h3>
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><i class="fa-solid fa-circle-check"></i> Selamat!</strong> {{ session('success') }} <a
            href="{{ route('login') }}" class="alert-link">Login</a>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <form class="row justify-content-start my-lg-3" wire:submit.prevent="submit">
        <div class="col-lg-6">
            <h6 class="card-header p-1 text-uppercase bg-primary text-white mb-2">Biodata</h6>
            {{-- NIK --}}
            <div class="px-0 mb-2">
                <label for="nik" class="m-0">No NIK <strong class="text-danger">*</strong></label>
                <input type="number" wire:model="nik" class="form-control rounded-0 form-control-sm @error('nik') is-invalid @enderror" id="nik" value="{{ old('nik') }}">
                @error('nik')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            {{-- Nama Lengkap --}}
            <div class="px-0 mb-2">
                <label for="nama" class="m-0">Nama Lengkap <strong class="text-danger">*</strong></label>
                <input type="text" wire:model="nama" class="form-control rounded-0 form-control-sm @error('nama') is-invalid @enderror" id="nama" value="{{ old('nama') }}"> 
                @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            {{-- Umur --}}
            <div class="px-0 mb-2">
                <label for="umur" class="m-0">Umur <strong class="text-danger">*</strong></label>
                <input type="number" wire:model="umur"
                    class="form-control rounded-0 form-control-sm @error('umur') is-invalid @enderror" id="umur"
                    value="{{ old('umur') }}">
                @error('umur')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            {{-- Tempat Lahir --}}
            <div class="px-0 mb-2">
                <label for="tempat_lahir" class="m-0">Tempat Lahir <strong class="text-danger">*</strong></label>
                <input type="text" class="form-control rounded-0 form-control-sm @error('tempat_lahir')
                            is-invalid
                        @enderror" id="tempat_lahir" value="{{ old('tempat_lahir') }}" wire:model="tempat_lahir">
                @error('tempat_lahir')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- Tanggal Lahir --}}
            <div class="px-0 mb-2">
                <label for="tanggal_lahir" class="m-0">Tanggal Lahir <strong class="text-danger">*</strong></label>
                <input type="date" wire:model="tanggal_lahir" class="form-control rounded-0 form-control-sm @error('tanggal_lahir')
                            is-invalid
                        @enderror" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                @error('tanggal_lahir')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- Jenis Kelamin --}}
            <div class="px-0 mb-2">
                <label for="jenis_kelamin" class="m-0">Jenis Kelamin <strong class="text-danger">*</strong></label>
                <select type="text" class="form-control rounded-0 form-control-sm @error('jenis_kelamin')
                            is-invalid
                        @enderror" id="jenis_kelamin" value="{{ old('jenis_kelamin') }}" wire:model="jenis_kelamin">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                </select>
                @error('jenis_kelamin')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- Nama Asal Sekolah --}}
            <div class="px-0 mb-2">
                <label for="asal_sekolah" class="m-0">Asal Sekolah <strong class="text-danger">*</strong></label>
                <input type="text" wire:model="asal_sekolah" class="form-control rounded-0 form-control-sm @error('asal_sekolah')
                            is-invalid
                        @enderror" id="asal_sekolah" value="{{ old('asal_sekolah') }}">
                @error('asal_sekolah')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- Nomor Peserta Ujian --}}
            <div class="px-0 mb-2">
                <label for="npu" class="m-0">No Peserta Ujian <strong class="text-danger">*</strong></label>
                <input type="number" wire:model="npu"
                    class="form-control rounded-0 form-control-sm @error('npu') is-invalid @enderror" id="npu"
                    value="{{ old('npu') }}">
                @error('npu')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            {{-- Nisn --}}
            <div class="px-0 mb-2">
                <label for="nisn" class="m-0">NISN <strong class="text-danger">*</strong></label>
                <input type="number" wire:model="nisn"
                    class="form-control rounded-0 form-control-sm @error('nisn') is-invalid @enderror" id="nisn"
                    value="{{ old('nisn') }}">
                @error('nisn')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="px-0 mb-2">
                <label for="tahun_lulus" class="m-0">Tahun Kelulusan <strong class="text-danger">*</strong></label>
                <input type="number" wire:model="tahun_lulus"
                    class="form-control rounded-0 form-control-sm @error('tahun_lulus') is-invalid @enderror" id="tahun_lulus"
                    value="{{ old('tahun_lulus') }}">
                @error('tahun_lulus')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-lg-6">
            <h6 class="card-header p-1 text-uppercase bg-primary text-white mb-2">Data Orang Tua/Wali</h6>
            <div class="row mb-2">
                <div class="col-md-6">
                    <label for="nik_ayah" class="m-0">NIK Orang Tua <strong
                            class="text-danger">*</strong></label>
                    <input type="number" wire:model="nik_ayah" class="form-control rounded-0 form-control-sm @error('nik_ayah')
                            is-invalid
                        @enderror" id="nik_ayah" value="{{ old('nik_ayah') }}" placeholder="Ayah">
                    @error('nik_ayah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-6 mt-lg-4">
                    <input type="number" wire:model="nik_ibu" class="form-control rounded-0 form-control-sm @error('nik_ibu')
                            is-invalid
                        @enderror" id="nik_ibu" value="{{ old('nik_ibu') }}" placeholder="Ibu">
                    @error('nik_ibu')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-6">
                    <label for="nama_ayah" class="m-0">Nama Orang Tua <strong class="text-danger">*</strong></label>
                    <input type="text" wire:model="nama_ayah" class="form-control rounded-0 form-control-sm @error('nama_ayah')
                            is-invalid
                        @enderror" id="nama_ayah" value="{{ old('nama_ayah') }}" placeholder="Ayah">
                    @error('nama_ayah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-6 mt-lg-4">
                    <input type="text" wire:model="nama_ibu" class="form-control rounded-0 form-control-sm @error('nama_ibu')
                            is-invalid
                        @enderror" id="nama_ibu" value="{{ old('nama_ibu') }}" placeholder="Ibu">
                    @error('nama_ibu')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <h6 class="card-header p-1 text-uppercase bg-primary text-white mb-2">Alamat Orang Tua</h6>
            <div class="row mb-2">
                <div class="col-md-6 mb-2">
                    <input class="form-control rounded-0 form-control-sm @error('desa')
                            is-invalid
                        @enderror" id="desa" wire:model="desa" placeholder="Desa/RW/RT">
                    @error('desa')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <input class="form-control rounded-0 form-control-sm @error('kecamatan')
                            is-invalid
                        @enderror" id="kecamatan" wire:model="kecamatan" placeholder="Kecamatan">
                    @error('kecamatan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <input class="form-control rounded-0 form-control-sm @error('kabupaten')
                            is-invalid
                        @enderror" id="kabupaten" wire:model="kabupaten" placeholder="Kabupaten">
                    @error('kabupaten')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <input class="form-control rounded-0 form-control-sm @error('provinsi')
                            is-invalid
                        @enderror" id="provinsi" wire:model="provinsi" placeholder="Provinsi">
                    @error('provinsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <h6 class="card-header p-1 text-uppercase bg-primary text-white mb-2">Status Calon Siswa</h6>
            <div class="row mb-2">
                <div class="col-md">
                    <select type="text" wire:model="status" class="form-control rounded-0 form-control-sm @error('status')
                            is-invalid
                        @enderror" id="status" value="{{ old('status') }}">
                        <option value="">-Status-</option>
                        <option value="baru">Siswa Baru</option>
                        <option value="pindahan">Siswa Pindahan</option>
                    </select>
                    @error('status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md">
                    <select type="text" wire:model="jenjang" class="form-control rounded-0 form-control-sm @error('jenjang')
                            is-invalid
                        @enderror" id="jenjang" value="{{ old('jenjang') }}">
                        <option value="">-Jenjang-</option>
                        <option value="mts">Madrasah Tsanawiyah</option>
                        <option value="ma">Madrasah Aliyah</option>
                    </select>
                    @error('jenjang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md">
                    <select type="text" wire:model="kelas" class="form-control rounded-0 form-control-sm @error('kelas')
                            is-invalid
                        @enderror" id="kelas" value="{{ old('kelas') }}">
                        <option value="">-Kelas-</option>
                        <option value="I">I</option>
                        <option value="II">II</option>
                        <option value="III">III</option>
                    </select>
                    @error('jenjang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <h6 class="card-header p-1 text-uppercase bg-primary text-white mb-2">Kontak</h6>
            <div class="row mb-md-2">
                <div class="col-md">
                    <input type="text" wire:model="kontak" class="form-control rounded-0 form-control-sm @error('kontak')
                            is-invalid
                        @enderror" id="kontak" value="{{ old('kontak') }}" placeholder="Kontak">
                    @error('kontak')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-md-2 mb-3">
                <div class="col-md">
                    <input type="email" wire:model="email" class="form-control rounded-0 form-control-sm @error('email')
                            is-invalid
                        @enderror" id="email" value="{{ old('email') }}" placeholder="Alamat email">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <button wire:loading.class="btn btn-success rounded-0 col-12 mt-3" class="btn btn-success rounded-0 col-12">
                <span wire:loading.delay.longest>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Mohon menunggu...
                </span>
                <span wire:loading.remove>
                    Daftar Sekarang
                </span>
            </button>
        </div>
    </form>
    @else
    <div class="text-center">{{ __('Pendafataran belum dibuka') }}</div>
    @endif
</div>