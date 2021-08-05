const pesan_benar = $('.pesan-benar').data('pesan');

    if(pesan_benar){
        Swal.fire({
            position: 'top-center',
            icon: 'success',
            text: pesan_benar,
            showConfirmButton: false,
            timer: 1800
          });
    }

const pesan_salah = $('.pesan-salah').data('pesan');

if(pesan_salah){
    Swal.fire({
        position: 'top-center',
        icon: 'error',
        text: pesan_salah,
        showConfirmButton: false,
        timer: 1800
      });
}

$('.btn-delete').on('click', function(e){
    e.preventDefault();
    const href = $(this).attr('href');
    
    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Untuk menghapus pengaduan ini!",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus'
      }).then((result) => {
        if (result.value) {
         document.location.href = href;
        }
      })

});