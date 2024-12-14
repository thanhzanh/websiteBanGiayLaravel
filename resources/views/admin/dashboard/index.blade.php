<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Dashboard</title>

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

                <!-- main -->
                <main class="h-screen max-w-full bg-[#f1f5f9] mt-[82px] p-6 top-[82px]">
                    
                    

                </main>
            </div>
        </div>
    </div>

</body>

</html>
