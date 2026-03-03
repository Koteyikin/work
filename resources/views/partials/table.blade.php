<div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg shadow-md w-full mt-10">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Всяческие обсуждения</h2>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" aria-label="Add New Member">
            Добавить обсуждение
        </button>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full leading-normal">
            <thead class="bg-gray-100 dark:bg-gray-700">
            <tr>
                <th scope="col" class="px-5 py-3 border-b-2 text-white  text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Название темы
                </th>
                <th scope="col" class="px-5 py-3 border-b-2 text-white  text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Автор обсуждения
                </th>
                <th scope="col" class="px-5 py-3 border-b-2 text-white  text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Статус
                </th>
                <th scope="col" class="px-5 py-3 border-b-2 text-white text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    Действия
                </th>
            </tr>
            </thead>
            <tbody>


            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                <td class="px-5 py-5 border-b border-gray-200  text-sm">
                    <div class="flex items-center">
                        <p class="text-gray-900 dark:text-white whitespace-no-wrap">John Doe</p>
                    </div>
                </td>
                <td class="px-5 py-5 border-b border-gray-200  text-sm">
                    <p class="text-gray-900 dark:text-white whitespace-no-wrap">Administrator</p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200  text-sm">
                          <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                            <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                            <span class="relative">Active</span>
                          </span>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 text-sm ">
                    <div class="flex items-center gap-2">
                        <button class="bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-white font-bold py-2 px-3 mr-1 rounded focus:outline-none focus:shadow-outline" aria-label="View profile">Просмотреть</button>
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 rounded focus:outline-none focus:shadow-outline" aria-label="Remove team member">Удалить</button>
                        <button class="text-white hover:bg-gray-300 dark:bg-sky-700 dark:hover:bg-sky-600 text-gray-700 dark:text-white font-bold py-2 px-3 mr-1 rounded focus:outline-none focus:shadow-outline" aria-label="View profile">Изменить</button>

                    </div>
                </td>
            </tr>

            </tbody>
        </table>
    </div>
</div>

