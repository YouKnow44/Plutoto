
var Jaime = {
	evenements: function() {
//		$('a.jaime').click(this.click);
		$('a.jaime').click(Jaime.click);
	},
	precharger: function() {
		var jaimes = $('a.jaime');
		for(var i = 0, l = jaimes.length; i < l; i++) {
			$.ajax({
				context: jaimes[i], // $(this)
				type: 'POST',
				url: 'jaime.php',
				data: 'cle=' + encodeURIComponent($(jaimes[i]).attr('title')),
				success: function(data) {
					var votes = parseInt(data);
					if(isNaN(votes)) {votes = '-1';}
					if(votes > 0) {
						$(this).html('J&rsquo;aime <em>(' + votes + ')</em>');
					} else {
						$(this).html('J&rsquo;aime');
					}
				}
			});
		} // for
	},
	click: function(event) {
		var element = event.currentTarget; // comme this ( et non: event.target )
		$(element).unbind('click'); // stopper les multi-clicks
		$(element).click(function() { return false; }); // blocage du lien
		
		$.ajax({
			context: element, // $(this)
			type: 'POST',
			url: 'jaime.php',
			data: 'vote=&cle=' + encodeURIComponent($(element).attr('title')),
			success: function(data) {
				$(this).css({'opacity':0});
				$(this).addClass('jaime-a-voter');
				var votes = parseInt(data);
				if(isNaN(votes)) {votes = '-1';}
				if(votes > 1) {
					$(this).html(votes + ' personnes aiment &ccedil;a');
				} else {
					$(this).html(votes + ' personne aime &ccedil;a');
				}
				$(this).animate({'opacity':1}, {'duration':'slow'});
			},
			error: function() {
				alert('Une erreur s\'est produite, merci de recharger votre page');
			}
		});
		return false;
	}
};

$(document).ready(function() {
	Jaime.evenements();
	Jaime.precharger();
});
