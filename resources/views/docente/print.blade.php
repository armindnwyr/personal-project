<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet"> --}}
    <style>
        * {
            font-family: 'Lato', sans-serif;
        }

        .invoice-box {
            background-color: #fff;
            color: #2a2a2a;
            font-size: 16px;
            height: auto;
            line-height: 24px;
            margin: 0 auto;
            max-width: 21.5cm;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .items-table td {
            padding: 5px;
            vertical-align: top;
            border-bottom: 1px solid #eee;
        }

        .items-table th {
            padding: 5px;
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .items-table .total {
            border-top: 2px solid #eee;
            font-weight: bold;
            text-align: right;
        }

        .w-50 {
            width: 50%;
        }

        .mt {
            margin-top: 1cm;
        }

        .bold {
            font-weight: bold;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .options {
            padding: 1rem 0;
            text-align: center;
        }

        .button {
            border: none;
            color: #fff;
            padding: 0.5rem;
            border-radius: 5px;
            background-color: #6abe84;
            text-decoration: none;
            font-size: 1rem;
            display: inline-block;
        }

        .button:hover {
            cursor: pointer;
        }

        @media print {
            .invoice-box {
                margin: 0;
                padding: 0;
            }

            .options {
                display: none;
            }
        }

        @page {
            margin: 0.8cm;
        }
    </style>

    <title>Invoice</title>
</head>

<body>

    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr>

                <td class="text-center">
                    <div><span class="bold">NIT</span>: 1000000</div>
                    <div><span class="bold">INVOICE</span> #50</div>
                    <div><span class="bold">AUTHORIZATION</span>: 123456789</div>
                </td>
            </tr>
        </table>

        {{-- company information --}}
        <table class="mt" cellpadding="0" cellspacing="0">
            <tr>
                <td>
                    <div>The Best Company</div>
                    <div>Main Avenue #50</div>
                    <div>Phone: 1900-0000</div>
                    <div>Santa Cruz - Bolivia</div>
                </td>

                <td class="text-center">
                    <div class="bold">INVOICE</div>
                    <div>Business Sector</div>
                </td>
            </tr>
        </table>

        {{-- customer information --}}
        <div class="mt">
            <div><span class="bold">Place and date:</span> Santa Cruz, 27/03/2021</div>
            <div><span class="bold">To:</span> John Doe</div>
            <div><span class="bold">NIT:</span> 0</div>
        </div>

        {{-- invoice items --}}
        <table class="items-table mt" cellpadding="0" cellspacing="0">
            <thead>
                <tr class="heading">
                    <th>Item</th>
                    <th class="text-right">Quantity</th>
                    <th class="text-right">Price</th>
                </tr>
            </thead>

            {{-- @foreach ($products as $product) --}}
            <tr class="item">
                <td>{{ $docente->a_nombre }}</td>
                <td class="text-right">{{ $docente->a_paterno }}</td>
                <td class="text-right">${{ $docente->a_materno }}</td>
            </tr>
            {{-- @endforeach --}}

            <tr class="total">
                <td colspan="3">Total: $</td>
            </tr>
        </table>

        <table class="mt">
            <tr>
                <td class="w-50">
                    <img src="https://www.nacionflix.com/__export/1652186478165/sites/debate/img/2022/05/10/scarlet-witch-marvel-elizabeth-olsen-.jpg_1063812022.jpg" style="width: 5.5cm;">
                </td>

                <td class="w-50 text-center">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                    Nulla assumenda minus eligendi saepe quae omnis
                    itaque doloremque doloribus esse at sit
                    aliquid quaerat.
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
