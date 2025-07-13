<x-app-layout>
    <div class="flex min-h-screen">
        <div class="w-64 shadow-md p-6 text-white" style="background-color: #1d180f;">
            <div class="flex items-center space-x-4 mb-6 ">
                <div>
                    <p class="text-sm " style="color:rgb(249, 180, 4);">Hello,</p>
                    <h2 class="text-lg font-bold">{{auth()->user()->name}}</h2>
                </div>
            </div>
            <nav class="space-y-2">
                <p class="block  py-2 rounded text-white hover:bg-[#2a241a]">Email</p>
                <p class="text-sm px-4  " style="color:rgb(249, 180, 4);">{{auth()->user()->email}}</p>
                <p class="block  py-2 rounded text-white hover:bg-[#2a241a]">Country</p>
                <p class="text-sm px-4  " style="color:rgb(249, 180, 4);">{{auth()->user()->country->name}}</p>
                <p class="block  py-2 rounded text-white hover:bg-[#2a241a]">Type</p>
                <p class="text-sm px-4  " style="color:rgb(249, 180, 4);">{{auth()->user()->type}}</p>
            </nav>
        </div>
        <div class="flex-1 p-8">
            @foreach ($orders as $order)
            <div class=" p-6 shadow rounded-lg border mb-6 pl-6 max-w-2xl mx-auto shadow-md" style="background-color:rgb(101, 80, 42); margin-top: 30px;">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-4">
                        <div>
                            <p class="block font-semibold py-2 rounded  hover:bg-[#2a241a] text-p-light">Product Name :</p>
                            <p class="font-bold px-6 text-xl text-p-light/80">{{$order->product->name}}</p>
                            <p class="block font-semibold py-2 rounded  hover:bg-[#2a241a] text-p-light">Amount :</p>
                            <p class="text-sm font-bold px-6 text-xl text-p-light/80">{{$order->amount}}</p>

                        </div>
                    </div>
                    <div class="text-right space-y-2">
                        <p class="block font-semibold rounded text-p-light hover:bg-[#2a241a]">Discount :</p>
                        <p class="font-semibold text-p-light/80  px-4">{{$order->product->discount}} %</p>
                        <p class="block font-semibold rounded text-p-light hover:bg-[#2a241a]">Total Price :</p>
                        <p class="font-semibold text-p-light/80 px-4">{{$order->amount * $order->product->price}} EG</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
