var BASE_URL = window.location.origin + '/' + window.location.pathname.split ('/') [1] + '/';
var TOKEN = $('meta[name=token]').attr('content');
// modal barang
// add barang
$(document).on('click','#btn-barang',function(){
	  var action = $(this).data('action');
	  $('#form_barang')[0].reset();
	  var kodeProduk = $('input[name=kodeProduk]').val();
	  if (action === 'update') {
	  	var id = $(this).data('kode');
	  	$('#kode_barang').val(id);
	  	$('#nama_barang').val($(this).data('nama'));
	  	$('#harga_beli_barang').val($(this).data('beli'));
	  	$('#harga_jual_barang').val($(this).data('jual'));
	  	$('#stok_barang').val($(this).data('stok'));
	  	$('#unit_id').val($(this).data('unit'));
	  	$('#kategori_id').val($(this).data('kategori'));

    	$('.modal-title').text('Edit produk');
    	$('.modal-footer').find('#simpan_produk').replaceWith('<button type="button" class="btn btn-success" data-id="'+id+'" id="simpan_produk"><i class="fa fa-check"></i> Save</button>');
	  }else{
	  	$('.modal-title').text('Tambah produk');
	  	$('.modal-footer').find('#simpan_produk').replaceWith('<button type="button" class="btn btn-success" id="simpan_produk"><i class="fa fa-check"></i> Save</button>');
    	$('input[name=kode_barang]').val(kodeProduk);
	  }
    $('#modal_barang').modal('show');

    $('.invalid-feedback').remove();
	  $('.form-control').removeClass('is-invalid')
	  $('.form-control').removeClass('is-valid')

    // 
});

$('.modal-footer').on('click','#simpan_produk',function(){
    var id = $(this).data('id');
    var url;
    var msg='';
    if (id) {
      url = BASE_URL+'master/barang/update/'+id
      msg = 'Produk Telah Berhasil Diupdate'
    }else{
      url = BASE_URL+'master/barang/create'
      msg = 'Produk Telah Berhasil Ditambahkan'
    }
    $.ajax({
      url:url,
      type:'post',
      data:$('#form_barang').serialize(),
      dataType:'json',
      success:function(res){
      	$('input[name=PointOfSale]').val(res.token);
        if (res.success == true) {
          // $("#tabel_tingkatan").DataTable().ajax.reload();
          iziToast.success({
				    title: 'Success',
				    message: msg,
				    position: 'topRight'
				  });

          $("#table_barang").DataTable().ajax.reload();
          $('#modal_barang').modal('hide');
				  $('#form_barang')[0].reset();
          $('input[name=kode_barang]').val(res.kode_barang);
          $('input[name=kodeProduk]').val(res.kode_barang);
				  $('.invalid-feedback').remove();
				  $('.form-control').removeClass('is-invalid')
				  $('.form-control').removeClass('is-valid')

        }else{
          $('.invalid-feedback').remove();
          $.each(res.message,function(key, value){
              var element = $('#' + key);
              element.closest('div.col-sm-9>.form-control')
              .removeClass('is-invalid')
              .addClass(value.length > 0 ? 'is-invalid' : 'is-valid')
              .find('.invalid-feedback')
              .remove();
              element.after(value);
					});
          iziToast.warning({
				    title: 'Warning',
				    message: 'Pastikan tidak ada data yang kosong',
				    position: 'topRight'
				  });
        }
      },
      error:function(err){
      	iziToast.error({
			    title: 'Error',
			    message: 'Produk gagal di simpan',
			    position: 'topRight'
			  });
      }
    })
});

// ======================================================================================================
//                                           HANDLE KATEGORI
// ======================================================================================================

$(document).on('click','#btn-kategori',function(){
	  var action = $(this).data('action');
	  $('#form_kategori')[0].reset();
	  if (action === 'update') {
	  	var id = $(this).data('id');
	  	$('#nama_kategori').val($(this).data('nama'));

    	$('.modal-title').text('Edit kategori');
    	$('.modal-footer').find('#simpan_kategori').replaceWith('<button type="button" class="btn btn-success" data-id="'+id+'" id="simpan_kategori"><i class="fa fa-check"></i> Save</button>');
	  }else{
	  	$('.modal-title').text('Tambah kategori');
	  	$('.modal-footer').find('#simpan_kategori').replaceWith('<button type="button" class="btn btn-success" id="simpan_kategori"><i class="fa fa-check"></i> Save</button>');
	  }
    $('#modal_kategori').modal('show');

    $('.invalid-feedback').remove();
	  $('.form-control').removeClass('is-invalid')
	  $('.form-control').removeClass('is-valid')

    // 
});

