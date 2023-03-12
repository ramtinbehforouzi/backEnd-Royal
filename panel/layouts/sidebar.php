    <nav class="absolute inset-0 z-50 transform lg:transform-none lg:opacity-100 duration-200 lg:relative bg-indigo-900 text-white h-[calc(100vh-32px)] w-72 p-3 bg-gradient-to-br from-gray-800 to-gray-900 translate-x-0 my-4 mr-4 rounded-xl" :class="{'translate-x-0 ease-in opacity-100':open === true, 'translate-x-full ease-out opacity-0': open === false}">
        <div class="flex justify-between">
            <span class="font-bold text-2xl sm:text-3xl p-2">خوش امدید</span>
            <button class="middle none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-8 max-w-[32px] h-8 max-h-[32px] rounded-lg text-xs text-white hover:bg-white/10 active:bg-white/30 absolute left-0 top-0 grid rounded-bl-none rounded-tr-none xl:hidden" type="button" @click="open = false">
                <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" aria-hidden="true" class="h-5 w-5 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </span>
            </button>
        </div>
        <ul class="mt-8">
            <li>
                <a href="<?= url('panel') ?>" class="block px-4 py-2 hover:bg-indigo-800 rounded-md">پیشخوان</a>
                <a href="<?= url('panel/category') ?>" class="block px-4 py-2 hover:bg-indigo-800 rounded-md">دسته بندی ها</a>
                <a href="<?= url('panel/post') ?>" class="block px-4 py-2 hover:bg-indigo-800 rounded-md">پست ها</a>
            </li>
        </ul>
    </nav>
    <div class="fixed inset-0 bg-gray-900/30 z-10" @click.prevent="open = false" x-show="open" x-cloak></div>