<?php

if (isset($_REQUEST['add']) && isset($_REQUEST['element_id']))
{
	$element_id = $_REQUEST['element_id'];
	
	if (isset($_COOKIE['cart_elements']))
	{
		$json_object = $_COOKIE['cart_elements'];
		$json_res = (array)json_decode($json_object);
		
		$never_added = true;

		$json_res_copy = array();
		foreach ($json_res as $key => $value)
		{
			$val = (array)$value;

			$current_quantity = $val['quantity'];

			if ( $val['element_id'] == $element_id )
			{
				$never_added = false;
				$json_res_copy[] = array("element_id" => $val['element_id'], "quantity" => intval($val['quantity'])+1);
				$current_quantity += 1;
			}
			else
			{
				$json_res_copy[] = array("element_id" => $val['element_id'], "quantity" => $val['quantity']);
			}
		}

		if ($never_added)
			$json_res_copy[] = array("element_id" => $element_id, "quantity" => 1);

		$json_object = json_encode($json_res_copy);
		
		setcookie('cart_elements', $json_object, time()+3600);  /* expire in 1 hour */
		echo "{'added': 'true', 'element_id': '".$element_id."', 'quantity': '".(string)$current_quantity."'}";
	}
	else
	{
		$json_res = array();
		$json_res[] = array("element_id" => $element_id, "quantity" => 1);

		$json_object = json_encode($json_res);
		setcookie('cart_elements', $json_object, time()+3600);  /* expire in 1 hour */
		echo "{'added': 'true', 'element_id': '".$element_id."', 'quantity': '1'}";
	}
}
else
	echo "{'added': 'false'}";

?>