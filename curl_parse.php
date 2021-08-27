<?php
include __DIR__ . "/simple_html_dom.php";

if (isset($_POST['action']) && $_POST['action'] == 'register') {
	$DOMsrch = $_POST['srch'];

	if (empty(trim($DOMsrch))) {
		echo '<script>alert("Please search correctly");window.location.assign("index.php");</script>';
		exit();
	} else {
		if (!preg_match("/^[0-9a-zA-Z ]+$/i", $DOMsrch)) {
			echo '<script>alert("Please search correctly");window.location.assign("index.php");</script>';
			exit();
		} else {
			$DOMsrchM = str_replace(' ', '+', $DOMsrch);
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "https://www.google.com/search?q=$DOMsrchM");
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$response = curl_exec($ch);
			curl_close($ch);

			// echo $response;
			$html = new simple_html_dom();
			$html->load($response);

			foreach ($html->find('a[href^=/url?]') as $link) {
				if (strpos($link->href, "webcache.google") === false) {
					echo " <tr>
                            <td>" . $link->plaintext . "</td>
                        </tr>";
				}
			}
			//Data without table view

			// foreach ($html->find('a[href^=/url?]') as $link) {
			// 	if (strpos($link->href, "webcache.google") === false) {
			// 		echo "* " . $link->plaintext . "<hr>";
			// 	}

			// }
		}
	}
} else {
	echo '<script>alert("Please search correctly");window.location.assign("index.php");</script>';
	exit();
}