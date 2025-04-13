<h1>Daftar Pengemudi</h1>
<ul>
    @foreach ($pengemudi as $p)
        <li>
            <a href="{{ route('pengemudi.show', $p['id']) }}">{{ $p['nama'] }}</a>
        </li>
    @endforeach
</ul>
<a href="{{ route('pengemudi.create') }}">+ Tambah Pengemudi</a>
