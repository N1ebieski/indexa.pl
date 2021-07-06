<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $makeMeta(array_merge([trans('icore::filemanager.route.index')], [trans('icore::admin.route.index'), config('app.name')]), ' - ') }}</title>

    <!-- Styles -->
    <link rel="icon" href="{{ asset('svg/vendor/' . config('icore.layout') . '/logo.svg') }}" type="image/svg+xml">
    <link href="{{ mix('css/vendor/' . config('icore.layout') . '/vendor/vendor.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor/file-manager/file-manager.css') }}" rel="stylesheet">    
    <link href="{{ mix($getStylesheet('css/vendor/' . config('icore.layout'))) }}" rel="stylesheet">
    <link href="{{ asset($getStylesheet('css/custom')) }}" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12" id="fm-main-block">
            <div id="fm"></div>
        </div>
    </div>
</div>

<!-- File manager -->
<script src="{{ asset('js/vendor/file-manager/file-manager.js') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // set fm height
    document.getElementById('fm-main-block').setAttribute('style', 'height:' + window.innerHeight + 'px');

    // Add callback to file manager
    fm.$store.commit('fm/setFileCallBack', function(fileUrl) {
        window.opener.fmSetLink(fileUrl);
        window.close();
    });
});
</script>
</body>
</html>
