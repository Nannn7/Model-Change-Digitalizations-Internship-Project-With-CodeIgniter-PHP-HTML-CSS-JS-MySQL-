<!DOCTYPE html>
<html lang="en"><head>
    <title>Cetak GantiModel</title>
</head><style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style><body>
	<h3 style="text-align: center">Data Hasil Ganti Model</h3>
	<?php foreach ($gm as $m) : ?>
	<h5><b>Line : <?= $m->line; ?></b></h5>
	<h5><b>product : <?= $m->product; ?></b></h5>
	<h5><b>Tanggal Mulai GM : <?= $m->start_gm; ?></b></h5>
	<?php endforeach; ?>
    <table>
        <tr>
            <th>No</th>
			<th>Line</th>
			<th>Product</th>
            <th>Tipe Ukur</th>
            <th>Hasil Ukur</th>
            <!-- <th>File</th> -->
            <th>Catatan</th>
            <th>In Ukur</th>
            <th>Waiting Time</th>
            <th>On Ukur</th>
            <th>Lama Pengukuran</th>
            <th>Out Ukur</th>
            <th>Total Waktu</th>
        </tr>
        <?php $i = 0; ?>
        <?php foreach ($measure as $m) : ?>
            <tr>
                <td>
                    <?php $i++; ?>
                    <?php echo $i ?>
                </td>
				<td><?= $m->line; ?></td>
				<td><?= $m->product; ?></td>
                <td><?= $m->ukur; ?></td>
				<td><?php
					$stat = $m->status;
					if ($stat == 0) echo "<span class='badge badge-danger'>NG</span>";
					else if ($stat == 1) echo "<span class='badge badge-success'>OK</span>";
					?>
				</td>
                <!-- <td><?= $m->file; ?></td> -->
                <td><?= $m->catatan; ?></td>
                <td><?= $m->start_ukur; ?></td>
				<?php
				$start_time = strtotime($m->start_ukur);
                $on_time = strtotime($m->on_ukur);
                $total_waiting_time = round(($on_time - $start_time) / 60);
				?>
                <td><?= $total_waiting_time . " menit"; ?></td>
                <td><?= $m->on_ukur; ?></td>
				<?php
				$on_time = strtotime($m->on_ukur);
                $finish_time = strtotime($m->finish_ukur);
                $total_ukur_time = round(($finish_time - $on_time) / 60);
				?>
                <td><?= $total_ukur_time . " menit"; ?></td>
                <td><?= $m->finish_ukur; ?></td>
                <td>
					<?php
                    $total_time = $total_waiting_time + $total_ukur_time;
                    echo $total_time . " menit";
                    ?>
				</td>
            </tr>
        <?php endforeach; ?>
    </table>
</body></html>