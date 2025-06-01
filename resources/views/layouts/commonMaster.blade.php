<!DOCTYPE html>

<html lang="{{ session()->get('locale') ?? app()->getLocale() }}" class="{{ $configData['style'] }}-style {{ $navbarFixed ?? '' }} {{ $menuFixed ?? '' }} {{ $menuCollapsed ?? '' }} {{ $footerFixed ?? '' }} {{ $customizerHidden ?? '' }}" dir="{{ $configData['textDirection'] }}" data-theme="{{ (($configData['theme'] === 'theme-semi-dark') ? (($configData['layout'] !== 'horizontal') ? $configData['theme'] : 'theme-default') :  $configData['theme']) }}" data-assets-path="{{ asset('/assets') . '/' }}" data-base-url="{{url('/')}}" data-framework="laravel" data-template="{{ $configData['layout'] . '-menu-' . $configData['theme'] . '-' . $configData['style'] }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>@yield('title') |
    {{ config('variables.templateName') ? config('variables.templateName') : 'TemplateName' }} -
    {{ config('variables.templateSuffix') ? config('variables.templateSuffix') : 'TemplateSuffix' }}</title>
  <meta name="description" content="{{ config('variables.templateDescription') ? config('variables.templateDescription') : '' }}" />
  <meta name="keywords" content="{{ config('variables.templateKeyword') ? config('variables.templateKeyword') : '' }}">
  <!-- laravel CRUD token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Canonical SEO -->
  <link rel="canonical" href="{{ config('variables.productPage') ? config('variables.productPage') : '' }}">
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

  <!-- Vue -->
   <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

   <script src="{{ asset('js/vue.js') }}" defer></script>

 
  <!-- Include Styles -->
  @include('layouts/sections/styles')

  <!-- Include Scripts for customizer, helper, analytics, config -->
  @include('layouts/sections/scriptsIncludes')

  
</head>

<body>
  <!-- Layout Content -->
  @yield('layoutContent')
  <!--/ Layout Content -->
  
  
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdn.tiny.cloud/1/8noeqswa0qrq9xvu53p0tqe2zyfrrnke3p82kdezojs3slh6/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>




<script>
    document.addEventListener("DOMContentLoaded", function() {
            tinymce.init({
        selector: 'textarea.editor',
        width: '100%',
        height: 300,
        menubar: false,
        plugins: 'advlist autolink lists link image charmap preview anchor code fontselect fontsize blocks', // Usa los nuevos nombres de los plugins
        toolbar: 'undo redo | bold italic | fontfamily fontsize forecolor backcolor | alignleft aligncenter alignright | bullist numlist outdent indent | link image | code', // Actualiza la toolbar
        fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
        toolbar_mode: 'sliding',
        content_style: 'body { font-family:Arial; font-size:14px; }'
      });
    });
</script>
<!-- Include Scripts -->
@include('layouts/sections/scripts')

</body>

</html>
