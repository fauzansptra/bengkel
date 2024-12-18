<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: lightgrey;
        }
    </style>
</head>

<body>
    <h1><?= $title ?></h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>No Antrian</th>
                <th>Nama Pengguna</th>
                <th>Tanggal Antrian</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($getData as $row): ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $row->queue_number ?></td>
                    <td><?= $row->nama ?></td>
                    <td><?= format_datetime($row->created_at) ?></td>
                    <td><?= $row->status ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>