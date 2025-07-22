<?php 
function build_form( $form ) {
	echo "<form name='{$form['name']}' method='{$form['method']}'>";

	foreach ($form['fields'] as $id => $attribute) {

		if (isset($attribute['label'])) {
			echo "<label for='{$id}'><h4>{$attribute['label']}</h4></label>";
		}

		switch ($attribute['type']) {
			case 'text':
				$html_tag = "<input id='{$id}' name='{$id}' type='{$attribute['type']}' required='{$attribute['required']}' placeholder='{$attribute['placeholder']}' /><br>";
				break;

			case 'email':
				$html_tag = "<input id='{$id}' name='{$id}' type='{$attribute['type']}' required='{$attribute['required']}' placeholder='{$attribute['placeholder']}' /><br>";
				break;

			case 'select':
				$html_tag = "<select id='{$id}' name='{$id}'>";
				foreach ($attribute['options'] as $option) {				
					$html_tag .= "<option value='$option'>{$option}</option>";
				}
				$html_tag .= "</select><br>";
				break;
			
			case 'radio':
				$html_tag = "";
				foreach ($attribute['options'] as $option) {
					$html_tag .= "<input id='{$option}_radio' name='{$id}' type='{$attribute['type']}' />";
					$html_tag .= "<label for='{$option}_radio'>{$option}</label><br>";
				}
				break;

			case 'checkbox':
				$html_tag = "";
				if (isset($attribute['options'])) {
					foreach ($attribute['options'] as $option) {
						$html_tag .= "<input id='{$option}' name='{$option}' type='{$attribute['type']}' />";
						$html_tag .= "<label for='$option'>{$option}</label><br>";
					}
				}
				if (isset($attribute['value'])) {
					$html_tag = "<input id='{$id}' name='{$id}' type='{$attribute['type']}' checked='{$attribute['value']}' /><br>";
				}
				break;

			case 'textbox':
				$html_tag = "<textarea id='{$id}' name='{$id}'></textarea><br>";
				break;

			case 'submit':
				$html_tag = "<input type='{$attribute['type']}' value='{$attribute['value']}' /><br>";
				break;
		}
		echo $html_tag;
	}

	echo "</form>";
}

require_once( 'define-form.php' );

echo build_form( $form );