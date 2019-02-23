@extends('layouts.app')
@section('content')
    <main class="container">
        <div class="col-12">
            <input type="text" name="mylat" id="mylat" hidden>
            <input type="text" name="mylng" id="mylng" hidden>

            <div class="row">
                @include('layouts.search')
                @yield('search')
            </div>

            {{--@yield('orderfilter')--}}
            @include('layouts.card-list-room')
            <div class="col-md-12 col-12 p-0 ">

                <div class="text-center mt-4">
                    <h4 class="color-dark-blue-fond">ห้องเช่าแนะนำ</h4>
                </div>
                <div class="row m-0">
                    @yield('room')
                </div>

                <div class="text-center mt-4">
                    <h4 class="color-dark-blue-fond">ห้องใหม่น่าสนใจ</h4>
                </div>
                <div class="row m-0">
                    {{--todo:: รอแก้ sql--}}
                    @yield('room')
                </div>

                @if(count($mapdataNearby)!= 0 || $mapdataNearby != null)
                    <div class="text-center mt-4">
                        <h4 class="color-dark-blue-fond">ห้องเช่าใกล้ฉัน</h4>
                    </div>
                    <div class="row m-0">
                        @include('layouts.card-room-nearby')
                        {{--todo:: รอแก้ sql--}}
                        @yield('nearroom')
                    </div>
                @endif


                @if(session()->get('data'))
                    {{session()->get('data')}}
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title"></h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <p>กรุณาค้นหาใหม่อีกครั้ง</p>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>
                @endif


            </div>

        </div>

    </main>
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9CSkZmCPxPPyZahRKqk0yfSfav1rZHxg&libraries=places"></script>

    <script>
        $(document).ready(function () {
            $("#myModal").modal()
        });
    </script>
    <footer>
        @include('layouts.footer')
        @yield('footer')
    </footer>
@endsection