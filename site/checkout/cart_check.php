<div class="container mx-auto mt-10">
    <div class="sm:flex shadow-md my-10">
        <div class="  w-full  sm:w-3/4 bg-white px-10 py-10">
            <div class="flex justify-between border-b pb-8">
                <h1 class="font-semibold text-2xl">Shopping Cart</h1>
                <h2 class="font-semibold text-2xl">3 Items</h2>
            </div>
            <div class="md:flex items-strech py-8 md:py-10 lg:py-8 border-t border-gray-50">
                <div class="md:w-4/12 2xl:w-1/4 w-full">
                    <img src="https://i.ibb.co/TTnzMTf/Rectangle-21.png" alt="Black Leather Purse"
                        class=" w-full h-full object-center object-cover" />
                </div>
                <div class="md:pl-3 md:w-8/12 2xl:w-3/4 flex flex-col justify-center">
                    <p class="text-xs leading-3 text-gray-800 md:pt-0 pt-4">RF293</p>
                    <div class="flex items-center justify-between w-full">
                        <p class="text-base font-black leading-none text-gray-800">Luxe card holder</p>
                        <div class="mt-4 flex items-center">
                            <span class="mr-2 text-gray-600">Quantity:</span>
                            <div class="flex items-center">
                                <button class="bg-gray-200 rounded-l-lg px-2 py-1" disabled>-</button>
                                <span class="mx-2 text-gray-600">1</span>
                                <button class="bg-gray-200 rounded-r-lg px-2 py-1" disabled>+</button>
                            </div>
                        </div>
                    </div>
                    <p class="text-xs leading-3 text-gray-600 pt-2">Height: 10 inches</p>
                    <p class="text-xs leading-3 text-gray-600 py-4">Color: Black</p>
                    <p class="w-96 text-xs leading-3 text-gray-600">Composition: 100% calf leather</p>
                    <div class="flex items-center justify-between pt-5">
                        <div class="flex itemms-center">
                            <p class="text-xs leading-3 underline text-gray-800 cursor-pointer">Add to favorites</p>
                            <p class="text-xs leading-3 underline text-red-500 pl-5 cursor-pointer">Remove</p>
                        </div>
                        <p class="text-base font-black leading-none text-gray-800">,000</p>
                    </div>
                </div>
            </div>

            <div class="md:flex items-strech py-8 md:py-10 lg:py-8 border-t border-gray-50">
                <div class="md:w-4/12 2xl:w-1/4 w-full">
                    <!-- <img src="https://i.ibb.co/6gzWwSq/Rectangle-20-1.png" alt="Black Leather Purse" class="h-full object-center object-cover md:block hidden" /> -->
                    <img src="https://i.ibb.co/TTnzMTf/Rectangle-21.png" alt="Black Leather Purse"
                        class=" w-full h-full object-center object-cover" />
                </div>
                <div class="md:pl-3 md:w-8/12 2xl:w-3/4 flex flex-col justify-center">
                    <p class="text-xs leading-3 text-gray-800 md:pt-0 pt-4">RF293</p>
                    <div class="flex items-center justify-between w-full">
                        <p class="text-base font-black leading-none text-gray-800">Luxe card holder</p>
                        <div class="mt-4 flex items-center">
                            <span class="mr-2 text-gray-600">Quantity:</span>
                            <div class="flex items-center">
                                <button class="bg-gray-200 rounded-l-lg px-2 py-1" disabled>-</button>
                                <span class="mx-2 text-gray-600">1</span>
                                <button class="bg-gray-200 rounded-r-lg px-2 py-1" disabled>+</button>
                            </div>
                        </div>
                    </div>
                    <p class="text-xs leading-3 text-gray-600 pt-2">Height: 10 inches</p>
                    <p class="text-xs leading-3 text-gray-600 py-4">Color: Black</p>
                    <p class="w-96 text-xs leading-3 text-gray-600">Composition: 100% calf leather</p>
                    <div class="flex items-center justify-between pt-5">
                        <div class="flex itemms-center">
                            <p class="text-xs leading-3 underline text-gray-800 cursor-pointer">Add to favorites</p>
                            <p class="text-xs leading-3 underline text-red-500 pl-5 cursor-pointer">Remove</p>
                        </div>
                        <p class="text-base font-black leading-none text-gray-800">,000</p>
                    </div>
                </div>
            </div>
            <a href="/" class="flex font-semibold text-indigo-600 text-lg mt-10">
                <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512">
                    <path
                        d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z" />
                </svg>
                Continue Shopping
            </a>
        </div>
        <div id="summary" class=" w-full   sm:w-1/4   md:w-1/2     px-8 py-10">
            <h1 class="font-semibold text-2xl border-b pb-8">Order Summary</h1>
            <div class="flex justify-between mt-10 mb-5">
                <span class="font-semibold text-sm uppercase">Total</span>
                <span class="font-semibold text-sm">590$</span>
            </div>

            <div class="py-10">
                <label for="promo" class="font-semibold inline-block mb-3 text-sm uppercase">
                    Promo Code
                </label>
                <input type="text" id="promo" placeholder="Enter your code"
                    class="p-2 border-gray-500 text-sm w-full border-2 rounded-lg focus:border-pink-500 focus:ring-blue-500 focus-visible:outline-none" />
            </div>
            <button class="bg-red-500 hover:bg-red-600 px-5 py-2 text-sm text-white uppercase">
                Apply
            </button>
            <div class="border-t mt-8">
                <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                    <span>Total cost</span>
                    <span>$600</span>
                </div>
                <button class="bg-[#ff00d9] font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full">
                    Checkout
                </button>
            </div>
        </div>
    </div>
</div>