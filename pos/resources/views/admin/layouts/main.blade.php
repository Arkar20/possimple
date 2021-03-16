@include('admin.layouts.header')

  <div id="wrapper">
    @include('admin.layouts.sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        @include('admin.layouts.navbar')

        <!-- Container Fluid-->
      @yield('content')
        <!---Container Fluid-->
      </div>
    @include('admin.layouts.footer')
    <script>
       $(document).ready(function () {
      $('#brandtable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
      $('#itemtable').DataTable(); // ID From dataTable with Hover

    });
    </script>