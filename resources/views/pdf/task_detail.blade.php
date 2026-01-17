
<head>
    <title>Task Detail - {{ $task->title }}</title>
    <style>
        body {
            font-family: sans-serif;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
        }
        .header h2 {
            margin: 0;
            color: black; /* Warna biru sesuai tema Mazer */
        }
        .meta-info {
            width: 100%;
            margin-bottom: 20px;
        }
        .meta-info td {
            padding: 5px;
            vertical-align: top;
        }
        .label {
            font-weight: bold;
            width: 120px;
        }
        .content {
            margin-top: 20px;
            border: 1px solid #eee;
            padding: 15px;
            background-color: #f9f9f9;
        }
        .status-done { color: green; }
        .status-overdue { color: red; }
        .status-pending { color: orange; }
    </style>
</head>
<body>

    <div class="header">
        <h2>Surat Perintah Kerja</h2>
        <p>Task Report Detail</p>
    </div>

    <table class="meta-info">
        <tr>
            <td class="label">Task Title:</td>
            <td>{{ $task->title }}</td>
        </tr>
        <tr>
            <td class="label">Assigned To:</td>
            {{-- Menggunakan optional() untuk mencegah error jika data employee terhapus --}}
            <td>{{ optional($task->Employee)->fullname ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td class="label">Due Date:</td>
            <td>{{ \Carbon\Carbon::parse($task->due_date)->format('d F Y') }}</td>
        </tr>
        <tr>
            <td class="label">Status:</td>
            <td>
                {{ ucfirst($task->status) }}
            </td>
        </tr>
    </table>

    <div class="content">
        <h3>Description</h3>
        <p>{{ $task->description }}</p>
    </div>
</body>