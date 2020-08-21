<?php  

class Controller{
	//fungsi view untuk redirect ke halaman view
	public function view($view, $data=[])
	{
		require_once '../app/views/'.$view.'.php';
	}
	//fungsi untuk redirect ke model
	public function model($model)
	{
		require_once '../app/models/'.$model.'.php';
		return new $model;
	}
}