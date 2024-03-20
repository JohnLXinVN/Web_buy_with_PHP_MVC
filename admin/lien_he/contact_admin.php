<div class="mt-8">
    <h2 class="text-2xl font-semibold mb-4">Thông tin liên hệ</h2>
    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Họ và tên</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Địa chỉ email</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Số điện thoại</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Thông điệp</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Ngày gửi</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Trạng thái trả lời</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Thao tác</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                <tr>
                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">John Doe</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">johndoe@example.com</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">123-456-7890</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Xin chào!</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">2024-02-28 09:15</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Đã trả lời</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                        <a href="reply.html" class="text-blue-500 hover:text-blue-700">Trả lời</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="mt-8">
    <h2 class="text-2xl font-semibold mb-4">Trả lời liên hệ</h2>
    <div class="border border-gray-200 rounded-lg p-6">
        <form class="w-96">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Họ và tên</label>
                <input type="text" name="name" id="name" value="John Doe" readonly class="mt-1 block w-full bg-gray-100 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Địa chỉ email</label>
                <input type="email" name="email" id="email" value="johndoe@example.com" readonly class="mt-1 block w-full bg-gray-100 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Nội dung trả lời</label>
                <textarea name="reply" id="reply" rows="3" class="mt-1 block w-full bg-gray-100 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
            </div>
            <div class="mb-4">
                <input type="submit" value="Gửi" class="px-4 py-2 bg-blue-500 text-white rounded-md shadow-sm hover:bg-blue-600 transition-colors duration-200">
            </div>
        </form>
    </div>
</div>