$(function(){

	$.validator.addMethod("valueNotEquals", function(value, element, arg){
            return arg !== value;
        }, "Harap pilih item");
        
        $.validator.addMethod('strongNope', function(value, element){
           return this.optional(element) || (value.length>=10 && value.length<=13);
        }, 'Nomor HP minimal 10 - 13 Digit Angka');

	$('#formInput').validate({
		rules: {
			stok :{
				required: true,
                                valueNotEquals: "--Pilih Barang--"
			},
			mediator :{
				required: false,
				alphanumeric: true
					
			},
                        sales :{
				required: true,
                                nowhitespace: true
			},
                        tglJual :{
				required: true,
                                date: true
			},
                        hrg_jual :{
				required: true,
                                alphanumeric: true
			},
                        feeMediator :{
				required: true,
                                alphanumeric: true
			},
                        feeSales :{
				required: true,
                                alphanumeric: true
			},
                        leas :{
				required: true,
                                alphanumeric: true
			},
                        tenor :{
				required: true,
                                alphanumeric: true
			},
                        pelanggan :{
				required: true,
                                alphanumeric: true
			}
		}
//                ,
//		messages: {
//			stok :{
//				required: 'Harap Isi Nama!',
//                                valueNotEquals: 'Harap Pilih Barang Terlebih Dahulu!'
//			},
//			username :{
//				required: 'Harap Isi Username!',
//				nowhitespace: 'Harap tidak menggunakan Spasi',
//				alphanumeric: 'Hanya diperkenankan huruf, angka, dan underscore',
//				remote: 'Username sudah terdaftar, jika sudah terdaftar silahkan <a href="/fargasa/index.php?action=login">Login</a>!'
//			},
//			password :{
//				required: 'Harap isi Password!',
//                alphanumeric: 'password hanya boleh Huruf dan Angka!'
//			},
//			alamat : {
//				required: 'Harap Isi Alamat!'
//			},
//			email : {
//				email: 'Harap isi E-mail yang Valid!',
//                remote: 'Email ini sudah terdaftar!'
//			},
//			nope : {
//				required: 'Harap mengisi Nomer HP',
//				number: 'Hanya diperkenankan angka saja!'
//			}
//		}
	});
});