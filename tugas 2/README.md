# Tugas 2 - Laporan Transaksi

## Deskripsi
Mengimplementasikan fitur laporan transaksi pada Sistem Informasi Perpustakaan menggunakan Laravel.

## Fitur
- Halaman laporan transaksi (`/transaksi/laporan`).
- Filter berdasarkan:
  - Range tanggal (dari–sampai)
  - Status transaksi
  - Anggota
- Menampilkan tabel transaksi.
- Menampilkan total transaksi.
- Menampilkan total denda.
- Export laporan ke PDF menggunakan DomPDF.

## File yang Diubah
- `app/Http/Controllers/TransaksiController.php`
- `routes/web.php`
- `resources/views/transaksi/laporan.blade.php`
- `resources/views/transaksi/pdf.blade.php`

## Screenshoot
<img width="960" height="540" alt="Screenshot 2026-06-29 130136" src="https://github.com/user-attachments/assets/c9e32d7b-a7a3-484d-abbd-f5312d578008" />
<img width="960" height="540" alt="Screenshot 2026-06-29 130539" src="https://github.com/user-attachments/assets/af89f342-2ae7-4dda-9122-32ddc1a511b7" />

## Hasil
Fitur laporan transaksi berhasil diimplementasikan dengan filter data dan export laporan ke format PDF.
