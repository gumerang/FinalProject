<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

// Menampilkan semua data dari table siswa berdasarkan customer id secara Descending
$customer = query("SELECT * FROM siswa ORDER BY customer DESC");

// Membuat nama file
$filename = "customer data-" . date('Ymd') . ".xls";

// Kodingam untuk export ke excel
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Customer Data.xls");

?>
<table class="text-center" border="1">
    <thead class="text-center">
        <tr>
            <th>No.</th>
            <th>Customer ID</th>
            <th>Name</th>
            <th>Credit Card Number</th>
            <th>Phone Number</th>
            <th>Company Name</th>
            <th>Country</th>
        </tr>
    </thead>
    <tbody class="text-center">
        <?php $no = 1; ?>
        <?php foreach ($customer as $row) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['customer']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= dekripsi($row['credit']); ?></td>
                <td><?= $row['phone']; ?></td>
                <td><?= $row['company']; ?></td>
                <td><?= $row['country']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>