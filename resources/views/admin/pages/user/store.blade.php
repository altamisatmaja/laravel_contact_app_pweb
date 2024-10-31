@extends('admin.layouts.app')

@section('title', 'Dashboard | Tambah User')

@section('content')

    <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
        <form action="{{ route('admin.user.store') }}" method="POST">
            @csrf
            <div>
                <label for="nama">Nama </label>
                <input type="text" name="nama">
            </div>
            <div>
                <label for="nim">nim </label>
                <input type="text" name="nim">
            </div>
            <div>
                <label for="tanggal_lahir">tanggal_lahir </label>
                <input type="date" name="tanggal_lahir">
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>

@endsection
