<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body{
            background-color: #F6F6F6; 
            margin: 0;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }
        .brand-section{
           background-color: #0d1033;
           padding: 10px 40px;
        }
        .logo{
            width: 50%;
        }

        .row{
            display: flex;
            flex-wrap: wrap;
        }
        .col-6{
            width: 50%;
            flex: 0 0 auto;
        }
        .text-white{
            color: #fff;
        }
        .company-details{
            float: right;
            text-align: right;
        }
        .body-section{
            padding: 16px;
            border: 1px solid gray;
        }
        .heading{
            font-size: 20px;
            margin-bottom: 08px;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
        }
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: end;
        }
        .w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        }
        .btncol{
            color: brown
        }
    </style>
</head>
<body>

    <div class="container" id="printableArea">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h1 class="text-white">Movie Ticket Selling System</h1>
                </div>
                <div class="col-6">
                    <div class="company-details">
                        <p class="text-white">company name dibi</p>
                        <p class="text-white">adress dibi</p>
                        <p class="text-white">+91 paykhana</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="body-section">
            <div class="row">
                <div class="col-6">
                    <p class="sub-heading">Invoice id: {{ $invoice->id }}</p>
                    <p class="sub-heading">Full Name:  {{ auth()->user()-> name }}</p>
                    <p class="sub-heading">Date: {{ auth()->user()-> created_at }}</p>
                    <p class="sub-heading">Email: {{ auth()->user()-> email}} </p>
                </div>
            </div>
        </div>

        <div class="body-section">
            <h3 class="heading">Booked Ticket</h3>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th class="w-20">Movie Name</th>
                        <th class="w-10">Price</th>
                        <th class="w-10">Method</th>
                        <th class="w-10">Time</th>
                        <th class="w-10">Date</th>
                        <th class="w-10">Ticket Number</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>{{ $invoice->movie_name }}</td>
                        <td>{{ $invoice->price }}</td>
                        <td>{{ $invoice->method }}</td>
                        <td>{{ $invoice->show_time }}</td>
                        <td>{{ $invoice->show_date }}</td>
                        <td>{{ $invoice->ticket_number }}</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <h3 class="heading">Payment Status: Paid</h3>
        </div>
        <button type="button" class="float-right btncol m-3" onclick="printDiv('printableArea')">Download</button>
 </div>      
 <script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
  </script>
</body>
</html>