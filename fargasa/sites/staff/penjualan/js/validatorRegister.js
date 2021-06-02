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
                        hrgJual :{
				required: true
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
                ,
		messages: {
			stok :{
				required: 'Harap Pilih Barang Terlebih Dahulu!',
                                valueNotEquals: 'Harap Pilih Barang Terlebih Dahulu!'
			},
			tglJual :{
				required: 'Harap Isi Tanggal Jual!',
				date: 'Format harus berupa tanggal'
			},
			hrgJual :{
				required: 'Harga Jual Tidak Boleh Kosong',
			},
			mediator : {
				alphanumeric: 'Hanya diperkenankan Huruf, Angka, dan UnderScore!'
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