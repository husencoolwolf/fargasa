$(function(){

	$.validator.addMethod('strongPassword', function(value, element){
           return this.optional(element) || value.length>=6;
        }, 'Password minimal 6 karakter');
        
        $.validator.addMethod('strongNope', function(value, element){
           return this.optional(element) || (value.length>=10 && value.length<=13);
        }, 'Nomor HP minimal 10 - 13 Digit Angka');

	$('.needs-validation').validate({
		rules: {
			nama :{
				required: true,
                                alphanumeric: true
			},
			username :{
				required: true,
				nowhitespace: true,
				alphanumeric: true,
				remote: {
                    url: "php/checkUsername.php",
                    type: "post",
                    data: {
                      username: function() {
                        return $( "#username" ).val();
                      }
                    }
                }	
			},
			password :{
				required: true,
                alphanumeric: true,
                strongPassword: true
			},
			alamat : {
				required: true
			},
			email : {
				required: false,
				email: true,
                    remote: {
                        url: "php/checkEmail.php",
                        type: "post",
                        data: {
                          email: function() {
                            return $( "#email" ).val();
                          }
                        }
                    }
			},
			nope : {
				required: true,
				number: true,
                strongNope: true
			}
		},
		messages: {
			nama :{
				required: 'Harap Isi Nama!',
                            alphanumeric: 'Hanya diperkenankan huruf, angka, dan underscore'
			},
			username :{
				required: 'Harap Isi Username!',
				nowhitespace: 'Harap tidak menggunakan Spasi',
				alphanumeric: 'Hanya diperkenankan huruf, angka, dan underscore',
				remote: 'Username sudah terdaftar, Harap Ganti yang lain!'
			},
			password :{
				required: 'Harap isi Password!',
                alphanumeric: 'password hanya boleh Huruf dan Angka!'
			},
			alamat : {
				required: 'Harap Isi Alamat!'
			},
			email : {
				email: 'Harap isi E-mail yang Valid!',
                remote: 'Email ini sudah terdaftar!'
			},
			nope : {
				required: 'Harap mengisi Nomer HP',
				number: 'Hanya diperkenankan angka saja!'
			}
		}
	});
});