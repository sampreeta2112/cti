
  
  $( function() {	
 
    $( "#txtsup_nm" ).autocomplete({
		
      minLength: 0,
      source: function(request, response) {
		
        $.ajax({
			  type :'POST',
			  dataType: "json",
            url: '../shared_files/_auto_fetch_supplier.php',
           
            data: {
                term : request.term
            },
            success: function(data) {
		      
            response(data);
            },
			error:function(data) {
		      console.log(data);
            }
			
        });
    },
      focus: function( event, ui ) {
        
		
        return false;
      },
      select: function( event, ui ) {
        $( "#txtsup_nm" ).val( ui.item.label );
        $( "#txtsup_id" ).val( ui.item.value );
		
       // $( "#emp_description" ).html( ui.item.desc );
        //$( "#emp_dp" ).attr( "src", "http://localhost/Ratnapriya/HR_module/img/icons/" + ui.item.icon );
 
        return false;
      }
    })
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append( "<div>" + item.label + "<br>" + item.desc + "</div>" )
        .appendTo( ul );
    };
  } );
	
