{{--@section('cardzone')--}}

<style>
    /*div {*/
    /*    width: 100px;*/
    /*    height: 100px;*/
    /*    background-color: red;*/
    /*    -webkit-animation-name: train_move; !* Safari 4.0 - 8.0 *!*/
    /*    -webkit-animation-duration: 4s; !* Safari 4.0 - 8.0 *!*/
    /*    animation-name: train_move;*/
    /*    animation-duration: 4s;*/
    /*    animation-iteration-count: infinite;*/
    /*}*/
    .dd {
        width: 100px;
        height: 100px;
        background-color: red;
        position: relative;
        animation-name :example;
        animation-duration: 4s;
        animation-iteration-count: 3
    }

    /* Safari 4.0 - 8.0 */
    @-webkit-keyframes train_move {
        from {
            background-color: red;
            right: 0%;
        }
        to {
            background-color: yellow;
            right: 100%;
        }

    }

    /* Standard syntax */
    @keyframes train_move {
        from {
            background-color: red;
            right: 0%;
        }
        to {
            background-color: yellow;
            right: 100%;
        }
    }
</style>

<div class="dd"></div>
<p>sdaeqw</p>
{{--@endsection--}}
