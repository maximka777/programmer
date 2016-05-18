$(document).ready(function(){
	$('#delete').click(function(){
		var div = $(this).parent();
		var id = div.children("#itemid")[0].value;
		var table = $("#table")[0].value;
		$.ajax({
			type: 'GET',
			url: 'del_item.php',
			data: "id=" + id + "&table=" + table,
			success: function(){
				div.next().hide();
				div.slideToggle('slow');
			}
		});
	});
});

