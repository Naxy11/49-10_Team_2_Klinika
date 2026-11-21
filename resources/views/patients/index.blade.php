@extends('layouts.app')

@section('title', 'Modul Manajemen Pasien')

@section('content')

    {{-- ===== FORM INPUT ===== --}}
    <div class="card">
        <h2>Input Data Pasien Baru</h2>

        <form action="{{ route('patients.store') }}" method="POST">
            @csrf

            <label for="medical_record_number">Nomor Rekam Medis Dasar:</label>
            <input type="text" name="medical_record_number" id="medical_record_number"
                   value="{{ old('medical_record_number') }}"
                   placeholder="Contoh: RM-001"
                   class="@error('medical_record_number') is-invalid @enderror">
            @error('medical_record_number')
                <p class="error-text">{{ $message }}</p>
            @enderror

            <label for="name">Nama Profil Pasien:</label>
            <input type="text" name="name" id="name"
                   value="{{ old('name') }}"
                   placeholder="Masukkan nama lengkap pasien"
                   class="@error('name') is-invalid @enderror">
            @error('name')
                <p class="error-text">{{ $message }}</p>
            @enderror

            <label for="address">Domisili (Alamat):</label>
            <textarea name="address" id="address"
                      placeholder="Masukkan alamat pasien"
                      class="@error('address') is-invalid @enderror">{{ old('address') }}</textarea>
            @error('address')
                <p class="error-text">{{ $message }}</p>
            @enderror

            <label for="emergency_contact">Kontak Darurat:</label>
            <input type="text" name="emergency_contact" id="emergency_contact"
                   value="{{ old('emergency_contact') }}"
                   placeholder="Contoh: 08123456789 (Keluarga)"
                   class="@error('emergency_contact') is-invalid @enderror">
            @error('emergency_contact')
                <p class="error-text">{{ $message }}</p>
            @enderror

            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </form>
    </div>

    {{-- ===== DAFTAR PASIEN ===== --}}
    <div class="card">
        <h2>Daftar Pasien</h2>

        <table>
            <thead>
                <tr>
                    <th>No. RM</th>
                    <th>Nama Pasien</th>
                    <th>Domisili</th>
                    <th>Kontak Darurat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($patients as $patient)
                    <tr>
                        <td>{{ $patient->medical_record_number }}</td>
                        <td>{{ $patient->name }}</td>
                        <td>{{ $patient->address }}</td>
                        <td>{{ $patient->emergency_contact }}</td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('patients.edit', $patient) }}"
                                   class="btn btn-warning">Edit</a>

                                <form action="{{ route('patients.destroy', $patient) }}" method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus data pasien ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="empty">Belum ada data pasien terdaftar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- ===== TOMBOL RESET ===== --}}
    <form action="{{ route('patients.reset') }}" method="POST"
          onsubmit="return confirm('PERINGATAN: Semua data pasien akan dihapus permanen. Lanjutkan?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-reset">Reset Semua Data</button>
    </form>

@endsection