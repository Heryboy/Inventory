        <style>
            .st-bold{
                font-weight: bold;
            } 
            .all-font{
                font-size:8pt;
                width:210pt;
            }
            .all-font th{
                color: white;
            }
            p{
                font-size: 10px;
            }
            html, body{height: none !important;}
        </style>

        <div class="receipt" style="background:white;">
             <center>
            <table class='all-font'>
                <tr>
                    <td>        
                        <center><div class="wrapper-logo" style="margin-bottom:20px;">
    <div class="image" style="padding-top:25px;">
        <img class="img-responsive" src="/system/images/images/000/000/276/original/__logo.png?1508337027" alt="logo" width="80" height="80" class="img-reponsive">
    </div>
    
</div>
<style type="text/css">
.address{
    padding-top: 10px;
}
</style>
</center>
                    </td>
                    <td style="padding-left:10px;font-size:12px;color:black;" width="300px">        
                        លឹមវ៉ាន់ដារ៉ាវុធ​ លក់គ្រឿងសំណង់<br>
                        LIM VAN DARA VUTH CONSTRUCTION
                    </td>
                </tr>
            
            {{-- <tr style="width:300px;font-size:9px;">
                <td colspan='2'>                   
                       លេខអត្តសញ្ញាណកម្ម អតប(VAT TIN): 
                        
                   
                </td>
            </tr> --}}
              <tr style="width:300px;font-size:9px;">
                <td colspan='2'>
                    អាស្រ័យដ្ធាន St.Veng Sreng (Vatanak&#39;s Industry Park)
                </td>   
            </tr>
             <tr style="width:300px;font-size:9px;">
                <td colspan='2'>
                    Address: St.Veng Sreng (Vatanak&#39;s Industry Park)
                </td>   
            </tr>
            <tr style="width:300px;font-size:9px;">
                <td colspan='2'>
                    ទូរស័ព្ទ (+855-61)31 68 68
                </td>
            </tr>
            <tr style="width:300px;font-size:9px;">
                <td colspan='2'>
                    Phone: (+855-61)31 68 68
                </td>
            </tr>
            <tr style="width:300px;font-size:9px;"> 
                <td colspan='2'>
                    អីុម៉ែល 
                </td>
            </tr>
            <tr style="width:300px;font-size:9px;">
                <td colspan='2'>
                    Email: 
                </td>
            </tr>

            <tr>
                <td colspan='2' style='border-bottom:dotted;font-size:11pt;height:10pt;font-weight:bold;'>
                </td>
            </tr>

             <tr>
                <td colspan="2">
                    <center><h5 class="title-reciep" style="color:black;"><b>Invoice</b></h5></center>
                </td>
            </tr>
            
         <tr>
             
        <tr>
            <td width='90'>Order#</td>
            <td width='130'><span class='st-bold'><div>{{$order_id}}</div></span></td>
        </tr>
            {{--  <tr>
                <td>Cashier: </td>
                <td><span class='st-bold'>Chen Gao Ping</span></td>
            </tr> --}}
          
            <tr>
                <td>Date In: </td>
                <td><span class='st-bold'><span id="checkInDate"></span></span></td>
            </tr>
            
            <tr>
                <td>Date Out:: </td>
                 <td><span class='st-bold'><span id="checkOutDate"></span></span></td>
            </tr>
            <tr><td colspan='2' style='border-bottom:dotted;font-size:11pt;height:10pt;font-weight:bold;'></td>
            </tr>
            </table>
            
            <table class='all-font'>
               <thead  style="border-bottom:1px solid black">
                    <tr style="background:black;">
                        
                        <th width="700px" >
                           Name
                        </th>
                        <th width="500px">
                           Price
                        </th>
                        <th width="100x">
                           Qty
                        </th>
                        <th width="200px">
                           Sub Total
                        </th>
                    </tr>
                </thead>
                <!-- loop menu list -->
                <tbody id="table-item-row">
                    <tr class="line-cross">
                        <!-- <td>1</td> -->
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            
    </table>
           
           <table class="all-font">
                <tr><td colspan='4' style='border-bottom:dotted;font-size:11pt;height:10pt;font-weight:bold;'></td>
                </tr>
                <!-- <tr>
                    <td width="100px"></td>
                    <td width="20px"></td>
                    <td>????</td>
                </tr> -->
                <tr>
                    <td width="100px"></td>
                    <td width="20px"></td>
                    <td>Sub Total</td>
                    <td align="right"><span class='st-bold'><span id="p_amount_sub_total">{{Helpers::FormatCurrentcy($data['sub_total'])}}</span></span></td>
                </tr>
              
                <tr>
                    <td width="100px"></td>
                    <td width="20px"></td>
                    <td>Discount %</td>
                    <td align="right"><span class='st-bold'><span id="p_discount_total">{{$data['discount']}}</span>%</span></td>
                </tr>
                <tr>
                    <td width="100px"></td>
                    <td width="20px"></td>
                    <td><span class="translation_missing" title="translation missing: en.salepanel_recipt.vat">Tax</span>:</td>
                    <td align="right"><span class='st-bold'> {{TAX}}%</span></td>
                </tr>
                <tr>
                    <td width="100px"></td>
                    <td width="20px"></td>
                    <td>Total In Cash:</td>
                    <td align="right"><span class='st-bold'> <span id="p_amount_total" class="pull-right amount_total">{{Helpers::FormatCurrentcy($data['total'])}}</span></td>
                </tr>
                {{-- <tr>
                    <td width="100px"></td>
                    <td width="20px"></td>
                    <td>Total In Reils:</td>
                    <td align="right" width="100px"><span class='st-bold'>R  51,660.00</span></td>
                </tr>  --}} 
           </table>

           <table class="all-font" style="margin-top:20px;">
                 <tr>
                    <td>ឈ្មោះអតិថិជន(<span id="customer_name"></span>)</td>
                </tr> 
                <tr>
                    <td>Customer's name: (<span id="customer_name"></span>)</td>
                </tr> 
                <tr>
                    <tdហត្ថលេខាអតិថិជន<td>
                    <!-- <td>......................</td> -->
                </tr> 
                <tr>
                    <td><center>Signature: ..............................................................................</center></td>    
                </tr>
           </table>
            <p>
                Thank you please come again <br/>
                <span style="font-size:11px" align="center">
                    Powerd by Khmer Gecko.
                </span>
            </p>
</center>
        </div>
