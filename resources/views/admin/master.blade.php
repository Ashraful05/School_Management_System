<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('/') }}admin/images/favicon.ico">

    <title>@yield('title')</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('/') }}admin/css/vendors_css.css">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('/') }}admin/css/style.css">
    <link rel="stylesheet" href="{{ asset('/') }}admin/css/skin_color.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

<div class="wrapper">

    @include('admin.body.header')

    <!-- Left side column. contains the logo and sidebar -->
    @include('admin.body.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('main_content')
    </div>
    <!-- /.content-wrapper -->
    @include('admin.body.footer')

    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->

    <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->


<!-- Vendor JS -->
<script src="{{ asset('/') }}admin/js/vendors.min.js"></script>
<script src="{{ asset('/') }}assets/icons/feather-icons/feather.min.js"></script>
<script src="{{ asset('/') }}assets/vendor_components/easypiechart/dist/jquery.easypiechart.js"></script>
<script src="{{ asset('/') }}assets/vendor_components/apexcharts-bundle/irregular-data-series.js"></script>
<script src="{{ asset('/') }}assets/vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>

<!-- Sunny Admin App -->
<script src="{{ asset('/') }}admin/js/pages/dashboard.js"></script>
<!-- Data tables js -->
<script src="{{ asset('/') }}assets/vendor_components/datatable/datatables.min.js"></script>
<script src="{{ asset('/') }}admin/js/pages/data-table.js"></script>

<script src="{{ asset('/') }}admin/js/template.js"></script>
<script src="{{ asset('/') }}admin/js/custom.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    @if(Session::has('message'))
         var type = "{{ Session::get('alert-type','info') }}"
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    @endif
</script>

<script>
    $(function(){

        $(document).on('click','#delete',function (e) {
            e.preventDefault();
            var link = $(this).attr('href');
            Swal.fire({
                title: "Are you sure?",
                text: "to delete this data!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link;
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                }
            });
        });


        //
        // $(document).on('click','.button',function (e) {
        //     e.preventDefault();
        //     let id = $(this).data('id');
        //     Swal.fire({
        //         title: 'Are you sure?',
        //         text: "You won't be able to revert this!",
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Yes, delete it!'
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             $('#class_select').submit();
        //             Swal.fire(
        //                 {
        //                     title: 'Deleted!',
        //                     text:'Your file has been deleted.',
        //                     icon:'success'
        //                 }
        //             );
        //             // $('#class_select').submit();
        //             // location.reload(true);
        //         }
        //     });
        // });

    });


</script>


</body>
</html>
