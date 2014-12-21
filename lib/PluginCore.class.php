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

abstract class PluginCore {

	/** Plugin slug */
	private $slug = NULL;

	/**
	 * @param slug plugin slug
	 * @param initHookName action hook for initialize this plugin
	 */
	public function PluginCore($slug, $initHookName) {
		$this->slug = $slug;
		$this->registerActionHook($initHookName, array($this, 'init'));
	}

	/**
	 * initialize plugin and register all hook(s).
	 */
	public function init() {
		$this->registerActionHooks();
		$this->registerFilters();
	}

	protected function registerActionHooks() {
	}
	protected function registerFilters() {
	}

	protected function registerActionHook($hookName, $callback, $priority = 10, $acceptedArgs = 1) {
		add_action($hookName, $callback, $priority, $acceptedArgs);
	}

	protected function registerFilter($hookName, $callback, $priority = 10, $acceptedArgs = 1) {
		add_filter($hookName, $callback, $priority, $acceptedArgs);
	}

	protected function h($html) {
		return htmlspecialchars($html, ENT_QUOTES);
	}

	private function callTriggerError($msg, $level) {
		trigger_error($this->h($msg), $level);
	}

	protected function info($info) {
		$this->callTriggerError($info, E_USER_NOTICE);
	}
	protected function warn($warn) {
		$this->callTriggerError($warn, E_USER_WARNING);
	}
	protected function error($err) {
		$his->callTriggerError($warn, E_USER_ERROR);
	}
}

