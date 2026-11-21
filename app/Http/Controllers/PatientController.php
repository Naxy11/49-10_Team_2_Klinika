<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PatientController extends Controller
{

    public function index()
    {
        $patients = Patient::latest()->get();

        return view('patients.index', compact('patients'));
    }

    /**
     * CREATE: simpan pasien baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            $this->rules(),
            $this->messages()
        );

        Patient::create($validated);

        return redirect()->route('patients.index')
            ->with('success', 'Data pasien berhasil disimpan!');
    }

    /**
     * Tampilkan form edit.
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * UPDATE: perbarui data pasien.
     */
    public function update(Request $request, Patient $patient)
    {
        $validated = $request->validate(
            $this->rules($patient),
            $this->messages()
        );

        $patient->update($validated);

        return redirect()->route('patients.index')
            ->with('success', 'Data pasien berhasil diperbarui!');
    }

    /**
     * DELETE: hapus satu pasien.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patients.index')
            ->with('success', 'Data pasien berhasil dihapus!');
    }

    /**
     * RESET: hapus seluruh data pasien.
     */
    public function reset()
    {
        Patient::truncate();

        return redirect()->route('patients.index')
            ->with('success', 'Semua data pasien berhasil direset!');
    }

    /**
     * Aturan validasi (dipakai store & update).
     */
    private function rules(?Patient $patient = null): array
    {
        return [
            'medical_record_number' => [
                'required',
                'string',
                'max:50',
                Rule::unique('patients', 'medical_record_number')->ignore($patient?->id),
            ],
            'name'              => ['required', 'string', 'max:255'],
            'address'           => ['required', 'string'],
            'emergency_contact' => ['required', 'string', 'max:100'],
        ];
    }

    /**
     * Pesan error dalam Bahasa Indonesia.
     */
    private function messages(): array
    {
        return [
            'medical_record_number.required' => 'Nomor rekam medis wajib diisi.',
            'medical_record_number.unique'   => 'Nomor rekam medis sudah terdaftar.',
            'medical_record_number.max'      => 'Nomor rekam medis maksimal 50 karakter.',
            'name.required'                  => 'Nama pasien wajib diisi.',
            'name.max'                       => 'Nama pasien maksimal 255 karakter.',
            'address.required'               => 'Domisili (alamat) wajib diisi.',
            'emergency_contact.required'     => 'Kontak darurat wajib diisi.',
            'emergency_contact.max'          => 'Kontak darurat maksimal 100 karakter.',
        ];
    }
}