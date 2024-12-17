<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

                    <div class="mt-8">
                        <ul class="flex justify-around">
                            <a href="{{ route('admin.user.index') }}">
                                <li class="bg-orange-400 text-white w-[200px] pl-5 rounded-[10px] pt-4 pb-4">
                                    <span class="text-[26px] font-bold">{{ $users }}</span> <br>
                                    <span>Customers</span>
                                </li>
                            </a>
                            <a href="{{ route('admin.order.index') }}">
                                <li class="bg-green-400 text-white w-[200px] pl-5 rounded-[10px] pt-4 pb-4">
                                    <span class="text-[26px] font-bold">{{ $totalOrders }}</span> <br>
                                    <span>Orders</span>
                                </li>
                            </a>
                            <a href="{{ route('admin.product') }}">
                                <li class="bg-cyan-600 text-white w-[200px] pl-5 rounded-[10px] pt-4 pb-4">
                                    <span class="text-[26px] font-bold">{{ $products }}</span> <br>
                                    <span>Products</span>
                                </li>
                            </a>
                            <a href="{{ route('admin.productCategory') }}">
                                <li class="bg-gray-400 text-white w-[200px] pl-5 rounded-[10px] pt-4 pb-4">
                                    <span class="text-[26px] font-bold">{{ $categorys }}</span> <br>
                                    <span>Categorys</span>
                                </li>
                            </a>

                        </ul>
                    </div>

                    <div style="width: 80%; margin: 30px auto;">
                        <h3>Doanh thu theo tháng</h3>
                        <canvas id="revenueChart"></canvas>
                    </div>

                    <script>
                        const ctx = document.getElementById('revenueChart').getContext('2d');
                        const revenueChart = new Chart(ctx, {
                            type: 'bar', // Loại biểu đồ: 'line', 'bar', 'pie', v.v.
                            data: {
                                labels: {!! json_encode($chartData['labels']) !!}, // Tháng/Năm
                                datasets: [{
                                    label: 'Doanh thu (VND)',
                                    data: {!! json_encode($chartData['data']) !!}, // Dữ liệu doanh thu
                                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                    borderColor: 'rgba(54, 162, 235, 1)',
                                    borderWidth: 2
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    </script>

                </main>
            </div>
        </div>
    </div>

</body>

</html>
