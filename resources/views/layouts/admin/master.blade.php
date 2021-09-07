<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.admin._head')
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
     @include('layouts.admin._header')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('layouts.admin._sideNav')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
             @include('layouts.admin._alert')
             @yield('content')
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
             @include('layouts.admin._footer')
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
@include('layouts.admin._script')
</body>

</html>



