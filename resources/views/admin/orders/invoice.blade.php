
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Invoice #{{$order->order_number}}</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
        .flex{
          display: flex;
          justify-content: space-between
        }
        .mx{
          margin-right: 10px;
          margin-left: 10px
        }
        .my{
          margin-top: 10px;
          margin-bottom: 10px;
        }
    </style>
</head>
<body>

  <div>
    <table style="">
      <tr>
        <th style="text-align: left;border:0px solid white;"><h4 class="font-bold">Invoice #{{$order->order_number}}</h4></th>


        <th style="text-align: right">

          <h4>{{$shop_info->shop_name}}</h4>
           {!! $shop_info->shop_location !!}
              <b class='mt-0'> Date : {{date('d / F / Y',strtotime($order->created_at))}}
            </b>
        </th>
      </tr>
     
    </table>
  

      

      <div class="my">
        <h4>Bill To </h4>
        <span>
          <span><b>Name :</b> {{$order->name}}</span>
          <br />
          <span><b>Contact No :</b> {{$order->contact}}</span>
          <br />
          <b>Address : </b>
          
         <span> {{$order->address}},</span>
         <br />
          <span>  {{$order->sub_district}},</span>
      
          <span>{{$order->district}},</span>
         
         <span> {{$order->division}}</span>
        </span>
        <br>
      <b>Payment Option:{{$order->payment_type}}</b>
      </div>
      <table class="table table-responsive mt-3 w-100">
        <thead>
          <tr>
            <th scope="col">ITEM</th>
            <th>QTY/SIZE</th>
            <th>PRICE</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($order->orderItems as $item)
          <tr>
            <td scope="row">
              {!! substr($item->product->name,0,100) !!}</td>
            <td scope="row">{{$item->quantity}}
              <p>@if ($item->size)
                Size : {{$item->size}}
              @endif</p>
            </td>
            <td scope="row">
              <b>BDT</b> {{$item->product->selling_price}}</td>
          </tr>
          @endforeach
         
        </tbody>
      </table>

      <hr>

      <div >
        <table>
        

        


          <tr >
            <th style="text-align: left">Total  </th>
            <th style="text-align: right"><b>BDT</b> {{$order->total}}</th>
          </tr>
        </table>
        
        
        

        
    </div>
      </div>
    </div>
  
    
  </div>    


</body>
</html>