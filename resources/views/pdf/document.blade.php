<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Example 1</title>
    <link rel="stylesheet" href="style.css" media="all"/>
    <style>
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #5D6975;
            text-decoration: underline;
        }

        body {
            position: relative;
            width: 21cm;
            height: 29.7cm;
            margin: 0 auto;
            color: #001028;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 12px;
            font-family: Arial;
        }

        header {
            padding: 10px 0;
            margin-bottom: 30px;
        }

        #logo {
            text-align: center;
            margin-bottom: 10px;
        }

        #logo img {
            width: 90px;
        }

        h1 {
            border-top: 1px solid #5D6975;
            border-bottom: 1px solid #5D6975;
            color: #5D6975;
            font-size: 2.4em;
            line-height: 1.4em;
            font-weight: normal;
            text-align: center;
            margin: 0 0 20px 0;
            background: url(dimension.png);
        }

        #project {
            float: left;
        }

        #project span {
            color: #5D6975;
            text-align: right;
            width: 52px;
            margin-right: 10px;
            display: inline-block;
            font-size: 0.8em;
        }

        #company {
            float: right;
            text-align: right;
        }

        #project div,
        #company div {
            white-space: nowrap;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
            background: #F5F5F5;
        }

        table th,
        table td {
            text-align: center;
        }

        table th {
            padding: 5px 20px;
            color: #5D6975;
            border-bottom: 1px solid #C1CED9;
            white-space: nowrap;
            font-weight: normal;
        }

        table .service,
        table .desc {
            text-align: left;
        }

        table td {
            padding: 20px;
            text-align: right;
        }

        table td.service,
        table td.desc {
            vertical-align: top;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table td.grand {
            border-top: 1px solid #5D6975;;
        }

        #notices .notice {
            color: #5D6975;
            font-size: 1.2em;
        }

        footer {
            color: #5D6975;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #C1CED9;
            padding: 8px 0;
            text-align: center;
        }
    </style>
</head>
<body>
<header class="clearfix">
    <h1>INVOICE #{{$order->id}}</h1>
    <div id="company" class="clearfix">
        <div>{{$data->title}}</div>
        <div>Facebook: <p>{{$data->facebook}}</p></div>
    </div>
    <div id="project">
        <div><span>Tên: </span> {{$order->name}}</div>
        <div><span>Địa chỉ: </span> {{$order->addres}}</div>
        <div><span>Số điện thoại: </span> {{$order->phone}}</div>
        <div><span>Ghi chú: </span>{{$order->note}}</div>
        <div><span>Trạng thái: </span>{{$order->getStatus->name}}</div>
        <div><span>Ngày đặt hàng: </span> {{$order->created_at}}</div>
    </div>
</header>
<main>
    <table>
        <thead>
        <tr>
            <th class="service">STT</th>
            <th class="desc">Tên</th>
            <th>Giá</th>
            <th>Số Lượng</th>
            <th>Tổng giá</th>
        </tr>
        </thead>
        <tbody>
        @php
            $stt = 1;
        @endphp
        @foreach($id as $item)
            @foreach($item->GetProducts as $pro)
                <tr>
                    <td class="service">{{$stt++}}</td>
                    <td class="desc">{{$pro->name}}
                    </td>
                    <td class="unit">{{number_format($item->price) . ' VND'}}</td>
                    <td class="qty">{{$item->quantity}}</td>
                    <td class="total">{{number_format($item->price * $item->quantity) . ' VND'}}</td>
                </tr>
            @endforeach
        @endforeach
        <tr>
            <td colspan="4" class="grand total">Tiền giảm:</td>
            <td class="grand total">{{number_format($order->voucher) . ' vnđ'}}</td>
        </tr>
        <tr>
            <td colspan="4" class="grand total">Tổng cộng</td>
            <td class="grand total">{{number_format($order->total_price - $order->voucher > 0 ? $order->total_price - $order->voucher : 0) . ' vnđ'}}</td>
        </tr>
        </tbody>
    </table>

</main>
<footer>
    Invoice was created on a computer and is valid without the signature and seal.
</footer>
</body>
</html>
