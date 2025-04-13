<h1>{{ $pengemudi['nama'] }}</h1>
<p>No SIM: {{ $pengemudi['no_sim'] }}</p>

<a href="{{ route('pengemudi.edit', $pengemudi['id']) }}">✏️ Edit</a> |

<form action="{{ route('pengemudi.destroy', $pengemudi['id']) }}" method="POST" style="display:inline">
    @csrf
    @method('DELETE')
    <button type="submit">🗑️ Hapus</button>
</form>

<br><br>
<a href="{{ route('pengemudi.index') }}">← Kembali ke daftar</a>
