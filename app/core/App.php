<?php  

class App{
	//membuat controller dan method default
	protected $controller ='Home';
	protected $method ='index';
	protected $params = [];

	public function __construct()
	{	

		
		//url berisi apapun yang diketikkan di url
		$url = $this->parseURL();

		if ($url == NULL) {
			$url = [$this->controller];
		}
		//mengecek file dalam ada atau tidak dalam folder dengan yang diketikkan pada url controller jika ada maka controller ganti dengan yang sama pada url
		if (file_exists('../app/controllers/'.$url[0].'.php')) {
			$this->controller = $url[0];
			unset($url[0]);
		}
		// memanggil file controller yang diketikkan pada url dengan index 0
		require_once '../app/controllers/'.$this->controller.'.php';
		//menimpa controller default dengan controller baru yang telah diketikkan
		$this->controller = new $this->controller;


		// method
		if (isset($url[1])) {
			if (method_exists($this->controller, $url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		//parameter
		if (!empty($url)) {
			//mengisi parameter dengan nilai array yang ada pada url
			$this->params=array_values($url);
		}
		//jalankan controller dan method, serta kirimkan parameter jika ada
		call_user_func_array([$this->controller,$this->method], $this->params);

	}



	public function parseURL()
	{
		//memeriksa apakah url sudah ada
		if(isset($_GET['url'])){
			//rtrim berfungsi untuk menghapus slash pada bagian akhir
			$url = rtrim($_GET['url'],'/');
			//memfilter url agar terhindar dari character ngawur
			$url = filter_var($url, FILTER_SANITIZE_URL);
			//memecah url dengan pembatas /
			$url = explode('/', $url);
			return $url;
		}
	}
}