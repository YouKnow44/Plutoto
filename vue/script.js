


// autocomplet : this function will be executed every time we change the text
function autocomplet_plutoto() {
	var min_length = 1; // min caracters to display the autocomplete
	var keyword = $('#input_plutoto').val();
	if (keyword.length >= min_length) {
		$.ajax({
			url: "modele/ajax/ajax_refresh_plutoto.php",
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#ul_autocomplet_plutoto').show();
				$('#ul_autocomplet_plutoto').html(data);
			}
		});
	} else {
		$('#ul_autocomplet_plutoto').hide();
	}
}

$(document).on('click','#ul_autocomplet_plutoto li', function(){
	$('#input_plutoto').val($(this).text());
	$('#ul_autocomplet_plutoto').hide();
});

function go_to_plutoto(){
	var valueInput = document.getElementById('input_plutoto').value;
	if(valueInput != ""){
		window.location.href="index.php?plutoto="+valueInput;
	}
	else{
		window.location.href="index.php";
	}
}


