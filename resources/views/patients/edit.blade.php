@extends('layouts.app')

@section('title', 'Edit Data Pasien')

@section('content')

    <div class="card">
        <h2>Edit Data Pasien</h2>

        <form action="{{ route('patients.update', $patient) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="medical_record_number">Nomor Rekam Medis Dasar:</label>
            <input type="text" name="medical_record_number" id="medical_record_number"
                   value="{{ old('medical_record_number', $patient->medical_record_number) }}"
                   class="@error('medical_record_number') is-invalid @enderror">
            @error('medical_record_number')
                <p class="error-text">{{ $message }}</p>
            @enderror

            <label for="name">Nama Profil Pasien:</label>
            <input type="text" name="name" id="name"
                   value="{{ old('name', $patient->name) }}"
                   class="@error('name') is-invalid @enderror">
            @error('name')
                <p class="error-text">{{ $message }}</p>
            @enderror

            <label for="address">Domisili (Alamat):</label>
            <textarea name="address" id="address"
                      class="@error('address') is-invalid @enderror">{{ old('address', $patient->address) }}</textarea>
            @error('address')
                <p class="error-text">{{ $message }}</p>
            @enderror

            <label for="emergency_contact">Kontak Darurat:</label>
            <input type="text" name="emergency_contact" id="emergency_contact"
                   value="{{ old('emergency_contact', $patient->emergency_contact) }}"
                   class="@error('emergency_contact') is-invalid @enderror">
            @error('emergency_contact')
                <p class="error-text">{{ $message }}</p>
            @enderror

            <a href="{{ route('patients.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Update Data</button>
        </form>
    </div>

@endsection