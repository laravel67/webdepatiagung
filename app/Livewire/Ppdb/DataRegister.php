<?php

namespace App\Livewire\Ppdb;

use App\Models\Student;
use Livewire\Component;
use App\Rules\PhoneNumberRule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DataRegister extends Component
{
    public $id;
    public $nik, $ta_id, $nama, $umur;
    public $tempat_lahir, $tanggal_lahir, $jenis_kelamin;
    public $asal_sekolah, $npu, $tahun_lulus, $nisn;
    public $nama_ayah, $nama_ibu, $nik_ayah, $nik_ibu;
    public $desa, $kecamatan, $kabupaten, $provinsi, $alamat;
    public $status, $jenjang, $kelas;
    public $kontak, $email, $image;

    protected $listeners = [
        'uploadedImage' => 'uploadedImageHandler'
    ];

    public function mount()
    {
        $this->loadStudentData();
    }

    public function loadStudentData()
    {
        $user = Auth::user();
        if ($user->role == 'siswa') {
            $student = Student::where('email', $user->email)->first();
            if ($student) {
                $this->id = $student->id;
                $this->nik = $student->nik;
                $this->ta_id = $student->ta_id;
                $this->nama = $student->nama;
                $this->umur = $student->umur;
                $this->tempat_lahir = $student->tempat_lahir;
                $this->tanggal_lahir = $student->tanggal_lahir;
                $this->jenis_kelamin = $student->jenis_kelamin;
                $this->asal_sekolah = $student->asal_sekolah;
                $this->npu = $student->npu;
                $this->tahun_lulus = $student->tahun_lulus;
                $this->nisn = $student->nisn;
                $this->nama_ayah = $student->nama_ayah;
                $this->nama_ibu = $student->nama_ibu;
                $this->nik_ayah = $student->nik_ayah;
                $this->nik_ibu = $student->nik_ibu;
                $this->desa = $student->desa;
                $this->kecamatan = $student->kecamatan;
                $this->kabupaten = $student->kabupaten;
                $this->provinsi = $student->provinsi;
                $this->alamat = $student->alamat;
                $this->status = $student->status;
                $this->jenjang = $student->jenjang;
                $this->kelas = $student->kelas;
                $this->kontak = $student->kontak;
                $this->email = $student->email;
            }
        }
    }

    public function render()
    {
        return view('livewire.ppdb.data-register');
    }

    public function update()
    {
        sleep(2);
        sleep(2);
        $kelasValidationRule = ($this->status == 'pindahan') ? 'nullable' : 'required';
        $uniqueRules = [
            'nik' => 'required|numeric|digits:16|unique:students,nik',
            'npu' => 'required|numeric|digits:14|unique:students,npu',
            'nisn' => 'required|numeric|digits:10|unique:students,nisn',
            'nik_ayah' => 'required|numeric|digits:16|unique:students,nik_ayah',
            'nik_ibu' => 'required|numeric|digits:16|unique:students,nik_ibu',
            'kontak' => ['required', 'unique:students,kontak', new PhoneNumberRule],
        ];

        if ($this->id) {
            foreach ($uniqueRules as $key => $rule) {
                $uniqueRules[$key] .= ',' . $this->id;
            }
        }


        $validatedData = $this->validate([
            'nik' => $uniqueRules['nik'],
            'nama' => 'required|max:255',
            'umur' => 'required|digits:2',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'asal_sekolah' => 'required|max:255',
            'npu' => $uniqueRules['npu'],
            'tahun_lulus' => 'required|digits:4',
            'nisn' => $uniqueRules['nisn'],
            'nama_ayah' => 'required|max:255',
            'nama_ibu' => 'required|max:255',
            'nik_ayah' => $uniqueRules['nik_ayah'],
            'nik_ibu' => $uniqueRules['nik_ibu'],
            'desa' => 'required|max:255',
            'kecamatan' => 'required|max:255',
            'kabupaten' => 'required|max:255',
            'provinsi' => 'required|max:255',
            'status' => 'required|in:baru,pindahan',
            'jenjang' => 'required|in:mts,ma',
            'kelas' => $kelasValidationRule,
            'kontak' => $uniqueRules['kontak'],
        ], [
            'nik.required' => 'Kolom NIK harus diisi.',
            'nik.numeric' => 'Kolom NIK harus berupa angka.',
            'nik.unique' => 'NIK sudah digunakan.',
            'nik.digits' => 'NIK harus terdiri dari 16 digit.',
            'nama.required' => 'Kolom Nama harus diisi.',
            'nama.max' => 'Kolom Nama tidak boleh lebih dari 255 karakter.',
            'umur.required' => 'Kolom Umur harus diisi.',
            'umur.digits' => 'Umur harus terdiri dari 2 digit.',
            'tempat_lahir.required' => 'Kolom Tempat Lahir harus diisi.',
            'tempat_lahir.max' => 'Kolom Tempat Lahir tidak boleh lebih dari 255 karakter.',
            'tanggal_lahir.required' => 'Kolom Tanggal Lahir harus diisi.',
            'tanggal_lahir.date' => 'Kolom Tanggal Lahir harus berupa tanggal yang valid.',
            'jenis_kelamin.required' => 'Kolom Jenis Kelamin harus dipilih.',
            'jenis_kelamin.in' => 'Kolom Jenis Kelamin harus berisi L atau P.',
            'asal_sekolah.required' => 'Kolom Asal Sekolah harus diisi.',
            'asal_sekolah.max' => 'Kolom Asal Sekolah tidak boleh lebih dari 255 karakter.',
            'npu.required' => 'Kolom NPU harus diisi.',
            'npu.numeric' => 'Kolom NPU harus berupa angka.',
            'npu.unique' => 'NPU sudah digunakan.',
            'npu.max' => 'Kolom NPU tidak boleh lebih dari 14 karakter.',
            'tahun_lulus.required' => 'Kolom Tahun Lulus harus diisi.',
            'tahun_lulus.digits' => 'Tahun Lulus harus terdiri dari 4 digit.',
            'nisn.required' => 'Kolom NISN harus diisi.',
            'nisn.numeric' => 'Kolom NISN harus berupa angka.',
            'nisn.unique' => 'NISN sudah digunakan.',
            'nisn.digits' => 'NISN harus terdiri dari 10 digit.',
            'nama_ayah.required' => 'Kolom Nama Ayah harus diisi.',
            'nama_ibu.required' => 'Kolom Nama Ibu harus diisi.',
            'nik_ayah.required' => 'Kolom NIK Ayah harus diisi.',
            'nik_ibu.required' => 'Kolom NIK Ibu harus diisi.',
            'nik_ayah.numeric' => 'Kolom NIK Ayah harus berupa angka.',
            'nik_ibu.numeric' => 'Kolom NIK Ibu harus berupa angka.',
            'nik_ayah.digits' => 'NIK Ayah harus terdiri dari 16 digit.',
            'nik_ibu.digits' => 'NIK Ibu harus terdiri dari 16 digit.',
            'nik_ayah.unique' => 'NIK Ayah sudah digunakan.',
            'nik_ibu.unique' => 'NIK Ibu sudah digunakan.',
            'desa.required' => 'Kolom Desa harus diisi.',
            'desa.max' => 'Kolom Desa tidak boleh lebih dari 255 karakter.',
            'kecamatan.required' => 'Kolom Kecamatan harus diisi.',
            'kecamatan.max' => 'Kolom Kecamatan tidak boleh lebih dari 255 karakter.',
            'kabupaten.required' => 'Kolom Kabupaten harus diisi.',
            'kabupaten.max' => 'Kolom Kabupaten tidak boleh lebih dari 255 karakter.',
            'provinsi.required' => 'Kolom Provinsi harus diisi.',
            'provinsi.max' => 'Kolom Provinsi tidak boleh lebih dari 255 karakter.',
            'status.required' => 'Kolom Status Calon Siswa harus dipilih.',
            'status.in' => 'Kolom Status Calon Siswa harus berisi "baru" atau "pindahan".',
            'jenjang.required' => 'Kolom Jenjang harus dipilih.',
            'jenjang.in' => 'Kolom Jenjang harus berisi "mts" atau "ma".',
            'kelas.in' => 'Kolom Kelas harus berisi "I", "II", atau "III".',
            'kontak.max' => 'Kolom Kontak tidak boleh lebih dari 13 digit.',
            'kontak.unique' => 'Kontak sudah digunakan.',
        ]);
        $user = Auth::user();
        if ($user->role == 'siswa') {
            $student = Student::find($this->id);
            if ($student) {
                $student->update($validatedData);

                Session::flash('success', 'Data berhasil diperbarui');
                $this->loadStudentData();
            }
        }
    }

    public function uploadedImageHandler()
    {
        Session::flash('success', 'Foto berhasil diubah');
    }

    public function cancel()
    {
        $this->loadStudentData();
    }
}
