<!DOCTYPE html>
<html>
<head>
    <title>Print Invoice</title>
</head>
<body>  
    <div class="contain-invoice">
        <div class="row-logo">
            <div class="pull-left">
                <img width="100px" src="<?php echo e(url('images/uploads/company')); ?>/<?php echo e($Company->image); ?>"/>
            </div>
            <div class="pull-right">
                <div class="title-invoice">INVOICE</div>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="client-info" style="margin-bottom: 0px;padding-top:5px;">
            <div class="general-info">
                Company: <?php echo e($Company->company_en); ?><br/>
                Address: <?php echo e($Company->address); ?><br/>
                Contact: <?php echo e($Company->phone); ?>.<br/>
                Email: <?php echo e($Company->email); ?>

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
                    <div class="invoice-no"><?php echo e($SaleOrders['sale_order_no']); ?></div>
                </span>
                <span class="pull-right">
                    <b style="color:#f00;"><span id="checkOutDate"><?php echo e(date('Y-M-d')); ?></span></b>
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
                Name: <span id="customer_name"><?php echo e($customerInfo['name']); ?></span><br/>
                Address: <?php echo e($customerInfo['address']); ?><br/>
                Email:   <?php echo e($customerInfo['email']); ?><br/>
                Contact: <?php echo e($customerInfo['phone']); ?>

            </div>
            
        </div>

        <div class="bill-info">
            <div class="bg-info">
                <div class="title_inner">BILL TO</div>
            </div>
            <div class="general-info">
                Name: <span id="customer_name"><?php echo e($customerInfo['name']); ?></span><br/>
                Address: <?php echo e($customerInfo['address']); ?><br/>
                Email:   <?php echo e($customerInfo['email']); ?><br/>
                Contact: <?php echo e($customerInfo['phone']); ?>

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
                <?php if(isset($SaleOrderDetails)): ?>
                    <?php foreach($SaleOrderDetails as $row): ?>
                        <tr>
                            <td><?php echo e($row->item_name); ?> (<?php echo e($row->item_barcode); ?>)</td>
                            <td><?php echo e($row->remark); ?></td>
                            <td><?php echo e(Helpers::FormatCurrentcy($row->sale_order_price,'$')); ?></td>
                            <td><?php echo e($row->sale_order_qty); ?></td>
                            <td><?php echo e(Helpers::FormatCurrentcy($row->sale_order_price * $row->sale_order_qty,'$')); ?></td>
                        </tr>
                    <?php endforeach; ?>
               <?php endif; ?>
            </tbody>

            <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                    <td colspan="2">Sub Total</td>
                    <td><span class="pull-right"><span id="p_amount_sub_total"></span> <?php echo e(Helpers::FormatCurrentcy($SaleOrders['sub_total'],'$')); ?></span></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td colspan="2">Tax</td>
                    <td><span class="pull-left"></span> <span class="pull-right"><?php echo e(Helpers::FormatCurrentcy($SaleOrders['tax'],'$')); ?></span></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td colspan="2">Discount</td>
                    <td><span class="pull-left"></span> <span class="pull-right"><span id="p_discount_total"></span><?php echo e(Helpers::FormatCurrentcy($SaleOrders['discount'],'$')); ?></span></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td colspan="2">Total </td>
                    <td><span class="pull-right"><span id="p_amount_total" class="pull-right amount_total"></span> <?php echo e(Helpers::FormatCurrentcy($SaleOrders['grand_total'],'$')); ?></span></td>
                </tr>
            </tfoot>
        </table>
        <br/>
        <div class="thanks"><center>THANKS YOU!!!</center></div>
        <div class="enquiry">
            <center>
                For questions concerning this invoice, please contact<br/>
                Contact:<?php echo e($Company->phone); ?>, Email: <?php echo e($Company->email); ?>

            </center>

        </div>
        <div class="desc-footer">
            <center>Please, come again.</center>
            <!-- <center><b>Power By: Khmer Gecko.</b></center> -->
        </div>
    </div>
    <?php if(isset($_REQUEST['print']) && $_REQUEST['print']==1): ?>
        <script type="text/javascript">
            window.print();
        </script>
    <?php endif; ?>
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