$('.modal-footer').on('click','#simpan_kategori',function(){
    var id = $(this).data('id');
    var url;
    var msg='';
    if (id) {
      url = BASE_URL+'master/kategori/update/'+id
      msg = 'Data Kategori Telah Berhasil Diupdate'
    }else{
      url = BASE_URL+'master/kategori/create'
      msg = 'Data Kategori Telah Berhasil Ditambahkan'
    }
    $.ajax({
      url:url,
      type:'post',
      data:$('#form_kategori').serialize(),
      dataType:'json',
      success:function(res){
      	$('input[name=PointOfSale]').val(res.token);
        if (res.success == true) {
          // $("#tabel_tingkatan").DataTable().ajax.reload();
          iziToast.success({
				    title: 'Success',
				    message: msg,
				    position: 'topRight'
				  });

          $("#table_kategori").DataTable().ajax.reload();
          $('#modal_kategori').modal('hide');
				  $('#form_kategori')[0].reset();
          
				  $('.invalid-feedback').remove();
				  $('.form-control').removeClass('is-invalid')
				  $('.form-control').removeClass('is-valid')

        }else{
          $('.invalid-feedback').remove();
          $.each(res.message,function(key, value){
              var element = $('#' + key);
              element.closest('div.col-sm-9>.form-control')
              .removeClass('is-invalid')
              .addClass(value.length > 0 ? 'is-invalid' : 'is-valid')
              .find('.invalid-feedback')
              .remove();
              element.after(value);
					});
          iziToast.warning({
				    title: 'Warning',
				    message: 'Pastikan tidak ada data yang kosong',
				    position: 'topRight'
				  });
        }
      },
      error:function(err){
      	iziToast.error({
			    title: 'Error',
			    message: 'Produk gagal di simpan',
			    position: 'topRight'
			  });
      }
    })
});

// ======================================================================================================
//                                           HANDLE KATEGORI END
// ======================================================================================================

// ======================================================================================================
//                                           HANDLE SATUAN PRODUK
// ======================================================================================================

$(document).on('click','#btn-satuan',function(){
	  var action = $(this).data('action');
	  $('#form_satuan')[0].reset();
	  if (action === 'update') {
	  	var id = $(this).data('id');
	  	$('#nama_unit').val($(this).data('nama'));
	  	$('#isi').val($(this).data('isi'));

    	$('.modal-title').text('Edit satuan barang');
    	$('.modal-footer').find('#simpan_satuan').replaceWith('<button type="button" class="btn btn-success" data-id="'+id+'" id="simpan_satuan"><i class="fa fa-check"></i> Save</button>');
	  }else{
	  	$('.modal-title').text('Tambah satuan barang');
	  	$('.modal-footer').find('#simpan_satuan').replaceWith('<button type="button" class="btn btn-success" id="simpan_satuan"><i class="fa fa-check"></i> Save</button>');
	  }
    $('#modal_satuan').modal('show');

    $('.invalid-feedback').remove();
	  $('.form-control').removeClass('is-invalid')
	  $('.form-control').removeClass('is-valid')

    // 
});

$('.modal-footer').on('click','#simpan_satuan',function(){
    var id = $(this).data('id');
    var url;
    var msg='';
    if (id) {
      url = BASE_URL+'master/satuan/update/'+id
      msg = 'Data satuan barang Telah Berhasil Diupdate'
    }else{
      url = BASE_URL+'master/satuan/create'
      msg = 'Data satuan barang Telah Berhasil Ditambahkan'
    }
    $.ajax({
      url:url,
      type:'post',
      data:$('#form_satuan').serialize(),
      dataType:'json',
      success:function(res){
      	$('input[name=PointOfSale]').val(res.token);
        if (res.success == true) {
          // $("#tabel_tingkatan").DataTable().ajax.reload();
          iziToast.success({
				    title: 'Success',
				    message: msg,
				    position: 'topRight'
				  });

          $("#table_satuan").DataTable().ajax.reload();
          $('#modal_satuan').modal('hide');
				  $('#form_satuan')[0].reset();
          
				  $('.invalid-feedback').remove();
				  $('.form-control').removeClass('is-invalid')
				  $('.form-control').removeClass('is-valid')

        }else{
          $('.invalid-feedback').remove();
          $.each(res.message,function(key, value){
              var element = $('#' + key);
              element.closest('div.col-sm-9>.form-control')
              .removeClass('is-invalid')
              .addClass(value.length > 0 ? 'is-invalid' : 'is-valid')
              .find('.invalid-feedback')
              .remove();
              element.after(value);
					});
          iziToast.warning({
				    title: 'Warning',
				    message: 'Pastikan tidak ada data yang kosong',
				    position: 'topRight'
				  });
        }
      },
      error:function(err){
      	iziToast.error({
			    title: 'Error',
			    message: 'Produk gagal di simpan',
			    position: 'topRight'
			  });
      }
    })
});

