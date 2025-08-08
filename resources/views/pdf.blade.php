<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Mahasiswa</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 14px;
            line-height: 1.6;
            background-color: #f5f7fa;
            padding: 40px;
        }
        .container {
            background-color: #ffffff;
            padding: 30px 40px;
            border-radius: 10px;
            max-width: 700px;
            margin: auto;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 22px;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            padding: 10px 8px;
            vertical-align: top;
            border-bottom: 1px solid #eaeaea;
        }
        .label {
            width: 35%;
            font-weight: 600;
            color: #444;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Profil Mahasiswa</h1>
        <table>
            <tr>
    <td class="label">Nama Lengkap</td>
    <td>: {{ $user->nama }}</td>
</tr>
<tr>
    <td class="label">NIM</td>
    <td>: {{ $user->nim }}</td>
</tr>
<tr>
    <td class="label">Fakultas</td>
    <td>: {{ $user->fakultas ?? '-' }}</td>
</tr>
<tr>
    <td class="label">Program Studi</td>
    <td>: {{ $user->prodi ?? '-' }}</td>
</tr>
<tr>
    <td class="label">Email</td>
    <td>: {{ $user->email }}</td>
</tr>
<tr>
    <td class="label">Tempat Tanggal Lahir</td>
    <td>: {{ $user->tgl_lahir ?? '-' }}</td>
</tr>
<tr>
    <td class="label">Agama</td>
    <td>: {{ $user->agama ?? '-' }}</td>
</tr>
<tr>
    <td class="label">No. Telepon</td>
    <td>: {{ $user->telepon ?? '-' }}</td>
</tr>
<tr>
    <td class="label">Status Mahasiswa</td>
    <td>: {{ $user->status ?? '-' }}</td>
</tr>
<tr>
    <td class="label">Asal Negara</td>
    <td>: {{ $user->asal_negara ?? '-' }}</td>
</tr>
        </table>
    </div>
</body>
</html>
