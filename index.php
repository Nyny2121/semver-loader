<?php
$builds = '/var/www/example.com/public_html/builds/';		# Change this to reflect your build directory on the server
$folders = array_diff(scandir($builds,1), array('.','..'));
$latest = '0.0.0';

foreach ($folders as $str) {
	$version = explode('.',$str);
	$latest_arr = explode('.', $latest);

	if ($latest_arr[0] < $version[0]) {
		$latest = $str;
	} elseif ($latest_arr[0] == $version[0]) {
		if ($latest_arr[1] < $version[1]) {
			$latest = $str;
		} elseif ($latest_arr[1] == $version[1]) {
			if ($latest_arr[2] < $version[2]) {
				$latest = $str;
			}
		}
	}
}

echo '<body style="margin: 0; padding: 0">';
# Change the following line to the link to your builds folder URL
echo ('<iframe src="https://example.com/builds/'.$latest.'/index.html" style="border: 0; width: 100%; height: 100%;" name="game-iframe" autofocus="true"></iframe>');
echo '</body>'
?>