// ======================================================================================================
//                                         HANDLE SATUAN PRODUK END
// ======================================================================================================

// ======================================================================================================
//                                          HANDLE OPSI PEMBAYARAN
// ======================================================================================================

$(document).on('click','#btn-pembayaran',function(){
	  var action = $(this).data('action');
	  $('#form_pembayaran')[0].reset();
	  if (action === 'update') {
	  	var id = $(this).data('id');
	  	$('#jenis_pembayaran').val($(this).data('jenis'));

    	$('.modal-title').text('Edit pembayaran');
    	$('.modal-footer').find('#simpan_pembayaran').replaceWith('<button type="button" class="btn btn-success" data-id="'+id+'" id="simpan_pembayaran"><i class="fa fa-check"></i> Save</button>');
	  }else{
	  	$('.modal-title').text('Tambah pembayaran');
	  	$('.modal-footer').find('#simpan_pembayaran').replaceWith('<button type="button" class="btn btn-success" id="simpan_pembayaran"><i class="fa fa-check"></i> Save</button>');
	  }
    $('#modal_pembayaran').modal('show');

    $('.invalid-feedback').remove();
	  $('.form-control').removeClass('is-invalid')
	  $('.form-control').removeClass('is-valid')

    // 
});

$('.modal-footer').on('click','#simpan_pembayaran',function(){
    var id = $(this).data('id');
    var url;
    var msg='';
    if (id) {
      url = BASE_URL+'master/pembayaran/update/'+id
      msg = 'Data pembayaran Telah Berhasil Diupdate'
    }else{
      url = BASE_URL+'master/pembayaran/create'
      msg = 'Data pembayaran Telah Berhasil Ditambahkan'
    }
    $.ajax({
      url:url,
      type:'post',
      data:$('#form_pembayaran').serialize(),
      dataType:'json',
      success:function(res){
      	$('input[name=PointOfSale]').val(res.token);
        if (res.success == true) {
          // $("#tabel_tingkatan").DataTable().ajax.reload();
          iziToast.success({
				    title: 'Success',
				    message: msg,
				    position: 'topRight'
				  });

          $("#table_pembayaran").DataTable().ajax.reload();
          $('#modal_pembayaran').modal('hide');
				  $('#form_pembayaran')[0].reset();
          
				  $('.invalid-feedback').remove();
				  $('.form-control').removeClass('is-invalid')
				  $('.form-control').removeClass('is-valid')

        }else{
          $('.invalid-feedback').remove();
          $.each(res.message,function(key, value){
              var element = $('#' + key);
              element.closest('div.col-sm-9>.form-control')
              .removeClass('is-invalid')
              .addClass(value.length > 0 ? 'is-invalid' : 'is-valid')
              .find('.invalid-feedback')
              .remove();
              element.after(value);
					});
          iziToast.warning({
				    title: 'Warning',
				    message: 'Pastikan tidak ada data yang kosong',
				    position: 'topRight'
				  });
        }
      },
      error:function(err){
      	iziToast.error({
			    title: 'Error',
			    message: 'Produk gagal di simpan',
			    position: 'topRight'
			  });
      }
    })
});

// ======================================================================================================
//                                        HANDLE OPSI PEMBAYARAN END
// ======================================================================================================

// ======================================================================================================
//                                          HANDLE OPSI COSTUMMER
// ======================================================================================================

