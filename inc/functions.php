<?php 

	function str_rand($length = 8, $output = 'alphanum')
	{
		// Possible seeds
		$outputs['alpha']    = 'abcdefghijklmnopqrstuvwqyz';
		$outputs['numeric']  = '0123456789';
		$outputs['alphanum'] = 'abcdefghijklmnopqrstuvwqyz0123456789';
		$outputs['hexadec']  = '0123456789abcdef';
	 
		// Choose seed
		if (isset($outputs[$output])) {
			$output = $outputs[$output];
		}
	 
		// Seed generator
		list($usec, $sec) = explode(' ', microtime());
		$seed = (float) $sec + ((float) $usec * 100000);
		mt_srand($seed);
	 
		// Generate
		$str = '';
		$output_count = strlen($output);
		for ($i = 0; $length > $i; $i++) {
			$str .= $output{mt_rand(0, $output_count - 1)};
		}
	 
		return $str;
}


?>