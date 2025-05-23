@vite(['resources/css/app.css'])
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<body class="flex flex-col over min-h-screen font-text">
  @include("layouts.navbars.navbar")

  <main class="flex-grow bg-[--color-general]">
    @yield("main")
  </main>

  @include("layouts.footer")
</body>
