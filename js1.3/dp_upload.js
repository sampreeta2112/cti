
	$(document).ready(function(){
		
		$("#dp_display").click(function(){
			$("#dp_upload").trigger("click");
		});
		
		$("#dp_upload").change(function(){
			
			var file_content = this.files[0], file_name=file_content.name, file_size=file_content.size, file_type=file_content.type;
			var imageType = new Array("image/png","image/jpeg");
			
			if(imageType.indexOf(file_type)== -1)
			{
				alert("Error:Invalid file type...!");
				return false;
			}
			else
			{
				if($("#dp_upload").val()!='')
				{
					var fd = new FormData(document.querySelector("form"));
					
					$.ajax({
					url: "upload_dp.php",
					type: "POST",
					data: fd,
					beforeSend: function(){
						//$("#dp_display").addClass("dp_loading").replaceWith("<img id='dp_display' src='../img/Loading_icon-old.gif'>");
					},
					success: function(res) {
						//$("#dp_display").attr('src',res);
						//$("#dp_display").click(function(){
						//	$("#dp_upload").trigger("click");
					//	});
						alert(res);
						return false;
					},
					error: function(){
						alert("Error");						
                        },
					cache:false,
					contentType:false,
					processData:false
					});
					
				}
			}
			
		});
		
	});