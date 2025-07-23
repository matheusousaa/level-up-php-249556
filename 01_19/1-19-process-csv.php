<?php
function print_array( $a ) {
	echo '<pre>';
	print_r($a);
	echo '</pre>';

}

function convert_csv_to_json( $file ) {
	$csv_data = file_get_contents($file);
	$rows = explode(PHP_EOL, $csv_data);
	$columns = explode(',', $rows[0]);
	$columns_total = count($columns);
	$count = 0;
	$data_array_to_convert = array();

	for ($i=1; $i < count($rows); $i++) {
		$row_array = array();

		foreach (explode(',', $rows[$i]) as $row_data) {
			if ($count == $columns_total) {
				$count = 0;
			}

			$row_array[$columns[$count]] = $row_data;

			if ($count == $columns_total-1) {
				$data_array_to_convert[] = $row_array;
				$row_array = array();
			}

			$count++;
		}
	}
	return json_encode($data_array_to_convert);
}

$csv = 'customers.csv';

$json = convert_csv_to_json( $csv );

print_array($json);