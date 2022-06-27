
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="modal-body" >
  <form  id="form_opd" name="form_opd">
     @csrf
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Nama OPD</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="nama" placeholder="Nama OPD" name="nama">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Alamat</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">No HP</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="no_hp" placeholder="No HP" name="no_hp">
      </div>
    </div>
  </form>
</div>
<div class="modal-footer">
  <input type="button" name="submit" id="submit" class="submit btn btn-primary" value="Simpan" />
</div>

<script>
$(document).ready(function() {
  $('#submit').off('click').on('click',function(e){
     e.preventDefault();
     var formData = new FormData($('#form_opd')[0]);
     // swal({  icon: "error",});
     Swal.fire({
       title: 'Are you sure?',
       icon: 'question',
       text: 'Are you sure to update?',
       showCancelButton: true,
       confirmButtonText: `Submit`,
     }).then((result) => {
       /* Read more about isConfirmed, isDenied below */
         if (result.isConfirmed) {
           $.ajax({
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
               type: "POST",
               url  : "{{url('/admin/simpan_opd')}}",
               data: formData,
               contentType: false,
               processData: false,
               dataType: "JSON",
               success: function (data) {
                 // console.log(data);
                   if (data.status == 'sukses') {
                     Swal.fire({
                         title: "Berhasil!",
                         text: "Data berhasil disimpan",
                         icon:"success"
                     }).then(function() {
                       $('#mymodal').modal('hide');
                     });
                   } else {
                     Swal.fire(
                       'Gagal Simpan',
                       'Kuisioner gagal disimpan',
                       'error'
                     )
                   }
               },
           });
         }
     });
     return false;
  });
})
</script>
