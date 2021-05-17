{{-- Mengambil template dari master --}}
@extends('template.master')

{{-- Memberi nama judul pada tab browser --}}
@section('title', 'Beranda')

{{-- Memberi nama judul header content --}}
@section('header', 'Beranda')
    
{{-- isi content  --}}
@section('content')
    
@endsection

{{-- isi javascript --}}
@push('script')

@endpush