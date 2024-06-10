<!-- ... (bagian HTML lainnya) ... -->

<script>
    // Daftar pertanyaan dan harganya (anda bisa memperbarui sesuai kebutuhan)
    const hargaDefault = 5000;
    const daftarPertanyaan = [];

    // Fungsi untuk menambah pertanyaan dan mengupdate harga survei
    function addSection() {
        // ... (kode untuk menambah pertanyaan)

        // Menambah harga pertanyaan ke daftar
        daftarPertanyaan.push(hargaDefault);

        // Menghitung total harga survei dan memperbarui tampilan
        updateTotalHarga();
    }

    // Fungsi untuk menghapus pertanyaan dan mengupdate harga survei
    function removeSection() {
        // ... (kode untuk menghapus pertanyaan)

        // Menghapus harga pertanyaan dari daftar
        daftarPertanyaan.pop();

        // Menghitung total harga survei dan memperbarui tampilan
        updateTotalHarga();
    }

    // Fungsi untuk menghitung total harga survei dan memperbarui tampilan
    function updateTotalHarga() {
        const totalHarga = daftarPertanyaan.reduce((total, harga) => total + harga, 0);
        document.getElementById('totalHarga').innerText = totalHarga;
    }
</script>
