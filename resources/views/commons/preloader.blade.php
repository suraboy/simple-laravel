{{--load frist pase--}}
<div id="loading" class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{ asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
</div>
{{--end load--}}

{{--loading --}}
<div class="ajaxloading-widget-background">
    <div class='ajaxloading-container'>
        <div class='overlay'>
            <img class="animation__wobble" src="{{ asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
        </div>
    </div>
</div>
{{--end loading --}}

<style>
    .ajaxloading-widget-background {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 10001;
        background-color: whitesmoke;
        text-align: center;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=70)";
        filter: alpha(opacity=50);
        -moz-opacity: 0.5;
        -khtml-opacity: 0.5;
        opacity: 0.8;
        display: none;
    }
    .ajaxloading-container {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }
</style>
