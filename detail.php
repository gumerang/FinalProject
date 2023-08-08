<?php
// Call file function.php
require 'function.php';

// Jika dataCustomer diklik maka
if (isset($_POST['dataCustomer'])) {
    $output = '';

    // mengambil data customer dari nis yang berasal dari dataCustomer
    $sql = "SELECT * FROM siswa WHERE customer = '" . $_POST['dataCustomer'] . "'";
    $result = mysqli_query($koneksi, $sql);

    $output .= '<div class="table-responsive">
                        <table class="table table-bordered">';
    foreach ($result as $row) {
        $output .= '
                        <tr>
                            <th width="40%">Customer ID</th>
                            <td width="60%">' . $row['customer'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Name</th>
                            <td width="60%">' . $row['nama'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Credit Card Number</th>
                            <td width="60%">' . dekripsi($row['credit']) . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Phone Number</th>
                            <td width="60%">' . $row['phone'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Company</th>
                            <td width="60%">' . $row['company'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Country</th>
                            <td width="60%">' . $row['country'] . '</td>
                        </tr>
                        ';
    }
    $output .= '</table></div>';
    // Show $output
    echo $output;
}
