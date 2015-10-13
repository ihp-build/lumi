<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Корзина");
$APPLICATION->SetTitle("Корзина");
?>

<?	
	if (isset($_REQUEST['add']) && isset($_REQUEST['element_id']))
	{
		$element_id = $_REQUEST['element_id'];
		
		if (isset($_COOKIE['cart_elements']))
		{
			$json_object = $_COOKIE['cart_elements'];
			$json_res = (array)json_decode($json_object);
			
			$is_ok = true;
			foreach ($json_res as $key => $value)
			{
				$val = (array)$value;
				if ( $val['element_id'] == $element_id )
					$is_ok = false;
			}

			if ( $is_ok )
			{
				$json_res[] = array("element_id" => $element_id, "quantity" => 1);
				$json_object = json_encode($json_res);
				
				setcookie('cart_elements', $json_object, time()+3600);  /* expire in 1 hour */
				echo "Товар " . $element_id . " добавлен в корзину";
			}
		}
		else
		{
			$json_res = array();
			$json_res[] = array("element_id" => $element_id, "quantity" => 1);

			$json_object = json_encode($json_res);
			setcookie('cart_elements', $json_object, time()+3600);  /* expire in 1 hour */
			echo "Товар " . $element_id . " добавлен в корзину";
		}
	}

	if (isset($_COOKIE['cart_elements']))
	{
		$json_rs = (array)json_decode($_COOKIE['cart_elements']);
		echo "<pre>";
		print_r($json_rs);
		echo "</pre>";
	}

?>

<h3>Ваша корзина пуста</h3>

<p>

<a href="/cart/?add&element_id=1">Добавить товар ID 1 в корзину</a>

</p>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>