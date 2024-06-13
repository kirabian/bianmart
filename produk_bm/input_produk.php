<div class="container my-4">
    <h2 class="mb-4">Tambah Produk Baru</h2>
    <form method="post" enctype="multipart/form-data" action="./config/proses_produk.php?aksi=submit">
        <div class="form-group">
            <label for="nama_produk">Nama Produk:</label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
        </div>
        <div class="form-group">
            <label for="harga_produk">Harga Produk:</label>
            <input type="text" class="form-control" id="harga_produk" name="harga_produk" required>
        </div>
        <div class="form-group">
            <label for="detail_produk">Detail Produk:</label>
            <textarea class="form-control" id="detail_produk" name="detail_produk" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label for="kategori">Kategori Produk:</label>
            <select class="form-control" id="kategori" name="kategori" required>
                <option value="Elektronik">Elektronik</option>
                <option value="Fashion">Fashion</option>
                <option value="Gadget">Gadget</option>
                <option value="Rumah Tangga">Rumah Tangga</option>
            </select>
        </div>
        <div class="form-group">
            <label for="gambar_produk">Gambar Produk:</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="gambar_produk" name="gambar_produk" accept="image/*" required>
                <label class="custom-file-label" for="gambar_produk">Pilih file</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block" name="submit">Tambah Produk</button>
    </form>
</div>
