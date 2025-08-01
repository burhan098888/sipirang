<!DOCTYPE html>
<html>
<head>
    <title>Form Pinjam Ruangan</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h2 { margin-bottom: 20px; }
        p { margin: 5px 0; }
        .label { font-weight: bold; }
    </style>
</head>
<body>
    <h2>Form Pinjam Ruangan</h2>
    <p><span class="label">Kode Ruangan:</span> {{ $room->code }} - {{ $room->name }}</p>
    <p><span class="label">Gedung:</span> {{ $room->building->name ?? '-' }}</p>
    <p><span class="label">Kapasitas:</span> {{ $room->capacity }}</p>
    <p><span class="label">Mulai Pinjam:</span> {{ $data['time_start_use'] }}</p>
    <p><span class="label">Selesai Pinjam:</span> {{ $data['time_end_use'] }}</p>
    <p><span class="label">Tujuan:</span> {{ $data['purpose'] }}</p>
</body>
</html> 