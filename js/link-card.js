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
jQuery(function() {
	convertAnchorToCard();
});

function convertAnchorToCard() {
	var $anchors = jQuery("a.createCard");
	$anchors.each(function() {
		console.log("[call convertAnchor] " + jQuery(this).attr("href"));
		convertAnchor(this);
	});
}

function convertAnchor(anchor) {
	var $anchor = jQuery(anchor);
	createCard($anchor);
	$anchor.toggleClass("createCard");
}

function createCard($anchor) {
	var href = $anchor.attr("href");
	jQuery.ajax({
		type:	"GET",
		url:	link_card_glb_url+"wp-content/plugins/link-card/ajax.php?tg="+href,
		cache:	true,
		dataType: "json",
		success: function(data, status, xhr) {
			var card = createCardByJson(data);
			insertCard($anchor, card);
		}
	});
}

function createCardByJson(data) {
	var title = data.title;
	var desc = data.description;
	return '<div class="link-card">'
		+'<span class="link-card-title">'+title+'</span>' + '<br />'
		+'<span class="link-card-desc">'+desc+'</div>' + '</div>';
}

function insertCard($anchor, card) {
	$anchor.before(card);
}