$(document).on('click','#btn-costummer',function(){
	  var action = $(this).data('action');
	  $('#form_costummer')[0].reset();
	  if (action === 'update') {
	  	var id = $(this).data('id');
	  	$('#nama_pelanggan').val($(this).data('nama'));
	  	$('#email').val($(this).data('email'));
	  	$('#no_telepon').val($(this).data('telepon'));
	  	$('#alamat').val($(this).data('alamat'));

    	$('.modal-title').text('Edit costummer');
    	$('.modal-footer').find('#simpan_costummer').replaceWith('<button type="button" class="btn btn-success" data-id="'+id+'" id="simpan_costummer"><i class="fa fa-check"></i> Save</button>');
	  }else{
	  	$('.modal-title').text('Tambah costummer');
	  	$('.modal-footer').find('#simpan_costummer').replaceWith('<button type="button" class="btn btn-success" id="simpan_costummer"><i class="fa fa-check"></i> Save</button>');
	  }
    $('#modal_costummer').modal('show');

    $('.invalid-feedback').remove();
	  $('.form-control').removeClass('is-invalid')
	  $('.form-control').removeClass('is-valid')

    // 
});

$('.modal-footer').on('click','#simpan_costummer',function(){
    var id = $(this).data('id');
    var url;
    var msg='';
    if (id) {
      url = BASE_URL+'master/costummer/update/'+id
      msg = 'Data costummer Telah Berhasil Diupdate'
    }else{
      url = BASE_URL+'master/costummer/create'
      msg = 'Data costummer Telah Berhasil Ditambahkan'
    }
    $.ajax({
      url:url,
      type:'post',
      data:$('#form_costummer').serialize(),
      dataType:'json',
      success:function(res){
      	$('input[name=PointOfSale]').val(res.token);
        if (res.success == true) {
          // $("#tabel_tingkatan").DataTable().ajax.reload();
          iziToast.success({
				    title: 'Success',
				    message: msg,
				    position: 'topRight'
				  });

          $("#table_costummer").DataTable().ajax.reload();
          $('#modal_costummer').modal('hide');
				  $('#form_costummer')[0].reset();
          
				  $('.invalid-feedback').remove();
				  $('.form-control').removeClass('is-invalid')
				  $('.form-control').removeClass('is-valid')

        }else{
          $('.invalid-feedback').remove();
          $.each(res.message,function(key, value){
              var element = $('#' + key);
              element.closest('div.col-sm-9>.form-control')
              .removeClass('is-invalid')
              .addClass(value.length > 0 ? 'is-invalid' : 'is-valid')
              .find('.invalid-feedback')
              .remove();
              element.after(value);
					});
          iziToast.warning({
				    title: 'Warning',
				    message: 'Pastikan tidak ada data yang kosong',
				    position: 'topRight'
				  });
        }
      },
      error:function(err){
      	iziToast.error({
			    title: 'Error',
			    message: 'Produk gagal di simpan',
			    position: 'topRight'
			  });
      }
    })
});

// ======================================================================================================
//                                        HANDLE OPSI COSTUMMER END
// ======================================================================================================

// ======================================================================================================
//                                           HANDLE DELETE RECORD
// ======================================================================================================
$(document).on('click','.btn_hapus',function(){
	var id = $(this).data('id');
	var target = $(this).data('target');
	var token = $('input[name=PointOfSale]').val();
	var table='';
	if (target==='barang') {
		table = 'barang'
	}
	if (target==='kategori') {
		table = 'kategori'
	}
	if (target==='satuan') {
		table = 'satuan'
	}
	if (target==='pembayaran') {
		table = 'pembayaran'
	}
		if (target==='costummer') {
		table = 'costummer'
	}
  swal({
      title: 'Yakin ingin hapus data ini.?',
      text: 'Data yang telah di hapus tidak dapat di kembalikan lagi',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
	    	$.ajax({
		      url:BASE_URL+'master/'+table+'/delete/'+id,
		      type:'post',
		      data : {'PointOfSale':token},
		      dataType:'json',
		      success:function(res){
		      	$('input[name=PointOfSale]').val(res.token);
	            reloadTable(table);
	          	swal('Berhasil! Data Berhasil Di hapus!', {
			        icon: 'success',
			      });
		      },
		      error:function(){
		        swal('Error', 'Data gagal di hapus', 'error');
		      }
		    })
      } else {
      	swal('Hapus Data di batalkan');
      }
    });
});

function reloadTable(table) {
	$("#table_"+table).DataTable().ajax.reload();
}
// ======================================================================================================
//                                        HANDLE DELETE RECORD END
// ======================================================================================================
