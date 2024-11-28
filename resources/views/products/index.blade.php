<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Daftar Produk</h1>
            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                onclick="document.getElementById('addProductModal').classList.remove('hidden')">
                Tambah Produk
            </button>
        </div>

        <!-- Produk Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @if ($products->isEmpty())
                <p>Produk kosong</p>
            @else
                @foreach ($products as $product)
                    <div class="bg-white shadow-md rounded overflow-hidden">
                        <img src="{{ url('storage/' . $product->image) }}" alt="Produk 1"
                            class="w-full h-48 object-cover">
                        <div class="p-4">
                            {{-- <p>{{ url("storage/".$product->image) }}</p> --}}
                            <h2 class="text-lg font-bold">{{ $product->name }}</h2>
                            <p class="text-gray-600">Rp {{ $product->price }}</p>
                            <p class="text-sm text-gray-500">{{ $product->description }}</p>
                            <div class="flex justify-end mt-4 space-x-2">
                                <button class="text-blue-500 hover:text-blue-700"
                                    onclick="openEditModal({name: 'Produk 1', price: 50000, description: 'Deskripsi singkat produk'})">
                                    Edit
                                </button>
                                {{-- <form action="{{ route("products.destroy", $product->id) }}"> --}}
                                    {{-- @method("DELETE")
                                    @csrf --}}
                                    <a href="{{ route("product.destroy.new", $product->id) }}">
                                    <button class="text-red-500 hover:text-red-700" type="submit"
                                        onclick="confirm('Yakin ingin menghapus?')">Hapus</button></a>
                                    {{-- </form> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

            <!-- Tambahkan produk lainnya di sini -->
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
                    <input type="text" id="name" name="name" class="border p-2 w-full rounded">
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-sm">Harga Produk</label>
                    <input type="number" id="price" name="price" class="border p-2 w-full rounded">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm">Deskripsi Produk</label>
                    <textarea id="description" name="description" class="border p-2 w-full rounded"></textarea>
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-sm">Gambar Produk</label>
                    <input type="file" id="image" name="image" class="border p-2 w-full rounded">
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" class="px-4 py-2 bg-gray-300 rounded"
                        onclick="document.getElementById('addProductModal').classList.add('hidden')">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Produk -->
    <div id="editProductModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded shadow-md w-96">
            <h2 class="text-lg font-bold mb-4">Ubah Produk</h2>
            <form>
                <div class="mb-4">
                    <label for="edit_name" class="block text-sm">Nama Produk</label>
                    <input type="text" id="edit_name" class="border p-2 w-full rounded">
                </div>
                <div class="mb-4">
                    <label for="edit_price" class="block text-sm">Harga Produk</label>
                    <input type="number" id="edit_price" class="border p-2 w-full rounded">
                </div>
                <div class="mb-4">
                    <label for="edit_description" class="block text-sm">Deskripsi Produk</label>
                    <textarea id="edit_description" class="border p-2 w-full rounded"></textarea>
                </div>
                <div class="mb-4">
                    <label for="edit_image" class="block text-sm">Gambar Produk</label>
                    <input type="file" id="edit_image" class="border p-2 w-full rounded">
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" class="px-4 py-2 bg-gray-300 rounded"
                        onclick="document.getElementById('editProductModal').classList.add('hidden')">Batal</button>
                    <button type="button" class="px-4 py-2 bg-blue-500 text-white rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openEditModal(product) {
            document.getElementById('editProductModal').classList.remove('hidden');
            document.getElementById('edit_name').value = product.name;
            document.getElementById('edit_price').value = product.price;
            document.getElementById('edit_description').value = product.description;
        }
    </script>
</body>

</html>
