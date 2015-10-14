<style>
	.basket_display{
		padding: 20px 40px;
		max-width: 800px;
	}
	.basket_display h3{
		font-size: 24px;
		text-align: center;
		margin: 20px auto;
		color: #444444;
	}
	.basket_addedd_img{
		width: auto;
		height: auto;
		max-width: 280px;
		margin: 0 auto;
		display: block;
		max-height: 280px;
	}

	.basket_addedd{
		border-bottom: solid #7c7c7c 1px;
		margin-bottom: 20px;
		padding-bottom: 20px;
		padding-left: 20px;
	}

	.basket_addedd h3{
		color: #00a2b0;
	}

	.basket_addedd .button{
		margin: 5px 0;
	}

	.basket_addedd_name{
		color: #003c5e;
		font-size: 18px;
		text-align: center;
		margin: 15px 0;
	}
	.basket_addedd .catalog_table_item_price{
		font-size: 36px;
		display: inline-block;
		margin: 0;
	}

	.basket_addedd_quality{
		display: inline-block;
		font-size: 24px;
		color: ##444444;
		line-height: 1em;
		font-family: 'Forum', "Times New Roman", serif;
	}

	.basket{}
	.basket_slider{
		overflow: hidden;
		padding: 0 20px;
	}

	.basket_slider_display{
		width: 10000%;
	}

	.basket_slider_item{
		display: block;
		width: 0.3333%;
		padding: 10px;
		box-sizing: border-box;
		-moz-box-sizing: border-box; /*Firefox 1-3*/
		-webkit-box-sizing: border-box; /* Safari */
		float: left;
	}

	@media (max-width: 640px) {
		.basket_slider_item{
			width: 0.5%;
		}
	}
	@media (max-width: 480px) {
		.basket_slider_item{
			width: 1%;
		}
	}

	.basket_slider_item_img{
		height: 140px;
		background-position: bottom center;
		background-repeat: no-repeat;
		background-size: contain;
	}
	.basket_slider_item .basket_addedd_name{
		font-size: 16px;
		margin-bottom: 0;
	}

	.basket_slider_item .catalog_table_item_price{
		font-size: 24px;
		display: inline-block;
	}

	.basket_slider_item .basket_addedd_quality{
		font-size: 20px;
	}

	.basket_slider_item a{
		display: block;
		text-decoration: none;
	}

	.basket_full{
		border-top: solid #7c7c7c 1px;
		margin-top: 20px;
		padding-top: 20px;
		font-family: 'Forum', "Times New Roman", serif;
		text-align: center;
		font-size: 20px;
	}

	.basket_full b{
		font-size: 26px;
		color: #00a2b0;
	}


</style>

<div class="basket_display">
	<div class="basket_addedd clear_fix">
		<h3>Товар добавлен в корзину</h3>
		<div class="col_5 col_4_w980 col_8_w640">
			<img src="../upl/el1.jpg" class="basket_addedd_img" alt=""/>
			<div class="basket_addedd_name">Грязная грязь</div>
			<div class="text_center">
				<div class="catalog_table_item_price">350</div>
				<div class="basket_addedd_quality"> x 2 шт.</div>
			</div>
		</div>
		<div class="col_3 col_4_w980 col_8_w640 col_pad20">
			<a onclick="$.fancybox.close()" class="button col_8 col_4_w640 text_center button_line"><i class="fa fa-arrow-left"></i> Продолжить покупки</a>
			<a class="button col_8 col_4_w640 text_center"><i class="fa fa-shopping-cart"></i> Оформить заказ</a>
		</div>
	</div>
	<div class="basket">
		<h3>В корзине товаров: 5</h3>
		<div class="basket_slider">
			<div class="basket_slider_display">
				<div class="basket_slider_item">
					<a href="#">
						<div class="basket_slider_item_img" style="background-image: url('../upl/el1.jpg')"></div>
						<div class="basket_addedd_name">Грязная грязь</div>
					</a>
					<div class="text_center">
						<div class="catalog_table_item_price">350</div>
						<div class="basket_addedd_quality"> x 2 шт.</div>
					</div>
				</div>


				<div class="basket_slider_item"><a href="#"><div class="basket_slider_item_img" style="background-image: url('../upl/el1.jpg')"></div><div class="basket_addedd_name">Грязная грязь</div></a><div class="text_center"><div class="catalog_table_item_price">350</div><div class="basket_addedd_quality"> x 2 шт.</div></div></div>
				<div class="basket_slider_item"><a href="#"><div class="basket_slider_item_img" style="background-image: url('../upl/el1.jpg')"></div><div class="basket_addedd_name">Грязная грязь</div></a><div class="text_center"><div class="catalog_table_item_price">350</div><div class="basket_addedd_quality"> x 2 шт.</div></div></div>
				<div class="basket_slider_item"><a href="#"><div class="basket_slider_item_img" style="background-image: url('../upl/el1.jpg')"></div><div class="basket_addedd_name">Грязная грязь</div></a><div class="text_center"><div class="catalog_table_item_price">350</div><div class="basket_addedd_quality"> x 2 шт.</div></div></div>
				<div class="basket_slider_item"><a href="#"><div class="basket_slider_item_img" style="background-image: url('../upl/el1.jpg')"></div><div class="basket_addedd_name">Грязная грязь</div></a><div class="text_center"><div class="catalog_table_item_price">350</div><div class="basket_addedd_quality"> x 2 шт.</div></div></div>
			</div>
		</div>
		<div class="basket_full">
			Общая сумма покупок: <b>1600</b> руб.
		</div>
	</div>
</div>