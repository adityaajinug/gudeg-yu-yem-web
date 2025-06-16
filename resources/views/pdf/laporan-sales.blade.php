<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Penjualan</title>
    <style>
        body {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            font-size: 12px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h2>Laporan Penjualan</h2>
    <p>
        Periode:
        {{ \Carbon\Carbon::parse($start)->format('d M Y') }} -
        {{ \Carbon\Carbon::parse($end)->format('d M Y') }}
    </p>
    @php
    $grandTotal = 0;
@endphp

<table border="1" cellpadding="6" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Total Harga</th>
            <th>Jumlah Item</th>
            <th>Nama Menu</th>
            <th>Qty</th>
            <th>Harga</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transactions as $index => $trx)
            @php
                $rowspan = $trx->items->count();
                $grandTotal += $trx->total_price;
            @endphp

            @foreach ($trx->items as $itemIndex => $item)
                <tr>
                    @if ($itemIndex === 0)
                        <td rowspan="{{ $rowspan }}">{{ $index + 1 }}</td>
                        <td rowspan="{{ $rowspan }}">{{ \Carbon\Carbon::parse($trx->transaction_date)->format('d M Y H:i') }}</td>
                        <td rowspan="{{ $rowspan }}">Rp {{ number_format($trx->total_price, 0, ',', '.') }}</td>
                        <td rowspan="{{ $rowspan }}">{{ $trx->items->count() }}</td>
                    @endif

                    <td>{{ $item->menu->menu_name ?? '??' }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="2"><strong>Total Keseluruhan</strong></td>
            <td colspan="6"><strong>Rp {{ number_format($grandTotal, 0, ',', '.') }}</strong></td>
        </tr>
    </tfoot>
</table>
</body>

</html>
