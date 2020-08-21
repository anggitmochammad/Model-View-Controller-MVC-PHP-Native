$(function() {


	//mencari class modal ubah lalu memberi fungsi onclik
	 $('.tampilModalUbah').on('click',function(){

	 	//mencari id judul modal lalu ubah isi htmlnya menjadi
	 	$('#judulModal').html('Ubah Data Mahasiswa');
	 	$('.modal-footer button[type=submit]').html('Ubah Data');

	 	//mencari body form mengganti attribute action ke dalam method ubah
	 	$('.modal-body form').attr('action','http://localhost/belajar/belajar-mvc/public/mahasiswa/ubah');

	 	// const id untuk menangkap id yang di klik
	 	const id = $(this).data('id');

	 	//fungsi ajax hanya untuk mereload sebagian halaman saja tidak semua
	 	$.ajax({
	 		//mengambil data dari url di controller mahasiswa
	 		url: 'http://localhost/belajar/belajar-mvc/public/mahasiswa/getubah',
	 		//nama data : isi data = const id
	 		data:{id:id},
	 		//mengirimkan dengan method post
	 		method:'post',
	 		//type data 
	 		dataType:'json',
	 		success: function(data){
	 			//mengisi form dengan id dengan isi yang didapatkan dari database
	 			$('#nama').val(data.nama);
	 			$('#nim').val(data.nim);
	 			$('#email').val(data.email);
	 			$('#jurusan').val(data.jurusan);
	 			$('#id').val(data.id);
	 		}
	 	});

  });


	 //mencari class tambah lalu memberi fungsi onclik
	$('.tombolTambahData').on('click',function(){

		$('#judulModal').html('Tambah Data Mahasiswa');

	 	$('.modal-footer button[type=submit]').html('Tambah Data');

	 	//terjadi bug saat selesai mengklik tombol edit untuk mereset setelah mengklik tombol edit
	    $('.modal-body form')[0].reset();
	});
	

});