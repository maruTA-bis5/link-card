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
require_once dirname(__FILE__).'/loader.php';
class Net_Bis5_LinkCard extends PluginCore {

	const SLUG = 'link-card';

	public function Net_Bis5_LinkCard() {
		parent::__construct(Net_Bis5_LinkCard::SLUG, 'init');
	}

	/** 
	 * @Override
	 */
	public function init() {
		wp_enqueue_script(Net_Bis5_LinkCard::SLUG, plugin_dir_url(dirname(__FILE__)).'js/link-card.js', array('jquery'));
		wp_enqueue_style(Net_Bis5_LinkCard::SLUG, plugin_dir_url(dirname(__FILE__)).'css/link-card.css');
		parent::init();
	}

	/**
	 * @Override
	 */
	public function registerActionHooks() {
		$this->registerActionHook('wp_head', array($this, 'actionHeadRegJsGlobal'));
	}

	public function actionHeadRegJsGlobal() {
		echo '<script type="text/javascript">link_card_glb_url="'.home_url().'";</script>';
	}
}
