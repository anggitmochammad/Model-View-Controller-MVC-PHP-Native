<?php  


class About extends Controller{

	public function index($nama='Anggit',$pekerjaan='Mahasiswa',$umur='21')
	{
		//mengirim data
		$data['nama'] =$nama;
		$data['pekerjaan'] =$pekerjaan;
		$data['umur'] =$umur;
		$data['judul'] = 'index about';

		$this->view('templates/header',$data);
		$this->view('about/index',$data);
		$this->view('templates/footer');
	}
	public function page()
	{	
		$data['judul'] = 'Page about';

		$this->view('templates/header',$data);
		$this->view('templates/header');
		$this->view('about/page');
		$this->view('templates/footer');
		
	}
}