<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Rules\PhoneNumberRule;
use Illuminate\Support\Facades\Storage;

class AdminStudentController extends Controller
{
    public function __construct()
    {
        return view()->share('title', 'Data Pendaftaran');
    }

    public function index()
    {
        return view('dashboard.daftar.index');
    }

    public function show(Student $student)
    {
        return view('dashboard.daftar.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('dashboard.daftar.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $rules = [
            'nama' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'umur' => 'required|digits:2',
            'kecamatan' => 'required|string',
            'kabupaten' => 'required|string',
            'provinsi' => 'required|string',
            'desa' => 'required|string',
            'tahun_lulus' => 'required|digits:4',
            'nama_ayah' => 'required|string',
            'nama_ibu' => 'required|string',
            'asal_sekolah' => 'required|string',
            'status' => 'required|in:baru,pindahan',
            'jenjang' => 'required|in:ma,mts',
            'kelas' => 'required|in:I,II,III',
        ];
        if ($request->nik != $student->nik) {
            $rules['nik'] = 'required|numeric|unique:students,nik';
        }
        if ($request->email != $student->email) {
            $rules['email'] = 'required|email|unique:students,email';
        }
        if ($request->kontak != $student->kontak) {
            $rules['kontak'] = ['required', 'unique:students,kontak', new PhoneNumberRule];
        }
        if ($request->nik_ayah != $student->nik_ayah) {
            $rules['nik_ayah'] = 'required|numeric|unique:students,nik_ayah';
        }
        if ($request->nik_ibu != $student->nik_ibu) {
            $rules['nik_ibu'] = 'required|numeric|unique:students,nik_ibu';
        }
        if ($request->npu != $student->npu) {
            $rules['npu'] = 'required|numeric|unique:students,npu';
        }
        if ($request->nisn != $student->nisn) {
            $rules['nisn'] = 'required|numeric|unique:students,nisn';
        }
        $validated = $request->validate($rules);
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validated['image'] = $request->file('image')->store('siswa');
        }
        Student::where('id', $student->id)->update($validated);
        return redirect(route('daftar.index'))->with('success', 'Student has been updated!');
    }
}
