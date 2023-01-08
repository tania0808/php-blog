<div class="flex justify-between items-center">
    <a href="<?=ROOT?>/home"><img class="h-16 object-fill" src="<?=ROOT?>/assets/logo.jpeg" alt="logo"></a>
    <div>
        <ul class="flex gap-x-20">
            <a href="<?=ROOT?>/home">
                <li class="<?=$tab == 'home' ? 'underline underline-offset-8 decoration-4 decoration-sky-500' : '' ?>">Home</li>
            </a>
            <a href="<?=ROOT?>/explore">
                <li class="<?=$tab == 'explore' ? 'underline underline-offset-8 decoration-4 decoration-sky-500' : '' ?>">Explore</li>
            </a>
            <a href="<?=ROOT?>/bookmarks">
                <li class="<?=$tab == 'bookmarks' ? 'underline underline-offset-8 decoration-4 decoration-sky-500' : '' ?>">Bookmarks</li>
            </a>
        </ul>
    </div>
    <div class="flex">
        <div class="flex items-center" id="dropdownDefaultButton" data-dropdown-toggle="dropdown" >
            <img class="h-8 rounded-sm mr-2" src="<?=ROOT?>/assets/user_female.jpg" alt="">
            <p>Tania</p>
            <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
        </div>
        <!-- Dropdown menu -->
        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700">
            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-black">Profile</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-black">Settings</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-black">Sign out</a>
                </li>
            </ul>
        </div>
    </div>
</div>