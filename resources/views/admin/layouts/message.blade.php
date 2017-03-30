@if(Session::has('message'))
    <script>
        swal({
            title: "{{ Session::get('message') }}" ,
            text: "هذه الرسالة سوف تختفى بعد ثانية",
            timer: 2000,
            showConfirmButton: false
        });
    </script>

@endif