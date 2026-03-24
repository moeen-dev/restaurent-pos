<!DOCTYPE html>
<html lang="en">

<head>
    @include('backend.partials.head')
    @stack('styles')
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            {{-- Navbar --}}
            @include('backend.partials.nav')
            
            {{-- Sidebar --}}
            @include('backend.partials.sidebar')

            <!-- Main Content -->
            @yield('content')

            {{-- Footer --}}
            @include('backend.partials.footer')
        </div>
    </div>

    <!-- General JS Scripts -->
    @include('backend.partials.script')
    @stack('scripts')
</body>

</html>