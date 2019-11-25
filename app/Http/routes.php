<?php

  if(isset($_COOKIE['Language'])){
    session(['languageActive' => $_COOKIE['Language']]);
  } else {
    session(['languageActive' => 'English']);
    setcookie("Language", 'English', time()+3600*24*365, '/');
  }
 
  // Middleware
  Route::group(array('middleware' => ['auth','config']), function(){ 
    //dashboard
    // Route::get('/', 'Admin\CommonController@index');
    // Route::get('admin/dashboard', 'Admin\CommonController@home');
    // Route::get('dashboard', 'Admin\CommonController@home');
    Route::get('', 'Admin\CommonController@home');
    //Users
    Route::resource('admin/users','Admin\UserController');
    // Route::get('admin/users/profile','Admin\UserController');
    //User Group
    Route::resource('admin/user_groups','Admin\UserGroupController');
    //Group Role
    Route::resource('admin/users_group_role', 'Admin\GroupRoleController');
    Route::match(['get', 'post'],'admin/users_group_role_update', 'Admin\GroupRoleController@updateGroupRolePermission');
    //System Setup
    Route::resource('setup/system/currency','Setup\CurrencyController');
    Route::resource('setup/system/group_invoice_due','Setup\GroupInvoiceDueController');
    //Sale Mgr
    Route::resource('setup/sale/agency','Setup\AgencyController');
    Route::resource('setup/sale/customer','Setup\CustomerController');
    Route::resource('setup/sale/quotation','Setup\QuotationController');
    // sale using ajax
    Route::match(['get','post'],'setup/sale/quotation/get_cfompany','Setup\QuotationController@getCompany'); 
    //getCompany
    Route::post('setup/sale/quotation/company','Setup\QuotationController@getCustomer');
    // get quote number
    Route::post('setup/sale/quotation/get_quote_no','Setup\QuotationController@getQuoteNo');
    //setup master
    Route::resource('setup/sale/stock/supplier','Setup\SupplierController');
    Route::resource('setup/sale/stock/item_category','Setup\ItemCategoryController');
    // sale management
    Route::get('admin/sale_mgr/paid_invoice','Admin\sale_mgr\InvoiceController@paidInvoice');
    Route::get('admin/sale_mgr/unpaid_invoice','Admin\sale_mgr\InvoiceController@unpaidInvoice');
    Route::resource('admin/sale_mgr/return','Admin\sale_mgr\ReturnController');
    Route::get('admin/sale_mgr/print_invoice/{id}','Admin\sale_mgr\SaleOrderController@printInvoice');
    Route::resource('admin/sale_mgr/sale_order','Admin\sale_mgr\SaleOrderController');

    Route::resource('setup/sale/stock/items','Setup\ItemsController');
    Route::resource('setup/sale/stock/stock','Setup\StockController');
    Route::resource('setup/sale/stock/item_base_stock','Setup\ItemBaseStockController');
    Route::resource('setup/sale/stock/bank_account','Setup\BankAccountController');
    //stock_mgr
    Route::resource('admin/stock_mgr/purchase_order','Admin\stock_mgr\purchase\PurchaseOrderController');
    Route::resource('admin/stock_mgr/purchase_in_stock','Admin\stock_mgr\purchase\PurchaseInStockController');
    Route::resource('admin/item/getUnitBaseItem','Admin\setup_mgr\item\ItemController@getUnitBaseItem');
    Route::resource('admin/stock_mgr/getPurchaseItem','Admin\stock_mgr\purchase\PurchaseController@getPurchaseItem');
    // actual stock
    Route::resource('admin/stock_mgr/actual_stock','Admin\stock_mgr\actual_stock\ActualStockController');
    Route::resource('admin/stock_mgr/adjustment_stock','Admin\stock_mgr\adjustment_stock\AdjustmentStockController');
    //Permission
    Route::get('admin/permission/Permission_List', 'Admin\PermissionController@index');
    Route::get('admin/permission/setPermission', 'Admin\PermissionController@create');
    Route::post('admin/permission/store', 'Admin\PermissionController@store');
    Route::get('admin/permission/edit/{id}', 'Admin\PermissionController@edit');
    Route::post('admin/permission/update', 'Admin\PermissionController@update');
    // Audi Trail
    Route::resource('admin/audi_trail','Admin\AudiTrailController');
    // Configuration
    Route::resource('admin/config/configuration', 'Admin\ConfigController');
    Route::resource('admin/config/config_group', 'Admin\ConfigGroupController');
    // Route::resource('admin/config/language', 'Admin\LanguageController');
    Route::resource('admin/config/next_code', 'Admin\NextCodeController');
    
    //############### Setup Management
    Route::resource('admin/setup_mgr/language', 'Admin\setup_mgr\language\LanguageController');
    Route::resource('admin/setup_mgr/stock_type', 'Admin\setup_mgr\stock_type\StockTypeController');
    Route::resource('admin/setup_mgr/department', 'Admin\setup_mgr\department\DepartmentController');
    
    Route::resource('admin/setup_mgr/item_status', 'Admin\setup_mgr\ItemStatusController');
    Route::resource('admin/setup_mgr/position', 'Admin\setup_mgr\position\PositionController');
    Route::resource('admin/setup_mgr/employee', 'Admin\setup_mgr\employee\EmployeeController');
    Route::resource('admin/setup_mgr/currency', 'Admin\setup_mgr\currency\CurrencyController');
    Route::resource('admin/setup_mgr/unit_group', 'Admin\setup_mgr\unit_group\UnitGroupController');
    Route::resource('admin/setup_mgr/unit', 'Admin\setup_mgr\unit\UnitController');
    Route::resource('admin/setup_mgr/item_size', 'Admin\setup_mgr\item_size\ItemSizeController');
    Route::resource('admin/setup_mgr/item_status', 'Admin\setup_mgr\item_status\ItemStatusController');
    Route::resource('admin/setup_mgr/item_type', 'Admin\setup_mgr\item_type\ItemTypeController');
    Route::resource('admin/setup_mgr/item_location', 'Admin\setup_mgr\item_location\ItemLocationController');  
    Route::resource('admin/setup_mgr/pos_kitchen', 'Admin\setup_mgr\pos\POSKitchenController');  
    Route::resource('admin/setup_mgr/pos_outlet', 'Admin\setup_mgr\pos\POSOutletController');  
    Route::resource('admin/setup_mgr/pos_table', 'Admin\setup_mgr\pos\POSTableController');  
    Route::resource('admin/setup_mgr/pos_work_shift', 'Admin\setup_mgr\pos\POSWorkShiftController');  
    Route::resource('admin/setup_mgr/pos_drawer', 'Admin\setup_mgr\pos\POSDrawerController');  
    Route::resource('admin/setup_mgr/pos_drawer_group', 'Admin\setup_mgr\pos\POSDrawerGroupController');  
    // getItem
    Route::resource('admin/setup_mgr/item', 'Admin\setup_mgr\item\ItemController');
    Route::match(['get', 'post'],'admin/setup_mgr/getItemSubCategory', 'Admin\setup_mgr\item\ItemController@getItemSubCategory');

    // getItemCategory
    Route::resource('admin/getItemCategory', 'Admin\setup_mgr\item\ItemController@getItemCategory');
    Route::resource('admin/getItemType', 'Admin\setup_mgr\item\ItemController@getItemType');
    Route::resource('admin/getItemName', 'Admin\setup_mgr\item\ItemController@getItemName');

    Route::get('admin/getItem', 'Admin\setup_mgr\item\ItemController@getItem');
    
    Route::resource('admin/setup_mgr/item_category', 'Admin\setup_mgr\item_category\ItemCategoryController');
    Route::resource('admin/setup_mgr/item_sub_category','Admin\setup_mgr\item_subcategory\ItemSubCategoryController');
    Route::post('admin/setup_mgr/saveItemCategory', 'Admin\setup_mgr\item_category\ItemCategoryController@saveItemCategory');
    Route::resource('admin/setup_mgr/branch_group', 'Admin\setup_mgr\branch_group\BranchGroupController');
    Route::resource('admin/setup_mgr/branch', 'Admin\setup_mgr\branch\BranchController');
    Route::resource('admin/setup_mgr/company', 'Admin\setup_mgr\company\CompanyController');

    // ############## Supplier Management
    Route::resource('admin/vendor', 'Admin\supplier_mgr\vendor\VendorController');   
    Route::resource('admin/supplier_mgr/supplier', 'Admin\supplier_mgr\supplier\SupplierController');
    // ############## Item Management
    Route::resource('admin/item_mgr/item_base_store', 'Admin\item_mgr\item_base_store\ItemBaseStoreController'); 
    Route::resource('admin/item_mgr/item_base_vendor', 'Admin\item_mgr\item_base_vendor\ItemBaseVendorController');
    Route::resource('admin/item_mgr/item_in_stock', 'Admin\item_mgr\item_in_stock\ItemInStockController'); 
    Route::resource('admin/item_mgr/item_barcode', 'Admin\item_mgr\item_barcode\ItemBarcodeController');
    Route::get('admin/item_mgr/print_barcode', 'Admin\item_mgr\item_barcode\ItemBarcodeController@print_barcode'); 
    Route::resource('admin/item_mgr/location_base_branch', 'Admin\item_mgr\location_base_branch\LocationBaseBranchController'); 
    Route::resource('admin/item_mgr/item_base_location', 'Admin\item_mgr\item_base_location\ItemBaseLocationController'); 
    // ############# Discount
    Route::resource('admin/discount/discount_item', 'Admin\discount\DiscountItemController');
    Route::resource('admin/discount/discount_methods', 'Admin\discount\DiscountMethodController');
    Route::resource('admin/discount/discount_permission', 'Admin\discount\DiscountPermissionController');
       
    // ############## Customer Management
    Route::resource('admin/customer_mgr/customer', 'Admin\customer_mgr\customer\CustomerController');
    Route::get('admin/customer_mgr/paid_customer', 'Admin\sale_mgr\InvoiceController@paidInvoice');
    Route::get('admin/customer_mgr/credit_customer', 'Admin\sale_mgr\InvoiceController@unpaidInvoice');
    Route::resource('admin/customer_mgr/customer_group', 'Admin\customer_mgr\customer_group\CustomerGroupController');
    Route::resource('admin/customer_mgr/customer_field', 'Admin\customer_mgr\customer_field\CustomerFieldController');
    // ############## Main Store
    Route::resource('admin/store/main_store', 'Admin\store\MainStoreController');
    Route::post('admin/store/ChangeStore', 'Admin\store\MainStoreController@ChangeStore');
    // ############## Report ################
    Route::resource('admin/report/revenue_report', 'Admin\report\revenue_report\RevenueReportController');
    Route::resource('admin/report/sale_detail', 'Admin\report\revenue_report\SaleDetailReportController');
    Route::resource('admin/report/summary_report', 'Admin\report\SaleSummaryReportController');
    Route::get('admin/report/print_summary_report', 'Admin\report\SaleSummaryReportController@getPrint');
    Route::resource('admin/report/inventory_on_hand', 'Admin\report\inventory_on_hand\InventoryOnhandReportController');
    Route::get('admin/report/print_inventory_on_hand', 'Admin\report\inventory_on_hand\InventoryOnhandReportController@getPrint');
    Route::resource('admin/report/item_information', 'Admin\report\item\ItemInformationReportController');
    Route::get('admin/report/print_item_information', 'Admin\report\item\ItemInformationReportController@getPrint');
    Route::get('admin/report/sales_item', 'Admin\report\SaleItemReportController@index');
    Route::get('admin/report/print_sale_item', 'Admin\report\SaleItemReportController@getPrint');
    Route::get('admin/report/sales_pos_item', 'Admin\report\SalePOSItemReportController@index');
    Route::get('admin/report/print_pos_sale_item', 'Admin\report\SalePOSItemReportController@getPrint');
    Route::get('admin/report/sales_pos_by_drawer', 'Admin\report\SalePOSItemByDrawerReportController@index');
    Route::get('admin/report/print_sales_pos_by_drawer', 'Admin\report\SalePOSItemByDrawerReportController@getPrint');
    Route::get('admin/report/sales_pos_receipt', 'Admin\report\SalePOSReceiptReportController@index');
    Route::get('admin/report/print_sales_pos_receipt', 'Admin\report\SalePOSReceiptReportController@getPrint');
    Route::get('admin/report/drawer_transaction', 'Admin\report\DrawerTransactionReportController@index');
    Route::get('admin/report/print_drawer_transaction', 'Admin\report\DrawerTransactionReportController@getPrint');

    Route::get('admin/report/purchase_order_by_supplier', 'Admin\report\PurchaseOrderBySupplierReportController@index');
    Route::get('admin/report/print_purchase_order_by_supplier', 'Admin\report\PurchaseOrderBySupplierReportController@getPrint');

    Route::get('admin/report/transfer_item', 'Admin\report\TransferItemReportController@index');
    Route::get('admin/report/print_transfer_item', 'Admin\report\TransferItemReportController@getPrint');

    Route::get('admin/report/return_item', 'Admin\report\ReturnItemReportController@index');
    Route::get('admin/report/print_return_item', 'Admin\report\ReturnItemReportController@getPrint');
    // ############## Tool Management
    Route::get('admin/tool_mgr/backup_list', 'Admin\tool_mgr\BackupController@backup_list');
    Route::match(['get', 'post'], 'admin/tool_mgr/backup', 'Admin\tool_mgr\BackupController@backup');
    Route::match(['get', 'post'], 'admin/tool_mgr/restore', 'Admin\tool_mgr\BackupController@restore');
    // ############## Quotation ######
    Route::get('admin/quotation/quotation_form', 'Admin\quotation\QuotationController@QuotationForm');
    Route::resource('admin/quotation', 'Admin\quotation\QuotationController');
    Route::get('admin/quotation/print_invoice/{id}','Admin\quotation\QuotationController@printInvoice');
    Route::post('admin/quotation_send2SaleOrder', 'Admin\quotation\QuotationController@send2SaleOrder');

    // ############## Transfer ########
    Route::get('admin/transfer/transfer_list', 'Admin\transfer\TransferController@transfer_list');

    Route::resource('admin/transfer', 'Admin\transfer\TransferController');
    Route::get('admin/transfer/new_transfer_in', 'Admin\transfer\TransferController@new_transfer_in');
    Route::get('admin/transfer/transfer_out', 'Admin\transfer\TransferController@transfer_out');

    // POS
    Route::get('admin/error_page', 'Admin\ErrorpageController@index');

    Route::get('pos/salepanel/customer_checkout', 'POS\salepanel\SalePanelController@customerCheckout');
    Route::get('pos/salepanel/customer_dashboard', 'POS\salepanel\SalePanelController@customerDashboard');
    Route::get('pos/salepanel/customer_subcategory/{id}', 'POS\salepanel\SalePanelController@customerSubcategory');
    Route::get('pos/salepanel/customer_salepanel', 'POS\salepanel\SalePanelController@customerSalepanel');

    Route::get('pos/salepanel/print_invoice', 'POS\salepanel\SalePanelController@print_invoice');

    Route::resource('pos/salepanel/dashboard', 'POS\salepanel\SalePanelController');
    Route::post('pos/salepanel/POSCusOrder', 'POS\salepanel\SalePanelController@POSCusOrder');
    Route::post('pos/salepanel/GenerateOrder', 'POS\salepanel\SalePanelController@GenerateOrder');
    Route::post('pos/salepanel/VoidOrder', 'POS\salepanel\SalePanelController@VoidOrder');
    Route::post('pos/salepanel/cancelItem', 'POS\salepanel\SalePanelController@cancelItem');
    Route::post('pos/salepanel/cancelAllItem', 'POS\salepanel\SalePanelController@cancelAllItem');
    Route::post('pos/salepanel/IcreaseItemPrice', 'POS\salepanel\SalePanelController@IcreaseItemPrice');
    Route::post('pos/salepanel/DecreaseItemPrice', 'POS\salepanel\SalePanelController@DecreaseItemPrice');
    Route::post('pos/salepanel/ProcessDiscount', 'POS\salepanel\SalePanelController@ProcessDiscount');
    Route::post('pos/salepanel/ProcessPayment', 'POS\salepanel\SalePanelController@ProcessPayment');
    Route::post('pos/salepanel/POSCusBarcodeScanner', 'POS\salepanel\SalePanelController@POSCusBarcodeScanner');
    Route::post('pos/salepanel/getSubCat', 'POS\salepanel\SalePanelController@getSubCat');
    Route::post('pos/salepanel/getItemBySub', 'POS\salepanel\SalePanelController@getItemBySub');
    Route::post('pos/salepanel/getAllItems', 'POS\salepanel\SalePanelController@getAllItems');
    Route::post('pos/salepanel/POSCusCheckOut', 'POS\salepanel\SalePanelController@POSCusCheckOut');
  });

  Route::group(['middleware' => ['SettingConfig','cors']], function(){	
    Route::post('api/account_master/loginPinCode', 'Auth\LoginPinCodeController@loginPinCode');
    // Sale Operation
    Route::get('api/store/inventory', 'FrontOffice\ItemController@inventory');
    Route::post('api/store/mergeOrder', 'FrontOffice\OrderController@mergeOrder');
    Route::put('api/store/split_bill/{id}', 'FrontOffice\OrderController@splitBill');
    Route::post('api/store/order/voidOrder', 'FrontOffice\OrderController@voidOrder');
    Route::get('api/store/order/get_void_order', 'FrontOffice\OrderController@getVoidOrder');
    Route::post('api/store/order_by_table', 'FrontOffice\OrderController@getOrderByTable');
    Route::resource('api/store/order', 'FrontOffice\OrderController');
    Route::get('api/store/get_item_code', 'FrontOffice\ItemController@getItemByCode');
    Route::resource('api/store/customer', 'FrontOffice\CustomerController');
    Route::resource('api/store/order_type', 'FrontOffice\OrderTypeController');
    Route::resource('api/store/reservation', 'FrontOffice\ReservationController');
    Route::resource('api/store/receipt', 'FrontOffice\ReceiptController');
    Route::get('api/store/sub_category/{catId}', 'FrontOffice\CategoryController@subCategory');
    Route::get('api/store/item/{SubCatId}', 'FrontOffice\ItemController@getItem');
    Route::get('api/store/category', 'FrontOffice\CategoryController@category');
    Route::get('api/store/outlet', 'FrontOffice\OutletController@index');
    Route::get('api/store/payment_method', 'FrontOffice\PaymentMethodController@index');
    Route::post('api/store/shift/open_shift', 'FrontOffice\ShiftController@openShift');
    Route::post('api/store/shift/close_shift', 'FrontOffice\ShiftController@closeShift');
    Route::resource('api/store/table', 'FrontOffice\POSTableController');
    Route::post('api/store/getMembershipCode', 'FrontOffice\MembershipController@getMembershipCode');
    Route::resource('api/store/membership', 'FrontOffice\MembershipController');
    Route::post('api/account_master/login', 'Auth\LoginPinCodeController@login');
	  Route::post('api/account_master/logout', 'Auth\LoginController@logout');
  });

  Route::group(array('middleware' => ['config']), function(){
    
  });

    // General Route Not Permission
    Route::group(array('middleware' => ['config']), function(){
    Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);
    Route::get('auth/login', 'Auth\AuthController@getLogin');

    //Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', 'Auth\AuthController@getLogout');
    Route::get('auth/logoutCashier', 'Auth\AuthCashierController@getLogoutCashier');
    //Registration routes...
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', 'Auth\AuthController@postRegister');
});