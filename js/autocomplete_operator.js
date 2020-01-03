
  
  $( function() {	
 
    $( "#txtproject_nm" ).autocomplete({
		
      minLength: 0,
      source: function(request, response) {
		
        $.ajax({
			  type :'POST',
			  dataType: "json",
            url: '../shared_files/_auto_fetch_operater.php',
           
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
        $( "#txtproject_nm" ).val( ui.item.label );
        $( "#txtproject_id" ).val( ui.item.value );
        return false;
      },
      select: function( event, ui ) {
        $( "#txtproject_nm" ).val( ui.item.label );
        $( "#txtproject_id" ).val( ui.item.value );
       // $( "#emp_description" ).html( ui.item.desc );
        //$( "#emp_dp" ).attr( "src", "http://localhost/Ratnapriya/HR_module/img/icons/" + ui.item.icon );
 
        return false;
      }
    })
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append( "<div>" + item.label + "</div>" )
        .appendTo( ul );
    };
  } );
	
