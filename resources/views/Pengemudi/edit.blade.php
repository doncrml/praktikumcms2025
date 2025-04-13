<h1>Edit Pengemudi</h1>
<form method="POST" action="{{ route('pengemudi.update', $pengemudi['id']) }}">
    @csrf
    @method('PUT')
    Nama: <input type="text" name="nama" value="{{ $pengemudi['nama'] }}"><br>
    No SIM: <input type="text" name="no_sim" value="{{ $pengemudi['no_sim'] }}"><br>
    <button type="submit">Simpan</button>
</form>
<a href="{{ route('pengemudi.show', $pengemudi['id']) }}">← Kembali ke detail</a>
