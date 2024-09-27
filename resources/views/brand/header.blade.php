@push('head')
    <link href="/favicon.ico" id="favicon" rel="icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- //AREA CSS --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    {{--  AREA DE JS --}}
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/utility.js') }}" defer type="text/javascript"></script>
    <script src="{{ asset('js/brio.js') }}" defer type="text/javascript"></script>
    <script src="{{ asset('js/descriptionpart.js') }}" defer type="text/javascript"></script>
@endpush

<div class="h2 d-flex align-items-center">
    @auth
        <x-orchid-icon path="bs.house" class="d-inline d-xl-none" />
    @endauth

    <p class="my-0 {{ auth()->check() ? 'd-none d-xl-block' : '' }}">
        <!--<{{ config('app.name') }}-->
        Fast Solutions
    </p>
</div>
