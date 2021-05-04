$(function(){

	$()

	$('#formInput').validate({
		rules: {
			nama :{
				required: true
			},
			username :{
				required: true,
				nowhitespace: true,
				alphanumeric: true,
				remote: {
			        url: "sites/pelanggan/php/checkUsername.php",
			        type: "post",
			        data: {
			          username: function() {
			            return $( "#username" ).val();
			          }
			        }
		      	}	
			},
			password :{
				required: true
			},
			alamat : {
				required: true
			},
			email : {
				required: false,
				email: true
			},
			nope : {
				required: true,
				number: true
			}
		},
		messages: {
			nama :{
				required: 'Harap Isi Nama!'
			},
			username :{
				required: 'Harap Isi Username!',
				nowhitespace: 'Harap tidak menggunakan Spasi',
				alphanumeric: 'Hanya diperkenankan huruf, angka, dan underscore',
				remote: 'Username sudah terdaftar, jika sudah terdaftar silahkan <br><a href="/fargasa/index.php?action=login">Login</a>!'
			},
			password :{
				required: 'Harap isi Password!'
			},
			alamat : {
				required: 'Harap Isi Alamat!'
			},
			email : {
				email: 'Harap isi E-mail yang Valid!'
			},
			nope : {
				required: 'Harap mengisi Nomer HP',
				number: 'Hanya diperkenankan angka saja!'
			}
		}
	});
});