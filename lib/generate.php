<?php
require('fpdf.php');

// Memeriksa apakah data POST telah diterima
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Memperoleh data dari formulir
    $nama = $_POST['nama'];
    $judul = $_POST['judul'];
    $tanggal = $_POST['tanggal'];

    // Membuat objek FPDF dengan orientasi landscape
    $pdf = new FPDF('L', 'mm', 'A4');
    $pdf->AddPage();

    // Menambahkan template sertifikat
    $pdf->Image('template/template_sertifikat.png', 0, 0, 297, 210); // Ubah nama dan ukuran gambar sesuai kebutuhan

    // Menambahkan informasi sertifikat
    $pdf->SetFont('times', 'B', 36 );
    $pdf->SetTextColor(0, 0, 0); // Warna teks hitam
    $pdf->SetXY(10, 125); // Atur posisi teks nama
    $pdf->Cell(0, 10, $nama, 0, 1, 'C');

    $pdf->SetFont('times', 'B', 16 );
    $pdf->SetTextColor(0, 0, 0); // Warna teks hitam
    $pdf->SetXY(10 , 156); // Atur posisi teks judul
    $pdf->Cell(0, 10, $judul, 0, 1, 'C');

    $pdf->SetFont('times', 'B', 12 );
    $pdf->SetTextColor(0, 0, 0); // Warna teks hitam
    $pdf->SetXY(105, 179); // Atur posisi teks tanggal
    $pdf->Cell(0, 10, $tanggal, 0, 1, 'L');

    // Output PDF
    $pdf->Output();
} else {
    // Jika tidak ada data POST, kembali ke halaman utama
    header("Location: /./websertif/index.html");
    exit();
}
?>
