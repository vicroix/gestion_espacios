@vite(['resources/css/app.css', 'resources/js/app.js'])
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<body class="flex flex-col over min-h-screen font-text">
  @include("layouts.navbars.navbar")

  <main class="flex-1 mb-10 mt-1">
    @yield("main")
  </main>

  @include("layouts.footer")
</body>
<div id="carga-global">
  <div class="spinner"></div>
</div>
