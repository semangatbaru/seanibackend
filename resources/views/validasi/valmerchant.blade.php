@extends('layouts.blank')
@section('validasiform')
<script>
    $(function () {
      var Toast = Swal.mixin({
        toast: true,
        showConfirmButton: false,
        timer: 3000
      });
      
      // $.validator.setDefaults({
      //   submitHandler: function () {
      //     Toast.fire({
      //       icon: 'success',
      //       position: 'top',
      //       title: 'Berhasil\n'
      //     })
      //   }
      // });
  
      //mercant
      $('#merchantAdd').validate({
        rules: {
          nama: {
            required: true,
          },
          alamat: {
            required: true,
          },
          no_telp: {
            required: true,
            digits:true
          },
          pemilik: {
            required: true,
            digits:false
          },
        },
        messages: {
          nama: {
            required: "Harus diisi..",
          },
          alamat: {
            required: "Harus diisi..",
          },
          no_telp: {
            required: "Harus diisi..",
            digits:"Hanya angka..."
          },
          pemilik: {
            required: "Harus diisi..",
            digit: "Hanya huruf..."
          },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
  
      //
    });
  </script>
    
@endsection