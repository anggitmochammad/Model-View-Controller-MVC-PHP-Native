<?php  

class Home extends Controller{
	//method default
	public function index()
	{
		$data['judul'] = 'home';
		$data['nama'] = $this->model('User_model')->getUser();
		$this->view('templates/header',$data);
		$this->view('home/index');
		$this->view('templates/footer');
	}
}