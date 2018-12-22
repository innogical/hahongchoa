@extends('layouts.app')
@section('content')
    <main class="container">
        @include('layouts.search')
        @yield('search')
        @yield('orderfilter')
        @include('layouts.card-list-room')
        <div class="col">
            <div class="row">
                @for($d = 0; $d<8; $d++  )
                    @yield('room')
                @endfor
            </div>
        </div>
    </main>
    <footer>
        @include('layouts.footer')
        @yield('footer')
    </footer>
@endsection