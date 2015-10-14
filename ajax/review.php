<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>

<?
if(isset($_REQUEST['submit'])){?>
	
	<?
	if (!CModule::IncludeModule("iblock")) {
		CModule::IncludeModule("iblock"); 
	}
	$feedback_iblock_id = 2;
	$mail_iblock_id = 8;

	// Clean up the input values
	foreach($_POST as $key => $value) {
		if(ini_get('magic_quotes_gpc'))
			$_POST[$key] = stripslashes($_POST[$key]);
		
		$_POST[$key] = htmlspecialchars(strip_tags($_POST[$key]));
	}

	// Assign the input values to variables for easy reference
	$name = $_POST["uname"];
	$email = $_POST["umail"];
	$message = $_POST["umessage"];

	// Test input values for errors
	$errors = array();
	if(strlen($name) < 2) {
		if(!$name) {
			$errors[] = "Поле с именем не заполнено.";
		} else {
			$errors[] = "В имени должно быть больше 2-х символов.";
		}
	}
	if(!$email) {
		$errors[] = "Поле с email не заполнено.";
	} else if(!validEmail($email)) {
		$errors[] = "Введите правильный email.";
	}
	if(strlen($message) < 10) {
		if(!$message) {
			$errors[] = "Поле с сообщением не заполнено.";
		} else {
			$errors[] = "В сообщении должно быть больше 10-ти символов.";
		}
	}

	if($errors) {
		// Output errors and die with a failure message
		$errortext = "";
		foreach($errors as $error) {
			$errortext .= "<li>".$error."</li>";
		}
		die("<div class='notify'>При отправке были получены ошибки:<ul>". $errortext ."</ul></div>");
	}
	// Send the email
	// $rsSites = CSite::GetByID(SITE_ID);
	// $arSite = $rsSites->Fetch();
	// $to = $arSite['EMAIL'];

	//отправка сообщения
	$arEventFields = array(
		//"EMAIL_TO"    		=> $to,
		"AUTHOR"    		=> $name,
		"AUTHOR_EMAIL"      => $email,
		"TEXT"          	=> $message
	);
	$status = CEvent::Send("NEW_FEEDBACK_FROM", SITE_ID, $arEventFields, 'N', 11);

	// запись сообщения в инфоблок
	$el = new CIBlockElement();

	// добавляем отзыв
	$arLoadProductArray = Array(
		"MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
		"IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
		"IBLOCK_ID"      => $feedback_iblock_id,
		"NAME"           => $name,
		"ACTIVE"         => "N",            // Неактивен
		"PREVIEW_TEXT"    => $message
	);

	if(!($el->Add($arLoadProductArray))) {	
		die("<div class='notify'>Error add feedback iblock: ".$el->LAST_ERROR."</div>");
	}
	
	?>
	

	<div class="notify">
		<h2>Спасибо,</h2>
		<div>ваш отзыв появится после модерации</div>
	</div>

<?
	return;
}
?>

	<div class="notify">
		<form class="form_opened" action="/ajax/review.php?submit" method="post" onsubmit="return ajaxFormTry($(this))">
			<div class="form_opened_head">Оствить отзыв</div>
		
			<input type="text" class="required" name="uname" placeholder="Имя"/>
			<input type="text" class="required_mail" name="umail" placeholder="e-mail"/>
			<textarea name="umessage" class="required" placeholder="Отзыв"></textarea>		
			<input type="submit" class="button button_line" value="Отправить"/>
		</form>
	</div>
	
	
<?php
// A function that checks to see if
// an email is valid
function validEmail($email)
{
   $isValid = true;
   $atIndex = strrpos($email, "@");
   if (is_bool($atIndex) && !$atIndex)
   {
      $isValid = false;
   }
   else
   {
      $domain = substr($email, $atIndex+1);
      $local = substr($email, 0, $atIndex);
      $localLen = strlen($local);
      $domainLen = strlen($domain);
      if ($localLen < 1 || $localLen > 64)
      {
         // local part length exceeded
         $isValid = false;
      }
      else if ($domainLen < 1 || $domainLen > 255)
      {
         // domain part length exceeded
         $isValid = false;
      }
      else if ($local[0] == '.' || $local[$localLen-1] == '.')
      {
         // local part starts or ends with '.'
         $isValid = false;
      }
      else if (preg_match('/\\.\\./', $local))
      {
         // local part has two consecutive dots
         $isValid = false;
      }
      else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain))
      {
         // character not valid in domain part
         $isValid = false;
      }
      else if (preg_match('/\\.\\./', $domain))
      {
         // domain part has two consecutive dots
         $isValid = false;
      }
      else if(!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/',
                 str_replace("\\\\","",$local)))
      {
         // character not valid in local part unless 
         // local part is quoted
         if (!preg_match('/^"(\\\\"|[^"])+"$/',
             str_replace("\\\\","",$local)))
         {
            $isValid = false;
         }
      }
      if ($isValid && !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A")))
      {
         // domain not found in DNS
         $isValid = false;
      }
   }
   return $isValid;
}
?>

