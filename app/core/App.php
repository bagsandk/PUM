<?php 
class App{
	//default
	protected $controller ="Home";
	protected $method = 'index';
	protected $params = [];

	//constrak auto jalan.
	public function __construct()
	{
	//membuat string dari url conttroler konek ke controllers
	$url = $this->parseURL();
	if( file_exists('../app/controllers/'.$url[0].'.php')){
		$this->controller = $url[0];
		unset($url[0]);
	}
	//memmanggil sesuai controller
	require_once '../app/controllers/'.$this->controller.'.php';
	$this->controller = new $this->controller;

	//method methode ada di array ke 2 atau [1].

	if(isset($url[1]))
	{
		if(method_exists($this->controller, $url[1]))
		{
			$this->method = $url[1];
			unset($url[1]);
		}
	}
	//parameters
	if(!empty($url))
	{
		$this->params = array_values($url);

	}
	//menjalankan controller,method,paramaters jika ada
	call_user_func_array([$this->controller, $this->method],$this->params);

	var_dump($url);
	}
	//memparse url menjadi array kemudian pemisah / dibuang untuk mengambil stringnya saja kemudian di filter aagar terhindar dari url ngacok
	public function parseURL()
	{
		if( isset($_GET['url']))
		{
			$url = rtrim($_GET['url'],'/');
			$url = filter_var($url,FILTER_SANITIZE_URL);
			$url = explode('/', $url);
			return $url;
		}
	}
}