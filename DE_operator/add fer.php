  $("#add_new_row").click(function(){
		add_1_row();
	  });
	  
	  $(document).delegate("[name='txtinv_item_ttl[]'],#txtdisc_perc,#txttax_id,#txtinv_subttl,#txtinv_ttl,#txttds_perc", "change, keyup", function(){
		  cal_tax_amt();
	  });
	  
	  $("#table_prodlist").delegate( "input[name='txtshop_qty[]'],input[name='txtinv_item_rate[]']", "change, keyup", function(){
		  
		  
		  inv_item_ttl=0;
		 
			  cal_item_ttl();
		  
		   setTimeout(function(){
			   cal_tax_amt();
		   },100);
		  
	  });
	
  });

