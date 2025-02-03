<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net" />
  <link rel="stylesheet" href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" />

  <script>
    // On page load or when changing themes, best to add inline in `head` to avoid FOUC
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
      document.documentElement.classList.add('dark');
    } else {
      document.documentElement.classList.remove('dark')
    }
  </script>

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!-- Styles -->
  @livewireStyles
</head>
<body class="bg-gray-200 font-sans antialiased">
  <!-- Main Layout Wrapper -->
  <div class="min-h-screen flex">
    <!-- Drawer Sidebar -->
    @include('layouts.sidebar')

    <!-- Content Area -->
    <div id="contentArea" class="md:ml-64 flex-1 transition-all duration-300 overflow-hidden">
      <!-- Top Navbar -->
      @include('layouts.navbar')

      <!-- Page Heading -->
      @if (isset($header))
        <header class="bg-white shadow">
          <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ $header }}
          </div>
        </header>
      @endif

      <!-- Main Content -->
      <main class="p-4 md:p-6 transition-all duration-300">
        {{ $slot }}
      </main>
    </div>
  </div>

  <script>
    // Sidebar toggle script for collapsible sidebar
    const sidebar = document.getElementById('drawer-sidebar-navigation');
    const contentArea = document.getElementById('contentArea');
    const profileIcon = document.getElementById('profileIcon');
    const appName = document.getElementById('appName');
    const menuIconElements = document.querySelectorAll('.menu-icon');
    const menuLinkElements = document.querySelectorAll('.menu-link');
    let isCollapsed = false;

    const toggleSidebar = () => {
      console.log('Toggle Sidebar');
      if (isCollapsed) {
        sidebar.classList.remove('w-20');
        sidebar.classList.add('w-64');
        contentArea.classList.add('md:ml-64');
        contentArea.classList.remove('md:ml-20');
        profileIcon.classList.add('w-20', 'h-20');
        profileIcon.classList.remove('w-6', 'h-6');
      } else {
        sidebar.classList.remove('w-64');
        sidebar.classList.add('w-20');
        contentArea.classList.remove('md:ml-64');
        contentArea.classList.add('md:ml-20');
        profileIcon.classList.remove('w-20', 'h-20');
        profileIcon.classList.add('w-6', 'h-6');
      }

      menuIconElements.forEach(el => el.classList.toggle('hidden'));
      menuLinkElements.forEach(el => el.classList.toggle('hidden'));

      appName.classList.toggle('hidden');

      isCollapsed = !isCollapsed;
    }

    document.getElementById('sidebarToggle').addEventListener('click', toggleSidebar);

    menuIconElements.forEach((element) => {
      element.addEventListener('click', function () {
        sidebar.classList.remove('w-20');
        sidebar.classList.add('w-64');
        contentArea.classList.add('md:ml-64');
        contentArea.classList.remove('md:ml-20');
        profileIcon.classList.add('w-20', 'h-20');
        profileIcon.classList.remove('w-6', 'h-6');

        menuIconElements.forEach(el => el.classList.add('hidden'));
        menuLinkElements.forEach(el => el.classList.remove('hidden'));

        appName.classList.remove('hidden');

        isCollapsed = !isCollapsed;
      });
    });

    var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
    var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

    // Change the icons inside the button based on previous settings
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
      themeToggleLightIcon.classList.remove('hidden');
    } else {
      themeToggleDarkIcon.classList.remove('hidden');
    }

    var themeToggleBtn = document.getElementById('theme-toggle');

    themeToggleBtn.addEventListener('click', function() {
      // toggle icons inside button
      themeToggleDarkIcon.classList.toggle('hidden');
      themeToggleLightIcon.classList.toggle('hidden');

      // if set via local storage previously
      if (localStorage.getItem('color-theme')) {
        if (localStorage.getItem('color-theme') === 'light') {
          document.documentElement.classList.add('dark');
          localStorage.setItem('color-theme', 'dark');
        } else {
          document.documentElement.classList.remove('dark');
          localStorage.setItem('color-theme', 'light');
        }
      // if NOT set via local storage previously
      } else {
        if (document.documentElement.classList.contains('dark')) {
          document.documentElement.classList.remove('dark');
          localStorage.setItem('color-theme', 'light');
        } else {
          document.documentElement.classList.add('dark');
          localStorage.setItem('color-theme', 'dark');
        }
      }
    });
  </script>

  @stack('modals')

  @livewireScripts
</body>
</html>
