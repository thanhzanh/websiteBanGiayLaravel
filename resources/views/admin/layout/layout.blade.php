<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/admin/css/index.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>
        @yield('title')
    </title>
</head>
<body>
    <div id="app">
        <div class="content-wrapper h-screen">
            <!-- sidebar -->
            @include('admin.layout.sidebar')
            <!-- end sidebar -->

            <div class="main-content ml-[345px] top-0">
                <!-- header -->
                @include('admin.layout.header')
                <!-- end header -->

                <main class="h-auto min-h-screen max-w-full bg-[#f1f5f9] mt-[62px] p-6 top-[82px]">

                    <!-- main -->
                    @yield('content')
                    <!-- end main -->

                </main>
            </div>
        </div>
    </div>
    @vite('resources/js/app.js')
    @vite('resources/admin/js/index.js')
</body>
</html>