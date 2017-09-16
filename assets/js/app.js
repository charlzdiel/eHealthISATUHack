$(document).ready(function() {

	$( ".number-only" ).keyup( function(){ 
		this.value = this.value.replace(/[^0-9{1}\.]/g,'');
	});

	$("#acct_type").change(function(){
		if($( "#acct_type option:selected" ).val()==0 || $( "#acct_type option:selected" ).val()==2){ 
			$("#specialization").attr("disabled","disabled"); 
		} else {
			$("#specialization").removeAttr("disabled");
		}
	});
		
	

});
