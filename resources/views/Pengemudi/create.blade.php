<h1>Tambah Pengemudi</h1>
<form method="POST" action="{{ route('pengemudi.store') }}">
    @csrf
    Nama: <input type="text" name="nama"><br>
    No SIM: <input type="text" name="no_sim"><br>
    <button type="submit">Simpan</button>
</form>
<a href="{{ route('pengemudi.index') }}">← Kembali ke daftar</a>
