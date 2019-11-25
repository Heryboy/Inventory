<!DOCTYPE html>
<html>
<head>
    <title>Print Invoice</title>
</head>
<body>  
    <div class="contain-invoice">
        <div class="row-logo">
            <div class="pull-left">
                <img width="200px" src="{{url('images/uploads/company')}}/{{$Company->image}}"/>
            </div>
            <div class="pull-right">
                <div class="title-invoice">INVOICE</div>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="client-info" style="margin-bottom: 0px;padding-top:5px;">
            <div class="general-info">
                Company: {{$Company->company_en}}<br/>
                Address: {{$Company->address}}<br/>
                Contact: {{$Company->phone}}.<br/>
                Email: {{$Company->email}}
            </div>
        </div>

        <div class="bill-info">
            <div class="bg-info">
                <div class="title_inner">
                    <span class="pull-left">
                        <center>INVOICE NO</center>
                    </span>
                    <span class="pull-right">
                        <center>DATE</center>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="general-info">
                <span class="pull-left">
                    <div class="invoice-no">INV-00{{$order_id}}</div>
                </span>
                <span class="pull-right">
                    <b style="color:#f00;"><span id="checkOutDate">@if(isset($POSCusOrder)){{$POSCusOrder->check_out_date}}@endif</span></b>
                </span>
                <div class="clearfix"></div>
            </div>

            <div class="bg-info">
                <div class="title_inner">
                    <span class="pull-left">
                        <center>CUSTOMER</center>
                    </span>
                    <span class="pull-right">
                        <center>TERMS</center>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="general-info">
                <span class="pull-left">
                    <div class="customer-no">CUS-00{{$order_id}}</div>
                </span>
                <span class="pull-right">
                    <b style="color:#f00;">Net 30 days</b>
                </span>
            </div>
        </div>

        <div class="client-info">
            <div class="bg-info">
                <div class="title_inner">CUSTOMER</div>
            </div>
            <div class="general-info">
                Name: <span id="customer_name"></span><br/>
                Company: ..........................<br/>
                Address: ..........................<br/>
                Email:   ..........................<br/>
                Contact: ..........................
            </div>
            
        </div>

        <div class="bill-info">
            <div class="bg-info">
                <div class="title_inner">BILL TO</div>
            </div>
            <div class="general-info">
                Name: <span id="customer_name"></span><br/>
                Company: ..........................<br/>
                Address: ..........................<br/>
                Email:   ..........................<br/>
                Contact: ..........................
            </div>
        </div>
        <table id="table-row">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>QTY</th>
                <th>Sub Total</th>
            </tr>

            <tbody id="table-item-row">
               @if(isset($POSCusOrderDetail) && $POSCusOrderDetail!='')
                    <?php $i=1;?>
                    @foreach($POSCusOrderDetail as $row)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$row->Item->name}}</td>
                            <td><center>...................</center></td>
                            <td>{{Helpers::FormatCurrentcy($row->unit_price,'$')}}</td>
                            <td>{{$row->qty}}</td>
                            <td>{{$row->price}}</td>
                        </tr>
                        <?php $i++;?>
                    @endforeach
               @endif
            </tbody>

            <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td colspan="2">SUBTOTAL</td>
                    <td><span class="pull-right"><span id="p_amount_sub_total">{{Helpers::FormatCurrentcy($data['sub_total'])}}</span></span></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td colspan="2">CASH DEPOSIT / ប្រាក់កក់</td>
                    <td><span class="pull-right"><!--$ <input style="width:100px;height: 30px;" type="text" name="cash_deposit"/>--></span> </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td colspan="2">BALANCE / នៅខ្វះ</td>
                    <td><span class="pull-right"><!--$ <input style="width:100px;height: 30px;" type="text" name="balance"/>--></span> </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td colspan="2">DISCOUNT</td>
                    <td><span class="pull-left"></span> <span class="pull-right"><span id="p_discount_total">{{$data['discount']}}</span>%</span></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td colspan="2">TAX({{TAX}}%)</td>
                    <td><span class="pull-left"></span> <span class="pull-right">{{TAX}}%</span></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td colspan="2">TOTAL</td>
                    <td><span class="pull-right"><span id="p_amount_total" class="pull-right amount_total">{{Helpers::FormatCurrentcy($data['total'])}}</span></span></td>
                </tr>
            </tfoot>
        </table>

        <table>
            <tr>
                <td style="width:198.43pt;padding:20px 0 50px 0;font-weight: bold;">
                    <span style="float: left;">
                        អ្នកទិញ / The Buyer<br/><center>....................</center>
                    </span>
                </td>
                <td style="width:198.43pt;padding:20px 0 50px 0;font-weight: bold;">
                    <center>អ្នកដឹក / Deliver <br/><br/>....................</center>
                </td>
                <td style="width:198.43pt;padding:20px 0 50px 0;font-weight: bold;">
                    <center style="float: right;">អ្នកលក់ / The Seller <br/><img width="100px" src="{{url('images/uploads/company')}}/{{$Company->image}}"/></center>
                </td>

            </tr>
        </table>



        <div class="thanks"><center>THANKS YOU!!!</center></div>
        <div class="enquiry">
            <center>
                For questions concerning this invoice, please contact<br/>
                Contact:(+855)9833333, Email: vandara@gmail.com
            </center>

        </div>
        <div class="desc-footer">
            <center>Please, come again.</center>
            <center><b>Powered By: Khmer Gecko.</b></center>
        </div>
    </div>
    @if(isset($_REQUEST['print']) && $_REQUEST['print']==1)
        <script type="text/javascript">
            var url = '/pos/salepanel/dashboard';
            window.print();
            // window.location = url;
        </script>
    @endif
    <style type="text/css">
        html body{font-family: arial;}
        .clearfix{clear: both;}
        .desc-footer{font-size:14px;}
        .enquiry{line-height: 20px;font-size:15px;}
        .thanks{padding:10px 0;font-weight: bold;}
        .customer-no,.invoice-no{font-size:16px;font-weight: bold;padding-top:5px;padding-bottom: 5px;}
        .title-invoice{font-size:30px;font-weight: bold;color:#0065b8;}
        .contain-invoice{width:595.3pt;/*height: 841.9pt;*/margin:0 auto;}
        table#table-row{border-collapse:collapse;width:100%;}
        table#table-row tr th{background-color:#0065b8;color:#fff;text-transform: uppercase;padding:4px !important;font-size:15px;}
        table#table-row tbody tr td{border:1px solid #444;padding:5px;font-size:15px;}
        table#table-row tfoot tr td{border:1px solid #ddd;padding:5px;font-size:16px;font-weight: bold;}
        .pull-left{float: left}
        .pull-right{float: right !important;}
        div.bg-info{background-color:#0065b8;width:100%;color:#fff;}
        div.title_inner{padding:3px;font-size:15px;font-weight: bold;}
        .general-info{font-size:14px;line-height: 20px;}
        div.client-info,div.bill-info{
            width:280pt;
            padding-bottom: 10px;
        }
        div.client-info{
            float: left;
        }
        div.bill-info{
            float: right;
        }
    </style>
</body>
</html>