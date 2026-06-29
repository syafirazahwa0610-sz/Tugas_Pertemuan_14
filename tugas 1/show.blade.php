<x-app-layout>

    <x-slot name="header">
        <h2 class="fw-bold">
            Detail Transaksi
        </h2>
    </x-slot>

    <div class="container py-4">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">

            <div class="card-body">

                <table class="table">

                    <tr>
                        <th>Kode</th>
                        <td>{{ $transaksi->kode_transaksi }}</td>
                    </tr>

                    <tr>
                        <th>Anggota</th>
                        <td>{{ $transaksi->anggota->nama }}</td>
                    </tr>

                    <tr>
                        <th>Buku</th>
                        <td>{{ $transaksi->buku->judul }}</td>
                    </tr>

                    <tr>
                        <th>Tanggal Pinjam</th>
                        <td>{{ $transaksi->tanggal_pinjam->format('d M Y') }}</td>
                    </tr>

                    <tr>
                        <th>Jatuh Tempo</th>
                        <td>{{ $transaksi->tanggal_kembali->format('d M Y') }}</td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td>{{ $transaksi->status }}</td>
                    </tr>

                    <tr>
                        <th>Denda</th>
                        <td>
                            Rp {{ number_format($transaksi->denda ?? 0,0,',','.') }}
                        </td>
                    </tr>

                </table>

                @if($transaksi->status == 'Dipinjam')

                    <form action="{{ route('transaksi.kembalikan',$transaksi->id) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <button class="btn btn-success">
                            Kembalikan Buku
                        </button>

                    </form>

                @endif

                <a href="{{ route('transaksi.index') }}" class="btn btn-secondary mt-2">
                    Kembali
                </a>

            </div>

        </div>

    </div>

</x-app-layout>