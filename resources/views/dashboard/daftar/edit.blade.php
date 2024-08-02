<x-main>
    <form action="{{ route('daftar.update', $student->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="my-3 p-3 bg-white rounded shadow-sm rounded-0">
            <h6 class="border-bottom border-gray pb-2 mb-0"><i class="fa-solid fa-user-tie"></i> Ubah Data</h6>
            <div class="row justify-content-center mt-2">
                @if ($student->image)
                <img class="img-thumbnail" src="{{ asset('storage/'.$student->image) }}" width="200" height="200">
                @else
                <img id="previewContainer" class="img-thumbnail" src="{{ asset('frontend/img/user.svg') }}" width="200"
                    height="200">
                @endif
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="media text-muted pt-3 d-flex align-items-center">
                        <i class="fa-solid fa-xl mx-2 fa-address-card bd-placeholder-img rounded" width="52"
                            height="52"></i>
                        <div class="media-body mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <span class="text-gray-dark">NIK</span>
                            </div>
                            <input type="number" name="nik"
                                value="{{ old('nik',$student->nik) }}" class="form-control-sm form-control @error('nik')
                                is-invalid
                            @enderror">
                            @error('nik')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="media text-muted pt-3 d-flex align-items-center">
                        <i class="fa-solid fa-xl mx-2 fa-user-tie bd-placeholder-img rounded" width="52" height="52"></i>
                        <div class="media-body mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <span class="text-gray-dark">Nama Lengkap</span>
                            </div>
                            <input type="text" name="nama" value="{{ old('nama',$student->nama) }}" class="form-control-sm form-control @error('nama')
                                is-invalid
                            @enderror">
                            @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="media text-muted pt-3 d-flex align-items-center">
                        <i class="fa-brands fa-xl mx-2 fa-digital-ocean bd-placeholder-img rounded" width="52" height="52"></i>
                        <div class="media-body mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <span class="text-gray-dark">Umur</span>
                            </div>
                            <input type="number" name="umur" value="{{ old('umur',$student->umur) }}" class="form-control-sm form-control @error('umur')
                                is-invalid
                            @enderror">
                            @error('umur')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="media text-muted pt-3 d-flex align-items-center">
                        <i class="fa-solid fa-xl mx-2 fa-map-location-dot bd-placeholder-img rounded" width="52"
                            height="52"></i>
                        <div class="media-body mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <span class="text-gray-dark">Tempat Lahir</span>
                            </div>
                            <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir',$student->tempat_lahir) }}"
                                class="form-control-sm form-control @error('tempat_lahir')
                                is-invalid
                            @enderror">
                            @error('tempat_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="media text-muted pt-3 d-flex align-items-center">
                        <i class="fa-solid fa-xl mx-2 fa-calendar-days bd-placeholder-img rounded" width="52"
                            height="52"></i>
                        <div class="media-body mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <span class="text-gray-dark">Tanggal Lahir</span>
                            </div>
                            <input type="date" name="tanggal_lahir"
                                value="{{ old('tanggal_lahir',$student->tanggal_lahir) }}" class="form-control-sm form-control @error('tanggal_lahir')
                                is-invalid
                            @enderror">
                            @error('tanggal_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="media text-muted pt-3 d-flex align-items-center">
                        <i class="fa-solid fa-xl mx-2 
                        @if ($student->jenis_kelamin=='L')
                            fa-mars
                        @else
                            fa-venus
                        @endif
                        bd-placeholder-img rounded" width="52" height="52"></i>
                        <div class="media-body mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <span class="text-gray-dark">Jenis Kelamin</span>
                            </div>
                            <select name="jenis_kelamin"
                                class="form-control-sm form-control @error('jenis_kelamin') is-invalid @enderror">
                                <option value="L" @if(old('jenis_kelamin',$student->jenis_kelamin)=='L') selected
                                    @endif>Laki-laki</option>
                                <option value="P" @if(old('jenis_kelamin',$student->jenis_kelamin)=='P') selected
                                    @endif>Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
    
    
                    <div class="media text-muted pt-3 d-flex align-items-center">
                        <i class="fa-solid fa-xl mx-2 fa-globe bd-placeholder-img rounded" width="52" height="52"></i>
                        <div class="media-body mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <span class="text-gray-dark">Nomor Peserta Ujian</span>
                            </div>
                          <input type="number" name="npu" value="{{ old('npu',$student->npu) }}" class="form-control-sm form-control @error('npu')
                                is-invalid
                            @enderror">
                            @error('npu')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="media text-muted pt-3 d-flex align-items-center">
                        <i class="fa-solid fa-xl mx-2 fa-earth-asia bd-placeholder-img rounded" width="52" height="52"></i>
                        <div class="media-body mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <span class="text-gray-dark">NISN</span>
                            </div>
                            <input type="number" name="nisn" value="{{ old('nisn',$student->nisn) }}" class="form-control-sm form-control @error('nisn')
                                is-invalid
                            @enderror">
                            @error('nisn')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="media text-muted pt-3 d-flex align-items-center">
                        <i class="fa-solid fa-xl mx-2 fa-user-graduate bd-placeholder-img rounded" width="52" height="52"></i>
                        <div class="media-body mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <span class="text-gray-dark">Tahun Kelulusan</span>
                            </div>
                            <input type="number" name="tahun_lulus" value="{{ old('tahun_lulus',$student->tahun_lulus) }}" class="form-control-sm form-control @error('tahun_lulus')
                                is-invalid
                            @enderror">
                            @error('tahun_lulus')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="media text-muted pt-3 d-flex align-items-center">
                        <i class="fa-solid fa-xl mx-2 fa-location-dot    bd-placeholder-img rounded" width="52"
                            height="52"></i>
                        <div class="media-body mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <span class="text-gray-dark">Desa/Kecamatan/Kabupaten/Provinsi</span>
                            </div>
                            <div class="d-flex justify-content-around">
                                <div>
                                    <input type="text" name="desa" value="{{ old('desa',$student->desa) }}"
                                        class="form-control-sm form-control @error('desa')
                                    is-invalid
                                    @enderror">
                                        @error('desa')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div>
                                    <input type="text" name="kecamatan" value="{{ old('kecamatan',$student->kecamatan) }}"
                                        class="form-control-sm form-control @error('kecamatan')
                                is-invalid
                                @enderror">
                                    @error('kecamatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div>
                                    <input type="text" name="kabupaten" value="{{ old('kabupaten',$student->kabupaten) }}"
                                        class="form-control-sm form-control @error('kabupaten')
                                is-invalid
                                @enderror">
                                    @error('kabupaten')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div>
                                    <input type="text" name="provinsi" value="{{ old('provinsi',$student->provinsi) }}"
                                        class="form-control-sm form-control @error('provinsi')
                                is-invalid
                                @enderror">
                                    @error('provinsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="media text-muted pt-3 d-flex align-items-center">
                        <i class="fa-solid fa-xl mx-2 fa-user-group bd-placeholder-img rounded" width="52" height="52"></i>
                        <div class="media-body mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <span class="text-gray-dark">Nama Orang Tua</span>
                            </div>
                            <div class="d-flex">
                                <div class="d-flex mr-3 align-items-center">
                                    Ayah<input type="text" name="nama_ayah"
                                        value="{{ old('nama_ayah',$student->nama_ayah) }}" class="form-control-sm form-control @error('nama_ayah')
                                is-invalid
                                @enderror">
                                    @error('nama_ayah')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="d-flex align-items-center">
                                    Ibu<input type="text" name="nama_ibu" value="{{ old('nama_ibu',$student->nama_ibu) }}"
                                        class="form-control-sm form-control @error('nama_ibu')
                                is-invalid
                                @enderror">
                                    @error('nama_ibu')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="media text-muted pt-3 d-flex align-items-center">
                        <i class="fa-solid fa-xl mx-2 fa-briefcase bd-placeholder-img rounded" width="52" height="52"></i>
                        <div class="media-body mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100 text-nowrap">
                                <span class="text-dark">NIK Orang Tua:</span>
                            </div>
                            <div class="d-flex">
                                <div class="d-flex mr-3 align-items-center">
                                    Ayah<input type="number" name="nik_ayah"
                                        value="{{ old('nik_ayah',$student->nik_ayah) }}" class="form-control-sm form-control @error('nik_ayah')
                                is-invalid
                                @enderror">
                                    @error('nik_ayah')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="d-flex align-items-center">
                                    Ibu<input type="number" name="nik_ibu"
                                        value="{{ old('nik_ibu',$student->nik_ibu) }}" class="form-control-sm form-control @error('nik_ibu')
                                is-invalid
                                @enderror">
                                    @error('nik_ibu')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="media text-muted pt-3 d-flex align-items-center">
                        <i class="fa-solid fa-xl mx-2 fa-phone bd-placeholder-img rounded" width="52" height="52"></i>
                        <div class="media-body mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100 text-nowrap">
                                <span class="text-dark">Nomor Telpon/Whatsapp Orang Tua:</span>
                            </div>
                              <input type="text" name="kontak" value="{{ old('kontak',$student->kontak) }}"
                                class="form-control-sm form-control @error('kontak')
                                is-invalid
                                @enderror">
                            @error('kontak')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="media text-muted pt-3 d-flex align-items-center">
                        <i class="fa-solid fa-xl mx-2 fa-school-flag bd-placeholder-img rounded" width="52" height="52"></i>
                        <div class="media-body mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <span class="text-gray-dark">Asal Sekolah</span>
                            </div>
                            <input type="text" name="asal_sekolah" value="{{ old('asal_sekolah',$student->asal_sekolah) }}"
                                class="form-control-sm form-control @error('asal_sekolah')
                                is-invalid
                                @enderror">
                            @error('asal_sekolah')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="media text-muted pt-3 d-flex align-items-center">
                        <i class="fa-solid fa-xl mx-2 fa-circle-info bd-placeholder-img rounded" width="52" height="52"></i>
                        <div class="media-body mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <span class="text-gray-dark">Status</span>
                            </div>
                            <select name="status"
                                class="form-control-sm form-control @error('status') is-invalid @enderror">
                                <option value="baru" @if(old('status',$student->status)=='baru') selected
                                    @endif>Siswa/Santri
                                    Baru</option>
                                <option value="pindahan" @if(old('status',$student->status)=='pindahan') selected
                                    @endif>Siswa/Santri
                                    Pindahan</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="media text-muted pt-3 d-flex align-items-center">
                        <i class="fa-solid fa-xl mx-2 fa-landmark bd-placeholder-img rounded" width="52" height="52"></i>
                        <div class="media-body mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <span class="text-gray-dark">Jenjang</span>
                            </div>
                            <select name="jenjang"
                                class="form-control-sm form-control @error('jenjang') is-invalid @enderror">
                                <option value="ma" @if(old('jenjang',$student->jenjang)=='ma') selected @endif>Madrasah
                                    Aliyah
                                </option>
                                <option value="mts" @if(old('jenjang',$student->jenjang)=='mts') selected @endif>Madrasah
                                    Tsanawiyah
                                </option>
                            </select>
                            @error('jenjang')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="media text-muted pt-3 d-flex align-items-center">
                        <i class="fa-solid fa-xl mx-2 fa-medal bd-placeholder-img rounded" width="52" height="52"></i>
                        <div class="media-body mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <span class="text-gray-dark">Kelas</span>
                            </div>
                            <select name="kelas" class="form-control-sm form-control @error('kelas') is-invalid @enderror">
                                <option value="I" @if(old('kelas',$student->kelas)=='I') selected @endif>
                                    I
                                </option>
                                <option value="II" @if(old('kelas',$student->kelas)=='II') selected @endif>
                                    II
                                </option>
                                <option value="III" @if(old('kelas',$student->kelas)=='III') selected @endif>
                                    III
                                </option>
                            </select>
                            @error('kontak')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="media text-muted pt-3 d-flex align-items-center">
                        <i class="fa-solid fa-xl mx-2 fa-envelope bd-placeholder-img rounded" width="52" height="52"></i>
                        <div class="media-body mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <span class="text-gray-dark">Alamat Email</span>
                            </div>
                            <input type="email" name="email" value="{{ old('email',$student->email) }}" class="form-control-sm form-control @error('email')
                                is-invalid
                                @enderror">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="media text-muted pt-3 d-flex align-items-center">
                        <i class="fa-solid fa-xl mx-2 fa-camera bd-placeholder-img rounded" width="52" height="52"></i>
                        <div class="media-body mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <span class="text-gray-dark">Upload Foto</span>
                            </div>
                            <input type="hidden" name="oldImage" value="{{ $student->image }}">
                            <input type="file" name="image" id="image" class=" @error('image')
                                is-invalid
                                @enderror" onchange="previewImage()">
                            @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="media text-muted pt-3 d-flex align-items-center">
                        <div class="media-body mb-0 small lh-125 border-bottom border-gray text-right">
                            <a href="{{ route('daftar.index') }}" class="btn btn-sm btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-sm btn-success">Simpan Perubahan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @include('dashboard.daftar.script')
</x-main>
                