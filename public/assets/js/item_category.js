//#################### Item Category
$("#saveItemCategory").click(function(){
	var item_category_name = $("input[name='item_category_name']").val();
	var branch_id = $("select[name='branch_id']").val();
    if(item_category_name==''){
    	$(".form-group.cate-name").addClass('has-error');
    	toastr.warning(provide_category_name);
    	return false;
    }else{
    	$(".form-group.cate-name").removeClass('has-error');
    }	

    if(branch_id==''){
    	$(".form-group.brand-name").addClass('has-error');
    	toastr.warning(select_brand_name);
    	return false;
    }else{
    	$(".form-group.brand-name").removeClass('has-error');
    }
    var dataString = {"item_category_name":item_category_name,"branch_id":branch_id};
    $.ajax({  
        type: "POST",  
        url: ""+site_url+"admin/setup_mgr/saveItemCategory",
        data: dataString,
        cache: false,
        beforeSend: function() 
        {
            $(".waiting_loading").show();
        },  
        success: function(success)
        {
            if(success==1){
                toastr.success(success_data_saved);
                $(".waiting_loading").hide();
                window.location.reload(true);
            }else{
                window.location.reload(true);
            }
        }
    }).fail(function(error_response) 
    {
        $(".waiting_loading").hide();
        toastr.warning(problem_while_saving_data);
        // setTimeout("vpb_users_pagination('"+page_id+"');", 10000);
    });
});