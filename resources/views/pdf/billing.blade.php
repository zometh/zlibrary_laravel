<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Facture {{ $invoiceNumber }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.5;
            color: #333;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            margin-bottom: 5px;
            color: #3490dc;
        }
        .invoice-details {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
        }
        .customer-details {
            width: 50%;
        }
        .invoice-info {
            width: 50%;
            text-align: right;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f8f9fa;
        }
        .text-right {
            text-align: right;
        }
        .total {
            font-weight: bold;
            font-size: 16px;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>ZLibrary</h1>
        <p>Keur Massar</p>
        <p>Téléphone: +221 76 870 01 67 | Email: zomethdev@gmail.com</p>
    </div>

    <div class="invoice-details">
        <div class="customer-details">
            <h3>Facturé à:</h3>
            <p>
                <strong>{{ strtoupper($commande->user->name) }}</strong><br>
                Email: {{ $commande->user->email }}<br>

            </p>
        </div>

        <div class="invoice-info">
            <h3>Facture</h3>
            <p>
                <strong>N° de facture:</strong> {{ $invoiceNumber }}<br>
                <strong>Date:</strong> {{ $date }}<br>
                <strong>N° de commande:</strong> {{ $commande->id }}<br>
                <strong>Statut:</strong> {{ ucfirst($commande->statut) }}
            </p>
        </div>
    </div>

    <table>
        <thead>
        <tr>
            <th>Livre</th>
            <th>Auteur</th>
            <th class="text-right">Prix unitaire</th>
            <th class="text-right">Quantité</th>
            <th class="text-right">Total</th>
        </tr>
        </thead>
        <tbody>
        @foreach($commande->commande_livre as $item)
            <tr>
                <td>{{ $item->book->title }}</td>
                <td>{{ $item->book->author }}</td>
                <td class="text-right">{{ number_format($item->unit_price, 2) }} FCFA</td>
                <td class="text-right">{{ $item->quantity }}</td>
                <td class="text-right">{{ number_format($item->unit_price * $item->quantity, 2) }} FCFA</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <td colspan="4" class="text-right total">Total:</td>
            <td class="text-right total">{{ number_format($commande->total_amount, 2) }} FCFA</td>
        </tr>
        </tfoot>
    </table>

    <div class="footer">
        <p>Merci pour votre achat chez ZLibrary!</p>
        <p>Cette facture a été générée automatiquement.</p>
    </div>
</div>
</body>
</html>
