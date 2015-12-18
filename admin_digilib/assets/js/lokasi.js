(function($) {

	$(document).ready(function(e) {

		
		var kode_alokasi = 0;
		var main = "alokasi/abs.data.php";

		
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

			var url = "alokasi/abs.form.php";
			
			kode_alokasi = this.id;

			if(kode_alokasi != 0) {
				
				$("#myModalLabel3").html("Ubah Data Alokasi");
			} else {
		
			}

			$.post(url, {id: kode_alokasi} ,function(data) {
			
				$(".modal-body").html(data).show();
			});
		});

		
		$('.hapus').live("click", function(){
			var url = "alokasi/abs.input.php";
		
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
			var url = "alokasi/abs.input.php";

			
			var vkode_alokasi = $('input:text[name=kode_alokasi]').val();
			var vnama_alokasi= $('input:text[name=nama_alokasi]').val();
			var vkode_sub_alokasi = $('input:text[name=kode_sub_alokasi]').val();
			var vnama_sub_alokasi = $('input:text[name=nama_sub_alokasi]').val();


			
			$.post(url, {kode_alokasi: vkode_alokasi, nama_alokasi: vnama_alokasi, kode_sub_alokasi: vkode_sub_alokasi, nama_sub_alokasi: vnama_sub_alokasi} ,function() {
			
				
				$("#data-abs").load(main);

			
				$('#dialog-abs').modal('hide');

				
				$("#myModalLabel3").html("Tambah Data Alokasi");
			});
		});
	});
}) (jQuery);
