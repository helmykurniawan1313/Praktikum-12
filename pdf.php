<?php
include('conn.php');
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($koneksi,"select * from data");
$html = '<center><h3>Daftar Nama Siswa</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
 <tr>
 <th>No</th>
 <th>Tanggal</th>
  <th>Nama</th>
 <th>Jenis Kelamin</th>
 <th>NISN</th>
 <th>NIK/KITAS</th>
 <th>Tempat Lahir</th>
 <th>Tanggal Lahir</th>
 <th>No. Reg Akta</th>
 <th>Agama</th>
 <th>Kewarganegaraan</th>
 <th>Kebutuhan Khusus</th>
 <th>Alamat</th>
 <th>RT</th>
 <th>RW</th>
 <th>Dusun</th>
 <th>Desa</th>
 <th>Kecamatan</th>
 <th>Kode Pos</th>
 <th>Lintang</th>
 <th>Bujur</th>
 <th>Tempat Tinggal</th>
 <th>Transportasi</th>
 <th>Nomor KKS</th>
 <th>Anak Ke</th>
 <th>No. KPS / PKH</th>
 </tr>';
$no = 1;
while($row = mysqli_fetch_array($query))
{
 $html .= "<tr>
<td>".$no."</td>
<td>".$row['tanggal']."</td>
<td>".$row['nama']."</td>
<td>".$row['jenis_kelamin']."</td>
<td>".$row['NISN']."</td>
<td>".$row['NIK']."</td>
<td>".$row['Tempat_Lahir']."</td>
<td>".$row['Tanggal_Lahir']."</td>
<td>".$row['No_Akta']."</td>
<td>".$row['Agama']."</td>
<td>".$row['Kewarganegaraan']."</td>
<td>".$row['Kebutuhan_Khusus']."</td>
<td>".$row['Alamat']."</td>
<td>".$row['RT']."</td>
<td>".$row['RW']."</td>
<td>".$row['Dusun']."</td>
<td>".$row['Desa']."</td>
<td>".$row['Kecamatan']."</td>
<td>".$row['Kode_Pos']."</td>
<td>".$row['Lintang']."</td>
<td>".$row['Bujur']."</td>
<td>".$row['Tempat_Tinggal']."</td>
<td>".$row['Transportasi']."</td>
<td>".$row['Transportasi']."</td>
<td>".$row['Anak_Ke']."</td>
<td>".$row['KPS']."</td>
 </tr>";
 $no++;
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A2', 'landscape');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream();
?>