<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.partials.head')
    @stack('styles')
</head>

<body>
    <!-- Navigation Bar -->
    @include('frontend.partials.nav')

    {{-- Main Content --}}
    @yield('content')

    <!-- CTA Section -->
    @include('frontend.partials.cta')

    <!-- Footer -->
    @include('frontend.partials.footer')

    @include('frontend.partials.scripts')
    @stack('scripts')
</body>

</html>