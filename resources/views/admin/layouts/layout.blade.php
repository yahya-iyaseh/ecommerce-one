@include('admin\layouts\header')

@include('admin\layouts\sideBar')

<div id="content-wrapper" class="d-flex flex-column">
  <div id="content">
    <!-- TopBar -->
    @include('admin\layouts\navBar')
    <!-- Topbar -->
    <!-- Container Fluid-->

    @yield('content')



    <!---Container Fluid-->
  </div>
  <!-- Footer -->
  @include('admin\layouts\footer')
  <!-- Footer -->
</div>


@include('admin\layouts\endOne')
