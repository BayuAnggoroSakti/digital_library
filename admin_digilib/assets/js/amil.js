(function($) {

	$(document).ready(function(e) {

		
		var kode_amil = 0;
		var main = "amil/abs.data.php";

		
		$("#data-abs").load(main);

		
		
		$('input:text[name=pencarian]').on('input',function(e){
			var v_cari = $('input:text[name=pencarian]').val();
			
			if(v_cari!="") {
				$.post(main, {cari: v_cari} ,function(data) {
				
					$("#data-abs").html(data).show();
				});
			} else {
				
				$("#data-abs").load(main);
			}
		});

		
		$('.ubah3,.tambah3').live("click", function(){

			var url = "amil/abs.form.php";
			
			kode_amil = this.id;

			if(kode_amil != 0) {
				
				$("#myModalLabel3").html("Ubah Data Amil");
			} else {
		
			}

			$.post(url, {id: kode_amil} ,function(data) {
			
				$(".modal-body").html(data).show();
			});
		});

		
		$('.hapus').live("click", function(){
			var url = "amil/abs.input.php";
		
			id_abs = this.id;

			
			var answer = confirm("Apakah anda ingin menghapus data ini?");

			
			if (answer) {
			
				$.post(url, {hapus: id_abs} ,function() {
					
					$("#data-abs").load(main);
				});
			}
		});

	
		$('.halaman').live("click", function(event){
		
			kd_hal = this.id;

			$.post(main, {halaman: kd_hal} ,function(data) {
			
				$("#data-abs").html(data).show();
			});
		});
		
		
		$("#simpan-abs").bind("click", function(event) {
			var url = "amil/abs.input.php";

			
			var vkode_amil = $('input:text[name=kode_amil]').val();
			var vnama_amil= $('input:text[name=nama_amil]').val();
			
			
			$.post(url, {kode_amil: vkode_amil, nama_amil: vnama_amil} ,function() {
			
				
				$("#data-abs").load(main);

			
				$('#dialog-abs').modal('hide');

				
				$("#myModalLabel3").html("Tambah Data Amil");
			});
		});
	});
}) (jQuery);
