<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>
    <style>
        table{
            border-collapse: collapse;
        }
        table, td, th {
            border: 1px solid black;
        }
        h2{
            text-align: center;
        }
        table thead tr th{
            background: #e1e1e1;
        }
        table th{
            padding: 5px;
            font-size: 12pt;
        }
        table td{
            padding: 3px 5px;
            font-size: 11pt;
        }
    </style>
</head>
<body onload="window.print()">
<h2>Data Laporan Penelitian</h2>
<table align="center">
    <thead>
    <tr>
        <th align="center">No</th>
        <th>Tanggal Usulan</th>
        <th>Skema Penelitian</th>
        <th>Judul</th>
        <th>Bidang Kajian</th>
        <th>Dana Penelitian</th>
        <th>Ketua</th>
        <th>Verifikasi</th>
    </tr>
    </thead>
    <tbody>
    <?php $i=1; foreach($data_usulan as $data) { ?>
        <tr>
            <td align="center"><?php echo $i; ?></td>
            <td align="center"><?php echo $data['tgl_usulan']; ?></td>
            <td align="center"><?php echo $data['skema']; ?></td>
            <td align="center"><?php echo $data['judul']; ?></td>
            <td align="center"><?php echo $data['bidang_kajian']; ?></td>
            <td align="center"><?php echo $data['pendanaan_name']; ?></td>
            <td align="center"><?php echo $data['ketua']; ?></td>
            <td align="center"><?php echo $data['verifikasi']; ?></td>
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>
</body>
</html>