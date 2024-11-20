<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/admin/css/index.css')
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
                <div class="cards flex justify-around mt-[2rem]">
                        <div class="card-single flex justify-around bg-[#fff] w-[200px] h-[100px] items-center rounded-[10px]">
                            <div>
                                <h1 class="font-bold text-[30px]">54</h1>
                                <span class="text-gray-500">Customers</span>
                            </div>
                            <div>
                                <span class="font-bold text-[30px] text-red-500"><i class="fa-solid fa-people-group"></i></span>
                            </div>
                        </div>
                        <div class="card-single flex justify-around bg-[#fff] w-[200px] h-[100px] items-center rounded-[10px]">
                            <div>
                                <h1 class="font-bold text-[30px]">54</h1>
                                <span class="text-gray-500">Orders</span>
                            </div>
                            <div>
                                <span class="font-bold text-[30px] text-red-500"><i class="fa-brands fa-shopify"></i></span>
                            </div>
                        </div>
                        <div class="card-single flex justify-around bg-[#fff] w-[200px] h-[100px] items-center rounded-[10px]">
                            <div>
                                <h1 class="font-bold text-[30px]">54</h1>
                                <span class="text-gray-500">Customers</span>
                            </div>
                            <div>
                                <span class="font-bold text-[30px] text-red-500"><i class="fa-solid fa-people-group"></i></span>
                            </div>
                        </div>
                        <div class="card-single flex justify-around bg-[#fff] w-[200px] h-[100px] items-center rounded-[10px]">
                            <div>
                                <h1 class="font-bold text-[30px]">54</h1>
                                <span class="text-gray-500">Customers</span>
                            </div>
                            <div>
                                <span class="font-bold text-[30px] text-red-500"><i class="fa-solid fa-people-group"></i></span>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</body>
@vite('resources/admin/js/index.js')

</html>
