<!DOCTYPE html>
<html>
<head>
    <title>Print Invoice</title>
</head>
<body>  
    <div class="contain-invoice">
        <div class="row-logo">
            <div class="pull-left">
                <img width="100px" src="{{url('images/uploads/company')}}/{{$Company->image}}"/>
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
                        <center>Quotation No</center>
                    </span>
                    <span class="pull-right">
                        <center>DATE</center>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="general-info">
                <span class="pull-left">
                    <div class="invoice-no">{{ $Quotations['quotation_no'] }}</div>
                </span>
                <span class="pull-right">
                    <b style="color:#f00;"><span id="checkOutDate">{{ date('Y-M-d') }}</span></b>
                </span>
                <div class="clearfix"></div>
            </div>

            <!-- <div class="bg-info">
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
                    <div class="customer-no">000002</div>
                </span>
                <span class="pull-right">
                    <b style="color:#f00;">Net 30 days</b>
                </span>
            </div> -->
        </div>

        <div class="client-info">
            <div class="bg-info">
                <div class="title_inner">CUSTOMER</div>
            </div>
            <div class="general-info">
                Name: <span id="customer_name">{{ $customerInfo['name'] }}</span><br/>
                Address: {{ $customerInfo['address'] }}<br/>
                Email:   {{ $customerInfo['email'] }}<br/>
                Contact: {{ $customerInfo['phone'] }}
            </div>
            
        </div>

        <div class="bill-info">
            <div class="bg-info">
                <div class="title_inner">BILL TO</div>
            </div>
            <div class="general-info">
                Name: <span id="customer_name">{{ $customerInfo['name'] }}</span><br/>
                Address: {{ $customerInfo['address'] }}<br/>
                Email:   {{ $customerInfo['email'] }}<br/>
                Contact: {{ $customerInfo['phone'] }}
            </div>
        </div>
        <table id="table-row">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
            </tr>

            <tbody id="table-item-row">
                <?php 
                    $total = 0;
                ?>
                @if(isset($QuotationDetails))
                    @foreach($QuotationDetails as $row)
                        <tr>
                            <td>{{$row->item_name}} ({{ $row->item_barcode }})</td>
                            <td>{{ $row->remark }}</td>
                            <td>{{Helpers::FormatCurrentcy($row->quotation_price,'$')}}</td>
                            <td>{{$row->quotation_qty}}</td>
                            <td>{{Helpers::FormatCurrentcy($row->quotation_price * $row->quotation_qty,'$')}}</td>
                        </tr>
                    @endforeach
               @endif
            </tbody>

            <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                    <td colspan="2">Sub Total</td>
                    <td><span class="pull-right"><span id="p_amount_sub_total"></span> {{Helpers::FormatCurrentcy($Quotations['sub_total'],'$')}}</span></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td colspan="2">Tax</td>
                    <td><span class="pull-left"></span> <span class="pull-right">{{Helpers::FormatCurrentcy($Quotations['tax'],'$')}}</span></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td colspan="2">Discount</td>
                    <td><span class="pull-left"></span> <span class="pull-right"><span id="p_discount_total"></span>{{Helpers::FormatCurrentcy($Quotations['discount'],'$')}}</span></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td colspan="2">Total </td>
                    <td><span class="pull-right"><span id="p_amount_total" class="pull-right amount_total"></span> {{Helpers::FormatCurrentcy($Quotations['grand_total'],'$')}}</span></td>
                </tr>
            </tfoot>
        </table>
        <br/>
        <div class="thanks"><center>THANKS YOU!!!</center></div>
        <div class="enquiry">
            <center>
                For questions concerning this invoice, please contact<br/>
                Contact:{{$Company->phone}}, Email: {{$Company->email}}
            </center>

        </div>
        <div class="desc-footer">
            <center>Please, come again.</center>
            <!-- <center><b>Power By: Khmer Gecko.</b></center> -->
        </div>
    </div>
    @if(isset($_REQUEST['print']) && $_REQUEST['print']==1)
        <script type="text/javascript">
            window.print();
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
        .contain-invoice{/*width:595.3pt;height: 841.9pt;*/margin:0 auto;padding: 20px;}
        table#table-row{border-collapse:collapse;width:100%;}
        table#table-row tr th{background-color:#0065b8;color:#fff;text-transform: uppercase;padding:4px !important;font-size:15px;}
        table#table-row tbody tr td{border:1px solid #444;padding:5px;font-size:15px;}
        table#table-row tfoot tr td{border:1px solid #ddd;padding:5px;font-size:16px;font-weight: bold;}
        .pull-left{float: left}
        .pull-right{float: right;}
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
<script>
    window.print('');
</script>