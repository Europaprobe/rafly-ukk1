<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pdf Download</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }
    </style>

</head>

<body>

    <table width="100%">
        <tr>

            <td align="left">
                <h3>Citizen! Report</h3>
            </td>
        </tr>

    </table>

    <table width="100%">
        <tr>

        </tr>

    </table>

    <br />

    <table width="100%">
        <thead style="background-color: lightgray;">
            <tr>
                <th>No</th>
                <th>Nik</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Kategori</th>
                <th>Subkategori</th>
                <th>Laporan</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($pengadu as $ad) : ?>
                <tr>
                    <td scope="row"><?= $i ?></td>
                    <td><?= $ad['nik'] ?></td>
                    <td><?= $ad['tgl'] ?></td>
                    <td><?= $ad['waktu'] ?></td>
                    <td><?= $ad['kategori_nama'] ?></td>
                    <td><?= $ad['subkategori_nama'] ?></td>
                    <td><?= $ad['laporan'] ?></td>
                </tr>
                <?php $i++ ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>