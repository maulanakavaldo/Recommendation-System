<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cetak Hasil Penilaian</title>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 14px;
        }

        th {
            height: 30px;
            text-align: center;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 3px;
        }

        thead {
            /* background: lightgray; */
        }

        .center {
            text-align: center;
        }

        .right {
            text-align: right;
        }
    </style>
</head>

<body>
    <h3 class="center">Laporan Hasil Rekomendasi </h3>
    <br>
    <br>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Program Studi</th>
                <!-- <th>Fakultas</th> -->
                <th>Nilai AHP</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
            foreach ($rek_prod as $row) : ?>
                <tr>
                    <td><?= ++$no ?></td>
                    <td><?= $row->nama ?></td>
                    <td><?= $row->nama_prodi ?></td>
                    <!-- <td><? //= $row->nama_fakultas 
                                ?></td> -->
                    <td class="right"><?= $row->nilai_hasil ?></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>