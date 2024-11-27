@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Daftar Produk</h1>
        <button
            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
            onclick="document.getElementById('addProductModal').classList.remove('hidden')"
        >
            Tambah Produk
        </button>
    </div>

    <!-- Produk Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach ($products as $product)
        <div class="bg-white shadow-md rounded overflow-hidden">
            <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/300' }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
            <div class="p-4">
                <h2 class="text-lg font-bold">{{ $product->name }}</h2>
                <p class="text-gray-600">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                <p class="text-sm text-gray-500">{{ $product->description }}</p>
                <div class="flex justify-end mt-4 space-x-2">
                    <button
                        class="text-blue-500 hover:text-blue-700"
                        onclick="openEditModal({{ $product }})"
                    >
                        Edit
                    </button>
                    <form action="{{ route('products.destroy', $product) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500 hover:text-red-700" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Modal Tambah Produk -->
<div id="addProductModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded shadow-md w-96">
        <h2 class="text-lg font-bold mb-4">Tambah Produk</h2>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm">Nama Produk</label>
                <input type="text" name="name" id="name" class="border p-2 w-full rounded">
            </div>
            <div class="mb-4">
                <label for="price" class="block text-sm">Harga Produk</label>
                <input type="number" name="price" id="price" class="border p-2 w-full rounded">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm">Deskripsi Produk</label>
                <textarea name="description" id="description" class="border p-2 w-full rounded"></textarea>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-sm">Gambar Produk</label>
                <input type="file" name="image" id="image" class="border p-2 w-full rounded">
            </div>
            <div class="flex justify-end space-x-2">
                <button type="button" class="px-4 py-2 bg-gray-300 rounded" onclick="document.getElementById('addProductModal').classList.add('hidden')">Batal</button>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Produk -->
<div id="editProductModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded shadow-md w-96">
        <h2 class="text-lg font-bold mb-4">Ubah Produk</h2>
        <form method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-sm">Nama Produk</label>
                <input type="text" name="name" id="name" class="border p-2 w-full rounded">
            </div>
            <div class="mb-4">
                <label for="price" class="block text-sm">Harga Produk</label>
                <input type="number" name="price" id="price" class="border p-2 w-full rounded">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm">Deskripsi Produk</label>
                <textarea name="description" id="description" class="border p-2 w-full rounded"></textarea>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-sm">Gambar Produk</label>
                <input type="file" name="image" id="image" class="border p-2 w-full rounded">
            </div>
            <div class="flex justify-end space-x-2">
                <button type="button" class="px-4 py-2 bg-gray-300 rounded" onclick="document.getElementById('editProductModal').classList.add('hidden')">Batal</button>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditModal(product) {
        document.getElementById('editProductModal').classList.remove('hidden');

        document.querySelector('#editProductModal [name="name"]').value = product.name;
        document.querySelector('#editProductModal [name="price"]').value = product.price;
        document.querySelector('#editProductModal [name="description"]').value = product.description;

        const form = document.querySelector('#editProductModal form');
        form.action = `/products/${product.id}`;
    }
</script>

@endsection
