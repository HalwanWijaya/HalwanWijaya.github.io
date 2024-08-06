// FILE INI YANG JADI PENGHUBUNG ANTARA TAMPILAN DAN PROSES

var id_pesanan;
// MEMANGGIL KOMPONEN DAFTAR RIWAYAT PESANAN UNTUK PERTAMA KALI
$.ajax({
	type: "GET",
	url: "komponen/daftar-riwayat-pemesanan.php",
	dataType: "text",
	success: function (response) {
		$("main .container").html(response);
	},
});

// AKSI MEENAMPILKAN CONFIRMASI DELETE
function showConfirmDelete(id) {
	$(".delete-confirm").addClass("show");
	$.ajax({
		type: "POST",
		url: "proses.php",
		data: { id: id },
		dataType: "json",
		success: function (response) {
			id_pesanan = response["id"];
			$("#nama-aktif").html(response["nama"]);
		},
	});
}

// AKSI SAAT DELETE
$("#delete").click(function (e) {
	e.preventDefault();
	// MENGHAPUS PESANAN DARI DATABASE
	$.ajax({
		type: "POST",
		url: "proses.php",
		data: { id: id_pesanan, delete: true },
		dataType: "json",
		success: function (response) {},
	});
	// MEREFRESH DAFTAR SETELAH MENUNGGU SATU DETIK UNTUK MEMASTIKAN PESANAN SUDAH DIHAPUS
	setTimeout(() => {
		$.ajax({
			type: "GET",
			url: "komponen/daftar-riwayat-pemesanan.php",
			dataType: "text",
			success: function (response) {
				$("main .container").html(response);
			},
		});
	}, 1000);
	$(".delete-confirm").removeClass("show");
});

// AKSI SAAT TOMBOL CANCEL DELETE
$(".delete-confirm").click(function (e) {
	e.preventDefault();
	if (
		e.target == $(".delete-confirm")[0] ||
		e.target == $(".batal-delete")[0]
	) {
		$(".delete-confirm").removeClass("show");
	}
});






// AKSI MENAMPILKAN FORM EDIT
function showFormEdit(id) {
	$('#form-edit').addClass('show');
	$.ajax({
		type: "POST",
		url: "proses.php",
		data: {id : id},
		dataType: "json",
		success: function (data) {
			$('#id').attr('value', data['id']);
			$('#nama').attr('value', data['nama']);
			$('#nomer').attr('value', data['nomer_hp']);
			$('#tanggal').attr('value', data['tanggal']);
			$('#jumlah-peserta').attr('value', data['jumlah_pesanan']);

			if (data['penginapan']) { 
				$('#penginapan').val(data['penginapan']);
				$('#penginapan').attr('checked', true);
			}
			else { 
				$('#penginapan').val(''); 
				$('#penginapan').attr('checked', false);
			}
			
			if (data['transportasi']) { 
				$('#transportasi').val(data['transportasi']);
				$('#transportasi').attr('checked', true);
			}
			else { 
				$('#transportasi').val(''); 
				$('#transportasi').attr('checked', false);
			}
			
			if (data['konsumsi']) { 
				$('#konsumsi').val(data['konsumsi']); 
				$('#konsumsi').attr('checked', true);
			}
			else { 
				$('#konsumsi').val(''); 
				$('#konsumsi').attr('checked', false);
			}
		}
	});
}

// AKSI UNTUK KELUAR DARI FORM EDIT
$('#form-edit').click(function (e) {
	if ( e.target == $('#form-edit')[0] || e.target == $('.batal-edit')[0] ) {
		$('#form-edit').removeClass('show');
		$('#form-edit')[0].reset();
	}

});




// MENANGANI CHECKBOX
$('#penginapan').change(function (e) {
	if (this.checked) { $('#penginapan').val('on'); }
	else { $('#penginapan').val(''); }
});
$('#transportasi').change(function (e) {
	if (this.checked) { $('#transportasi').val('on'); }
	else { $('#transportasi').val(''); }
});
$('#konsumsi').change(function (e) {
	if (this.checked) { $('#konsumsi').val('on'); }
	else { $('#konsumsi').val(''); }
});

// AKSI EDIT
$('#form-edit .edit').click(function (e) { 
	e.preventDefault();
	id = $('#id').val();
	nama = $('#nama').val();
	nomer = $('#nomer').val();
	tanggal = $('#tanggal').val();
	jumlah_peserta = $('#jumlah-peserta').val();

	penginapan = $('#penginapan').val();
	transportasi = $('#transportasi').val();
	konsumsi = $('#konsumsi').val();

	console.log(nama, nomer, tanggal, jumlah_peserta);
	console.log(penginapan, transportasi, konsumsi);
	// REQUEST EDIT
	$.ajax({
		type: "POST",
		url: "proses.php",
		data: {
			id: id,
			nama: nama,
			nomer: nomer,
			tanggal: tanggal,
			jumlah_peserta: jumlah_peserta,
			penginapan: penginapan,
			transportasi: transportasi,
			konsumsi: konsumsi,
			edit: true
		},
		dataType: "json",
		success: function (response) {
			console.log(response)
		}
	});
	// REFRESH
	setTimeout(() => {
		$.ajax({
			type: "GET",
			url: "komponen/daftar-riwayat-pemesanan.php",
			dataType: "text",
			success: function (response) {
				$("main .container").html(response);
			},
		});
	}, 1000);

	$('.batal-edit').click();
});
