(function($) {
	
	$(document).ready(function(e) {


		var id_jab = 0;
		var main = "ref/jab.data.php";

	
		$("#data-jab").load(main);


	
		$('.ubah,.tambah').live("click", function(){

			var url = "ref/jab.form.php";
			
			id_jab = this.id;

			if(id_jab != 0) {
				
				$("#myModalLabel").html("Ubah Data Penyaluran");
			} else {
			
				$("#myModalLabel").html("Tambah Data Jabatan");
			}

			$.post(url, {id: id_jab} ,function(data) {
				
				$(".modal-body").html(data).show();
			});
		});

	
		$('.hapus').live("click", function(){
			var url = "ref/jab.input.php";
			
			id_jab = this.id;

			
			var answer = confirm("Apakah anda ingin menghapus data ini?");

			
			if (answer) {
				
				$.post(url, {hapus1: id_jab} ,function() {
				
					$("#data-jab").load(main);
				});
			}
		});

		
		
		
		$("#simpan-jab").bind("click", function(event) {
			var url = "ref/jab.input.php";

		

			var vno = $('input:text[name=no]').val();
			var vtanggal= $('input:text[name=tanggal]').val();
			var vpenerima = $('input:text[name=penerima]').val();
			var valamat = $('input:text[name=alamat]').val();
			var vsifat = $('input:text[name=sifat]').val();
			var valokasi = $('input:text[name=alokasi]').val();
			var vsub_alokasi = $('input:text[name=sub_alokasi]').val();
			var vjumlah = $('input:text[name=jumlah]').val();
			var vperuntukan = $('input:text[name=peruntukan]').val();
			var vstatus = $('input:text[name=status]').val();
			
			
			$.post(url, {no: vno, tanggal: vtanggal, penerima: vpenerima, alamat: valamat, sifat: vsifat, alokasi: valokasi, sub_alokasi: vsub_alokasi, jumlah: vjumlah, peruntukan: vperuntukan, status: vstatus} ,function() {
			
			
				$("#data-jab").load(main);

				
				$('#dialog-jab').modal('hide');

				$("#myModalLabel").html("Tambah Data Jabatan");
			});
		});
	});
}) (jQuery);
