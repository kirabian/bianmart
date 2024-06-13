<div class="container mt-5">
        <h2 class="mb-4">Form Input Pelanggan</h2>
        <form method="post" action="config/proses_customer.php">
            <div class="form-group">
                <label for="nama_customer">Nama Pelanggan</label>
                <input type="text" class="form-control" id="nama_customer" name="nama_customer" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="nomer_telepon">Nomor Telepon</label>
                <input type="text" class="form-control" id="nomer_telepon" name="nomer_telepon" required>
            </div>
            <div class="form-group">
                <label for="payment">Metode Pembayaran</label>
                <select class="form-control" id="payment" name="payment" required>
                    <option value="dana">Dana</option>
                    <option value="gopay">GoPay</option>
                    <option value="bank">Bank</option>
                    <option value="alfamart">Alfamart</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>