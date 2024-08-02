<?php

namespace App\Livewire\Ppdb;

use App\Models\Taj;
use App\Models\User;
use App\Models\Student;
use Livewire\Component;
use App\Rules\PhoneNumberRule;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public $nik;
    public $nama;
    public $umur;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $jenis_kelamin;
    public $asal_sekolah;
    public $npu;
    public $nisn;
    public $tahun_lulus;
    public $nik_ayah;
    public $nik_ibu;
    public $nama_ayah;
    public $nama_ibu;
    public $desa;
    public $kecamatan;
    public $kabupaten;
    public $provinsi;
    public $status;
    public $jenjang;
    public $kelas;
    public $kontak;
    public $email;

    public $isActive = false;
    public function render()
    {
        return view('livewire.ppdb.register');
    }
    public function submit()
    {
        sleep(2);
        $kelasValidationRule = ($this->status == 'pindahan') ? 'nullable' : 'required';
        $validatedData = $this->validate([
            'nik' => 'required|numeric|unique:students,nik|digits:16',
            'nama' => 'required|max:255',
            'umur' => 'required|digits:2',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'asal_sekolah' => 'required|max:255',
            'npu' => 'required|numeric|unique:students,npu|digits:14',
            'tahun_lulus' => 'required|digits:4',
            'nisn' => 'required|numeric|unique:students,nisn|digits:10',
            'nama_ayah' => 'required|max:255',
            'nama_ibu' => 'required|max:255',
            'nik_ayah' => 'unique:students,nik_ayah|required|numeric|digits:16',
            'nik_ibu' => 'unique:students,nik_ibu|required|numeric|digits:16',
            'desa' => 'required|max:255',
            'kecamatan' => 'required|max:255',
            'kabupaten' => 'required|max:255',
            'provinsi' => 'required|max:255',
            'status' => 'required|in:baru,pindahan',
            'jenjang' => 'required|in:mts,ma',
            'kelas' => $kelasValidationRule,
            'kontak' => ['required', 'unique:students,kontak', new PhoneNumberRule],
            'email' => [
                'required',
                'email',
                Rule::unique('students', 'email'),
                Rule::unique('users', 'email')
            ],
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
            'email.required' => 'Kolom Email harus diisi.',
            'email.email' => 'Format Email tidak valid.',
            'email.unique' => 'Email sudah ada dalam database.',
        ]);
        $activeTaj = Taj::where('status', 1)->first();
        $validatedData['ta_id'] = $activeTaj->id ?? null;
        $user = User::create([
            'name' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['kontak']),
        ]);
        Student::create($validatedData);
        Auth::login($user);
        return redirect()->route('ppdb.profile')->with('success', "Pendaftaran berhasil! Login dengan email: {$this->email} dan sandi: {$this->kontak}");
    }
    public function checkActive()
    {
        $count = Taj::where('status', 1)->count();
        return $count > 0;
    }
}
