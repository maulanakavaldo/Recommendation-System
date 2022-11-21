<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cetak Hasil Penilaian</title>

    <style>
        table {
            border-collapse: collapse;
            width: 90%;
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
            background: none;
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
    Nama : <?= $user->nama_lengkap ?>
    <br>
    <br>
    <div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Program Studi</th>
                    <!-- <th>Fakultas</th> -->
                    <th>Nilai AHP</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0; ?>
                <?php foreach ($hasil as $row) : ?>
                    <tr>
                        <td class="center"><?= ++$no ?></td>
                        <td><?= $row->nama_prodi ?></td>
                        <!-- <td><? //= $row->nama_fakultas 
                                    ?></td> -->
                        <td class="right"><?= $row->nilai_hasil ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>