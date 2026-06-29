<x-app-layout>

    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fw-bold mb-0">
                Dashboard Perpustakaan
            </h2>
        </div>
    </x-slot>

    @php
        $terlambat = \App\Models\Transaksi::with(['anggota','buku'])
            ->where('status','Dipinjam')
            ->whereDate('tanggal_kembali','<',now())
            ->get();
    @endphp

    <div class="container py-4">

        {{-- Statistik --}}
        <div class="row g-4 mb-4">

            <div class="col-lg-3 col-md-6">
                <div class="card shadow-sm border-primary h-100">
                    <div class="card-body">
                        <h6 class="text-muted">Total Buku</h6>
                        <h2>{{ \App\Models\Buku::count() }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card shadow-sm border-success h-100">
                    <div class="card-body">
                        <h6 class="text-muted">Total Anggota</h6>
                        <h2>{{ \App\Models\Anggota::count() }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card shadow-sm border-warning h-100">
                    <div class="card-body">
                        <h6 class="text-muted">Sedang Dipinjam</h6>
                        <h2>
                            {{ \App\Models\Transaksi::where('status','Dipinjam')->count() }}
                        </h2>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card shadow-sm border-info h-100">
                    <div class="card-body">
                        <h6 class="text-muted">Transaksi Hari Ini</h6>
                        <h2>
                            {{ \App\Models\Transaksi::whereDate('created_at',today())->count() }}
                        </h2>
                    </div>
                </div>
            </div>

        </div>

        {{-- Buku Terlambat --}}
        <div class="card border-danger shadow-sm mb-4">

            <div class="card-header bg-danger text-white">
                <strong>📢 Buku Terlambat</strong>
            </div>

            <div class="card-body">

                <h2 class="text-danger">
                    {{ $terlambat->count() }}
                </h2>

                <p class="text-muted">
                    Transaksi terlambat
                </p>

                @if($terlambat->count())

                    <ul class="list-group">

                        @foreach($terlambat as $item)

                            <li class="list-group-item d-flex justify-content-between">

                                <div>
                                    <strong>{{ $item->anggota->nama }}</strong><br>
                                    {{ $item->buku->judul }}
                                </div>

                                <span class="badge bg-danger align-self-center">
                                    {{ $item->tanggal_kembali->startOfDay()->diffInDays(now()->startOfDay()) }} Hari
                                </span>

                            </li>

                        @endforeach

                    </ul>

                @else

                    <div class="alert alert-success mb-0">
                        Tidak ada buku yang terlambat.
                    </div>

                @endif

            </div>

        </div>

        {{-- Aksi Cepat --}}
        <div class="card shadow-sm mb-4">

            <div class="card-header">
                <strong>Aksi Cepat</strong>
            </div>

            <div class="card-body">

                <div class="row g-3">

                    <div class="col-md-3">
                        <a href="{{ route('buku.create') }}" class="btn btn-primary w-100">
                            Tambah Buku
                        </a>
                    </div>

                    <div class="col-md-3">
                        <a href="{{ route('anggota.create') }}" class="btn btn-success w-100">
                            Tambah Anggota
                        </a>
                    </div>

                    <div class="col-md-3">
                        <a href="{{ route('transaksi.create') }}" class="btn btn-warning w-100 text-dark">
                            Pinjam Buku
                        </a>
                    </div>

                    <div class="col-md-3">
                        <a href="{{ route('transaksi.index') }}" class="btn btn-secondary w-100">
                            Lihat Transaksi
                        </a>
                    </div>

                </div>

            </div>

        </div>

        {{-- Transaksi Terbaru --}}
        <div class="card shadow-sm">

            <div class="card-header">
                <strong>Transaksi Terbaru</strong>
            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered table-hover">

                        <thead class="table-light">
                            <tr>
                                <th>Kode</th>
                                <th>Anggota</th>
                                <th>Buku</th>
                                <th>Tanggal Pinjam</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>

                        @forelse(\App\Models\Transaksi::with(['anggota','buku'])->latest()->take(5)->get() as $transaksi)

                            <tr>

                                <td>{{ $transaksi->kode_transaksi }}</td>

                                <td>{{ $transaksi->anggota->nama }}</td>

                                <td>{{ $transaksi->buku->judul }}</td>

                                <td>{{ $transaksi->tanggal_pinjam->format('d M Y') }}</td>

                                <td>

                                    @if($transaksi->status == 'Dipinjam')

                                        @if(now()->gt($transaksi->tanggal_kembali))

                                            <span class="badge bg-danger">
                                                Terlambat
                                            </span>

                                        @else

                                            <span class="badge bg-warning text-dark">
                                                Dipinjam
                                            </span>

                                        @endif

                                    @else

                                        <span class="badge bg-success">
                                            Dikembalikan
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="text-center">
                                    Belum ada transaksi
                                </td>
                            </tr>

                        @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>