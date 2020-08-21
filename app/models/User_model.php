<?php

class User_model{
	
	protected $nama = 'Anggit lewat model';	

	public function getUser()
	{
		return $this->nama;
	}
}