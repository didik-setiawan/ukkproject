const pesan_berhasil = $('.pesan-berhasil').data('pesan');

if(pesan_berhasil){
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: pesan_berhasil
      });
}

const pesan_gagal = $('.pesan-gagal').data('pesan');

if(pesan_gagal){
    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: pesan_gagal
      });
}

$('.btn-delete').on('click', function(e){
    e.preventDefault();
    const href = $(this).attr('href');
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Untuk menghapus data ini secara permanen",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#009621',
        cancelButtonColor: '#9e0954',
        confirmButtonText: 'Hapus'
      }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
      })
});

$('.det-mas').on('click', function(){
    const id_masyarakat = $(this).data('id');
    
    $.ajax({
        url : '/pengaduanapp/master/get_masyarakat_id/',
        method : 'POST',
        dataType : 'JSON',
        data : {id : id_masyarakat},
        success : function(d){
            $('#nik').html(d.nik);
            $('#nama').html(d.nama);
            $('#username').html(d.username);
            $('#telp').html(d.telp);
        }
    });

});

$('#AdminTable').DataTable();