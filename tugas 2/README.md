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
<img width="960" height="540" alt="Screenshot 2026-06-30 082551" src="https://github.com/user-attachments/assets/562b432e-faa2-4f09-a05f-967b5301de7b" />
<img width="960" height="540" alt="Screenshot 2026-06-30 082602" src="https://github.com/user-attachments/assets/1b71ed0a-1d9b-4269-82d4-a18b1e53ae3e" />
<img width="960" height="540" alt="Screenshot 2026-06-29 130539" src="https://github.com/user-attachments/assets/af89f342-2ae7-4dda-9122-32ddc1a511b7" />
