<div class="footer clear_fix">
	<div class="max_width">
		<div class="col_4 col_pad20">
			<div class="footer_addr">
				<?$APPLICATION->IncludeFile(
					"/include/contacts_addr.php",
					Array(),
					Array("MODE"=>"text")
				);?>
			</div>
			<div class="footer_phone">
				<?$APPLICATION->IncludeFile(
					"/include/contacts_phone.php",
					Array(),
					Array("MODE"=>"text")
				);?>
			</div>
			<div class="footer_mail">
				<?$APPLICATION->IncludeFile(
					"/include/contacts_email.php",
					Array(),
					Array("MODE"=>"text")
				);?>
			</div>
			<div class="footer_soc clear_fix">
				<a href="facebook"><i class="fa fa-facebook"></i></a>
			</div>
		</div>


		<div class="col_4 col_pad20 footer_addr">

		</div>
	</div>
</div>