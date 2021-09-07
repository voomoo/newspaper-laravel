<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.front._head')

</head>

<body>



<div id="wrapper" class="wrap">



    <!-- Header Container  -->
    <header id="header" class=" variantleft type_1">
        <!-- Header Top -->
    @include('layouts.front._headerTop')
        <!-- //Header Top -->

        <!-- Header center -->
    @include('layouts.front._headerCenter')
        <!-- //Header center -->

        <!-- Header Bottom -->

    @include('layouts.front._headerNav')
        <!-- Navbar switcher -->
        <!-- //end Navbar switcher -->

    </header>
    <!-- //Header Container  -->

    <!-- Block Spotlight1  -->
    <section class="so-spotlight1 ">
        <div class="container">
            <div class="row">
                @yield('content')
            </div>

        </div>
    </section>


    <!-- Footer Container -->
    <footer class="footer-container type_footer1">
        <!-- Footer Top Container -->
        @include('layouts.front._footer')
    </footer>
    <!-- //end Footer Container -->

    @include('layouts.front._script')

</body>
</html>
