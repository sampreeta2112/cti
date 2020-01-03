window.history.forward();
        function noBack()
        {
            window.history.forward();
        }

var monthNames = ["January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];		

var dayNames = ["Sun", "Mon", "Tue", "Wed", "Thur", "Fri", "Sat"
];

function highlight_public_holiday(js_date)
{
	curr_date=js_date.getDate();
	if(curr_date.toString().length<2) {curr_date="0"+curr_date;}
	 curr_month=parseInt(js_date.getMonth())+1;
	 if(curr_month.toString().length<2) {curr_month="0"+curr_month;}
	 curr_year=js_date.getFullYear();
	 curr_fulldate=curr_date+"-"+curr_month+"-"+js_date.getFullYear();
	//alert(curr_fulldate);
	if(public_holidays_arr.indexOf(curr_fulldate)== -1)
	{
		return [true, '',''];
		//alert(curr_fulldate);
	}
	else
	{
		//alert(curr_fulldate);
		return [true, 'PHdate','Event Exists'];
	}
}



function ChangesStatus(mode,status,id)
{   //alert("task:'UPDATESTATUS',mode:"+ mode+",status:"+status+",id:"+id );
    $.post('../includes/quick_updates.php',{task:'UPDATESTATUS',mode: mode,status:status,id:id },  function(data){ //alert(data)
    
}).error(function(errores) { alert(errores.responseText); });
}


function updateStatus(mode,val,id,ex_var='',def_halt_flag=true) {
     halt_flag=false;
	 if((def_halt_flag==true)&&((mode=="LEAVE_APPROVAL")&&((val=='R')||(val=='X'))))
	 {
		 halt_flag=true;
		 $( ".dialog-lcomment_"+id ).find("input[id='dialog_la_sts_"+id+"']").val(val);
		 $( ".dialog-lcomment_"+id ).dialog( "open" );
	 }
	 //console.log(id+"==>"+$( ".dialog-lcomment_"+id ).find("input[id='dialog_la_sts_"+id+"']").val());
	 if(halt_flag==false)
	 {
         $.post('../includes/ap_leave_appl_edit.php',{task:'UPDATESTATUS',mode: mode,status: val,txtid:id, ex_var:ex_var },  function(data){
			  //alert(data)
           
			 if(data)
			{
				location.reload();
				str='<div class="message success"><h5>Success!</h5><p>Status successfully updated</p></div>';
			   
			}
			else
			{
			   str='<div class="message error"><h5>Error!</h5><p>Failed to update status</p></div>'; 
			  
			}
			 $("#notification").html(str).show(); 
		}).error(function(errores) { alert(errores.responseText); });
	 }
}	
		  
  function cal_gross_sal()
  {
	  gross_sal=parseInt($("#txtgr_salary").val());
	  $("input[class^='emp_salary_head']:checked").each(function(){
		
			  curr_row_id=$(this).parents("tr").attr("id");
			  curr_sal_head_val=parseInt($("#"+curr_row_id).find("#sal_head_val").val());
			  //alert(curr_sal_head_val);
			  //alert(curr_sal_head_val);
			  gross_sal=gross_sal-curr_sal_head_val;
			  //alert(gross_sal);
			
	  });
	  $("#gross_sal_pm").html(gross_sal);
  }
  
  function load_sal_head_val(gross_salary)
  {
	  basic_salary=gross_salary*70/100;
	  $("#txtbasic_salary").val(basic_salary);
	  $.post("../includes/_auto_fetch_salary_head_val.php","gross_sal="+gross_salary+"&basic_salary="+basic_salary,function(data) {
		  //alert(data);
		  //console.log(data);
		  all_heads_str=data.trim();
		  
		  $("input[class='emp_salary_head_val_id']").val('0');
		  $("td[class='sal_head_perc']").html('0');
		  $("input[id='sal_head_val']").val('0');
		  /*$(".emp_salary_head").addClass("disable_elements");*/
		  
		  if(all_heads_str!='')
		  {
			  all_heads_arr=all_heads_str.split(",");
			  all_heads_arr_cnt=all_heads_arr.length;
			  
			  for(i=0;i<all_heads_arr_cnt;i++)
			  {
				  ind_heads_arr=all_heads_arr[i].split(":");
				  sal_head_val_id=ind_heads_arr[0];
				  sal_head_id=ind_heads_arr[1];
				  sal_head_perc=ind_heads_arr[2];
				  sal_head_value_in=ind_heads_arr[3];
				  sal_head_calc_parameter=ind_heads_arr[4];
				  
				  if(sal_head_value_in=='RUP')
				  {
					sal_head_val=parseFloat(sal_head_perc);
				  }
				  if(sal_head_value_in=='PERC')
				  {
					if(sal_head_calc_parameter=='GROSS')
					{
						sal_head_val=parseFloat(gross_salary)*(parseFloat(sal_head_perc)/100); 
					}
					if(sal_head_calc_parameter=='BASIC')
					{
						sal_head_val=parseFloat(basic_salary)*(parseFloat(sal_head_perc)/100); 
					}
				  }
				  sal_head_val=Math.round(sal_head_val);
				  //alert(sal_head_perc);
				  $("#"+i).find("input[class='emp_salary_head_val_id']").val(sal_head_val_id);
				  $("#"+i).find("td[class='sal_head_perc']").html(sal_head_perc);
				  $("#"+i).find("input[id='sal_head_val']").val(sal_head_val);
				  
			  }
			  /*$(".emp_salary_head").attr("checked","");*/
		  }
	  });
  }
  
  function load_designations(txtdesignation,form_mode,curr_element='')
  {
	  if(curr_element!='')
	  {
		  dept_val=$("select[name='"+curr_element+"']").val();
	  }
	  else
	  {
		  dept_val=$("#txtdept").val();
	  }
	  var data1 = "q="+dept_val+"&selected_desgn="+txtdesignation;
	  
	  $.post("../includes/_auto_fetch_designations.php",data1, function(data) {
		  var recvd_data=data.trim();
		  
			 if(recvd_data!='')
			 {
				 if(form_mode!="V")
				 {
					if(curr_element!='')
					{
						$("select[name='"+curr_element+"']").parents().next().children('#txtdesignation_id').removeAttr('disabled');
					}
					else
					{
						$("#txtdesignation_id").removeAttr('disabled');
					}
				 }
				 
				 if(curr_element!='')
					{
						$("select[name='"+curr_element+"']").parents().next().children('#txtdesignation_id').html(data);
					}
					else
					{
						$("#txtdesignation_id").html(data);
					}
			 }
			 else
			 {
				 if(curr_element!='')
					{
						$("select[name='"+curr_element+"']").parents().next().children('#txtdesignation_id').attr('disabled','');
					}
					else
					{
						$("#txtdesignation_id").attr('disabled','');
					}
			 }
	  });
  }
  
		

	function runEffect(element_class,selectedEffect) {
		
		//$( "."+element_class ).hide();
		
      // get effect type from
      //var selectedEffect = 'bounce';
 
      // Most effect types need no options passed by default
      var options = {};
      // some effects have required parameters
      if ( selectedEffect === "scale" ) {
        options = { percent: 50 };
      } else if ( selectedEffect === "size" ) {
        options = { to: { width: 280, height: 285 } };
      }
 
      $( element_class ).effect( selectedEffect,1000 );
	  
	  if(rpt=='multiple')
	  {
	  setInterval(function() {
        //$( "."+element_class+":visible" ).removeAttr( "style" ).fadeOut();
		// Run the effect
      $( element_class ).effect( selectedEffect,1000 );
      }, 5000 );
	  }
	  
    };
 
    //callback function to bring a hidden box back
    function callback() {
      setTimeout(function() {
        //$( "#effect:visible" ).removeAttr( "style" ).fadeOut();
      }, 1000 );
    };

$(document).ready(function(){
	
	//<![CDATA[
		function checkAll(c,cnt)
		{
//alert(cnt);
            for (i = 1; i < cnt; i++) {
                document.getElementById('chk' + i).checked = c;
            }
        }
		
    //]]>
	
	$("#chk_all_media").change(function(){
		var cnt = document.getElementById('count').value;
		var act_cnt=cnt-1;
		var c = ($("#chk_all_media").prop('checked'));
		for (i = 1; i < cnt; i++){
			document.getElementById('chk' + i).checked = c;
		}
		
	});
	
	$(".chk_media").change(function(){
	var flag=1;
	var cnt = $("#count").val();
	//alert(cnt);
	for (i = 1; i < cnt; i++){
	
		var chk_sts = ($("#chk"+i).prop('checked'));
	
		if(chk_sts==true){
			flag=0; 
			//continue;
		}
		else{
			$('#chk_all_media').prop('checked',chk_sts);
		}
	}
	if(flag==0){
		$('#bulk_editing').css('display','');
	}
	else{
		$('#bulk_editing').css('display','none');
	}
	});
	
	$("input[type='number']").attr("min","0");

	function validate()
	{
		var name_patt = new RegExp("^[A-Za-z ']+$");
		var contact_no_patt = new RegExp("[0-9]{10}");
		var email_id_patt = new RegExp("(^[A-Za-z0-9._]+[@]+[A-Za-z]+[.]+[A-Za-z]+$)|(^[A-Za-z0-9._]+[@]+[A-Za-z]+[.]+[A-Za-z]+[.]+[A-Za-z]+$)");
		var flag=0;
		var num = $("#txtcontact_no").val();
		var num_length = num.length;
		var num2 = $("#txtcontact_no2").val();
		var num2_length = num2.length;
		
			if(((contact_no_patt.test($("#txtcontact_no").val())) && (num_length==10))||($("#txtcontact_no").val()==''))
			{
				//alert('hi1');
				$("#txtcontact_no").css("background-color","#fff");
			}
			else{
				flag=1;
				$("#txtcontact_no").css("background-color","rgb(230, 189, 191)");
				//alert('hi2');
			}
			
			if(((contact_no_patt.test($("#txtcontact_no2").val())) && (num2_length==10))||($("#txtcontact_no2").val()==''))
			{
				//alert('hi1');
				$("#txtcontact_no2").css("background-color","#fff");
			}
			else{
				flag=1;
				$("#txtcontact_no2").css("background-color","rgb(230, 189, 191)");
				//alert('hi2');
			}
		
		
			if((email_id_patt.test($("#txtemail_id").val())) || ($("#txtemail_id").val()==''))
			{
				//alert('hi1');
				$("#txtemail_id").css("background-color","#fff");
				
			}
			else{
				flag=1;
				$("#txtemail_id").css("background-color","rgb(230, 189, 191)");
				
				//alert('hi2');
			}
			
			if(flag==1)
			{
				$(".btn").attr("disabled","");
			}
			else{
				$(".btn").removeAttr('disabled');
			}
		
	}
	
	$("#txtcontact_no").change(function(){
		
		validate();
		
	});
	$("#txtcontact_no2").change(function(){
		
		validate();
		
	});
	
	$("#txtemail_id").change(function(){
		validate();
	});
});