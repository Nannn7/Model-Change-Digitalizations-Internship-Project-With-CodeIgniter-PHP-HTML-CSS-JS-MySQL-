<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cetak DailyCheck</title>
</head>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th,
    td {
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
</style>

<body>
    <h3 style="text-align: center">Data Hasil Daily Check</h3>
    <table>
        <tr>
            <th>No</th>
            <th>Tipe Ukur</th>
            <th>Hasil Ukur</th>
            <th>File</th>
            <th>Catatan</th>
            <th>Start Ukur</th>
            <th>Waiting Time</th>
            <th>On Ukur</th>
            <th>Lama Pengukuran</th>
            <th>Finish Ukur</th>
            <th>Total Waktu</th>
        </tr>
        <?php $i = 0; ?>
        <?php foreach ($daily as $dy) : ?>
            <tr>
                <td>
                    <?php $i++; ?>
                    <?php echo $i ?>
                </td>
                <td><?= $dy->ukur; ?></td>
                <td><?php
                    $stat = $dy->status;
                    if ($stat == 0) echo "<span class='badge badge-danger'>NG</span>";
                    else if ($stat == 1) echo "<span class='badge badge-success'>OK</span>";
                    ?>
                </td>
                <td><?= $dy->file; ?></td>
                <td><?= $dy->catatan; ?></td>
                <td><?= $dy->start_ukur; ?></td>
                <?php
                $start_time = strtotime($dy->start_ukur);
                $on_time = strtotime($dy->on_ukur);
                $total_waiting_time = round(($on_time - $start_time) / 60);
                ?>
                <td><?= $total_waiting_time . " menit"; ?></td>
                <td><?= $dy->on_ukur; ?></td>
                <?php
                $on_time = strtotime($dy->on_ukur);
                $finish_time = strtotime($dy->finish_ukur);
                $total_ukur_time = round(($finish_time - $on_time) / 60);
                ?>
                <td><?= $total_ukur_time . " menit"; ?></td>
                <td><?= $dy->finish_ukur; ?></td>
                <td>
                    <?php
                    $total_time = $total_waiting_time + $total_ukur_time;
                    echo $total_time . " menit";
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>