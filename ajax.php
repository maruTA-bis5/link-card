<?php
/*
 * Copyright 2014 maruTA <bis5.wsys@gmail.com>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 *     Unless required by applicable law or agreed to in writing, software
 *     distributed under the License is distributed on an "AS IS" BASIS,
 *     WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *     See the License for the specific language governing permissions and
 *     limitations under the License.
 */
header('Content-Type: text/plain');

if (isset($_GET['tg'])) {
	$href = $_GET['tg'];
	if (preg_match('/^https?:/', $href)) {
		$content = file_get_contents($href);
		$doc = new DOMDocument();
		$doc->loadHTML($content);
		$titleTag = $doc->getElementsByTagName('title');
		$title = $titleTag->item(0)->nodeValue;
		echo htmlspecialchars($title);
	}
}
