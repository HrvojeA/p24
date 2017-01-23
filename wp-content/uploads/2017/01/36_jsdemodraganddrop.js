$('.list-item')
	.bind('dragstart', function (evt) {
		evt.dataTransfer.setData('text', this.id);

		$('h2').fadeIn('fast');
	})
	.hover(
		 
	);

$('#lights').click(function(){



});

$('#drop_zone')
	.bind('dragover', function (evt) {
		evt.preventDefault();
	})
	.bind('dragenter', function (evt) {
		evt.preventDefault();
	})
	.bind('drop', function (evt) {
		var id = evt.dataTransfer.getData('text');


		var item_name = $('#'+id+' .row .item-heading .item-name').text(),
		 	item_price =$('#'+id+' .row .item-heading .item-price').text();
		console.log(item_name+"   "+item_price);

		var	cartList = $("#cart ul"),
			total = $("#total span"),

			prevCartItem = null,
			notInCart = (function () {
				var lis = $('li', cartList),
					len = lis.length,
					i;

				for (i = 0; i < len; i++ ) {
					var temp = $(lis[i]);
					if (temp.data('id') === id) {

						prevCartItem = temp;
						return false;
					}
				}
				return true;
			} ())

		 ;

		$("h2").fadeOut('fast');


		if (notInCart) {
			prevCartItem = $('<li />', {
				text :item_name,
				data : { id : id }
			}).prepend($('<span />', {
				'class' : 'price',
				text : item_price
			})).appendTo(cartList);
		}



		total.text((parseFloat(total.text(), 10) + parseFloat(item_price.split('$')[1])).toFixed(2));

		evt.stopPropagation();
		return false;
	});