<!DOCTYPE html>
<html lang="fa" dir="rtl">
   <head>
      <title>چاپ فاکتور</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css">
      <link rel="stylesheet" type="text/css" href="{{asset('assets/css/marco.css')}}">
      <style>
         @page {
            size: 'A5'
         }
         body {
            font-weight: 300;
            line-height: 1.42em;
            color:#424242;
            background-color:#1F2739;
            text-align: center;
            font-size: 13px;
            font-family: 'Marco';
         }
         body.A5 .sheet {
            margin: 20px auto;
        }
         input{
            font-family: 'Marco';
         }
         h1 {
            font-size:3em; 
            font-weight: 300;
            line-height:1em;
            color: #4DC3FA;
         }
         label{
            padding-top: 2px;
            float: right;
         }
         .blue { color: #185875; }
         .yellow { color: #FFF842; }

         .container th h1 {
            font-size: 1em;
            color: #185875;
         }
         .container td {
            font-size: 1em;
            -webkit-box-shadow: 0 2px 2px -2px #0E1119;
            -moz-box-shadow: 0 2px 2px -2px #0E1119;
            box-shadow: 0 2px 2px -2px #0E1119;
         }
         .container {
            overflow: hidden;
            width: 100%;
            margin: 0 auto;
            display: table;
         }
         .over{
            box-shadow: 0px 0px 3px #000;
            padding: 13px;
            border-radius: 5px;
            height:65%;
         }
         .p-1{padding:.25rem}
         .pt-1{padding-top:.25rem}
         .p-2{padding:.5rem}
         .pt-2{padding-top:.5rem}
         .p-3{padding:1rem}
         .pt-3{padding-top:1rem}
         .p-4{padding:1.5rem}
         .p-5{padding:3rem}
         .m-1{margin:.25rem}
         .mt-1{margin-top:.25rem}
         .m-2{margin:.5rem}
         .m-3{margin:1rem}
         .m-4{margin:1.5rem}
         .m-5{margin:3rem}
         .pb-1{padding-bottom:1px;}
         .pb-2{padding-bottom:2px;}
         .container td, .container th {
            padding:5px;
         }
         input{
            text-align:center;
         }
         .border{
            border: 1px solid #616161;
         }
         .radius{
            border-radius:5px;
         }
         .border-0{
            border:0px;
         }
      </style>
   </head>
   <body class="A5">
      <section class="sheet padding-10mm">
         <h2 style="text-align:center; position:relative">
            فاکتور فروش
            <small style="position:absolute;top:0px;left:0px;font-weight:300;"><?php echo 'شماره: ' . $transaction->id;?></small>
         </h2>
         <div style="width:100%;" class="pb-2">
            <div style="width:30%; float:right;">
               <p>موبایل: {{$transaction->User->phone}}</p>
            </div>
            <div style="width:70%; float:right;">
               <p>زمان: {{\Morilog\Jalali\Jalalian::forge($transaction->created_at)->format('%A، %d %B %Y')}} - {{date('H:i',strtotime($transaction->created_at))}}</p>
            </div>
         </div>
         <div style="width:100%;display:inline-block;padding: 5px 0;" class="border radius">
            <div style="width:40%; float:right">
               <p style="text-align: right;padding:0 5px;">{{$transaction->User->fname}} {{$transaction->User->lname}}<br>موبایل: {{$transaction->User->phone}}</p>
            </div>
            <div style="width:60%; float:right">
               <p style="text-align: right">آدرس: {{$transaction->User->State->name_fa}} - {{$transaction->User->city}} - {{$transaction->User->address}} - {{$transaction->User->zipcode}}</p>
            </div>
         </div>
         <div class="over p-1">
            <table class="container">
                <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>شرح کالا</th>
                        <th>قیمت واحد</th>
                        <th>واحد</th>
                        <th>مبلغ کل</th>
                    </tr>
                </thead>
               <tbody>
                    @php
                        $row_id = 1;
                        $full_price = 0;
                    @endphp
                    @foreach ($order_list as $item)
                        <tr>
                            <td><?=$row_id;?></td>
                            <td>
                                {{$item->Product->Title}}
                            </td>
                            <td><?=price($item->Price);?></td>
                            <td>{{$item->Count}}</td>
                            <td><?=price($item->Price * $item->Count);?></td>
                        </tr>
                    @endforeach
               </tbody>
            </table>
         </div>
         <div class="border radius p-2 mt-1">جمع کل: <?php echo price($transaction->Price);?></div>
         <div style="width:100%;display:inline-block;" class="pt-3">
            <div style="width:50%; float:right">
               امضاء خریدار
            </div>
            <div style="width:50%; float:right">
               امضاء فروشنده
            </div>
         </div>
      </section>
   </body>
</html>