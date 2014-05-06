<?php

/**
 * Custom functionality for BenPlum.com
 */
class Site {

	private $live = false;
	private $base_url = "";
	private $current_url = "";

	public function config_loaded(&$settings) {
		$this->live = ($settings["base_url"] === "http://benplum.com");
		$this->base_url = $settings["base_url"];

		$this->meta_vars = (isset($settings["meta_vars"]) && is_array($settings["meta_vars"])) ? $settings["meta_vars"] : array();
		$this->meta_vars["base_url"] = $this->base_url;
	}

	public function request_url(&$url) {
		$this->current_url = $url;
	}

	public function before_read_file_meta(&$headers) {
		$headers["cover"] = "Cover";
	}

	public function file_meta(&$meta) {
		// extra page data, json filename should match md filename
		$path = trim(str_ireplace($this->base_url, "", $this->current_url), "/");
		$file = CONTENT_DIR . (($path === "") ? "index" : $path) . ".json";

		if (file_exists($file)) {
			$data = $this->replace_meta(file_get_contents($file));
			$meta = array_merge($meta, json_decode($data, true));
		}
	}

	public function get_page_data(&$data, $page_meta) {
		$data = array_merge($data, $page_meta);
		$data["cover"] = $this->replace_meta($data["cover"]);
	}

	public function before_render(&$twig_vars, &$twig, &$template) {
		$twig_vars["live"] = $this->live;
	}

	public function replace_meta($content) {
		$keys = array();
		$vals = array();
		foreach ($this->meta_vars as $key => $val) {
			$keys[] = "{" . $key . "}";
			$vals[] = $val;
		}

		return str_ireplace($keys, $vals, $content);
	}
}

?>