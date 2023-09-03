<nav class="h-12 border-gray-200 bg-white dark:bg-gray-900">
				<div class="mx-16 flex flex-wrap items-center justify-between px-6 py-2">
								<button type="button"
												class="inline-flex h-8 w-8 items-center justify-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
												data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation" aria-controls="drawer-navigation">
												<span class="sr-only">Open main menu</span>
												<svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
																<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
																				d="M1 1h15M1 7h15M1 13h15" />
												</svg>
								</button>
								{{-- --logo-- --}}
								<a href="https://flowbite.com/" class="flex items-center">
												<img src="https://flowbite.com/docs/images/logo.svg" class="mr-3 h-4" alt="Flowbite Logo" />
												<span class="self-center whitespace-nowrap text-xl font-semibold dark:text-white">Flowbite</span>
								</a>

								<div class="flex items-center px-2 md:order-2">
												<button type="button"
																class="mr-3 flex rounded-full bg-gray-800 text-sm focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600 md:mr-0"
																id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
																data-dropdown-placement="bottom">
																<span class="sr-only">Open user menu</span>
																<img class="h-8 w-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="user photo">
												</button>
												<!-- Dropdown menu -->
												<div class="z-50 mx-2 my-4 hidden list-none divide-y divide-gray-100 rounded-lg bg-white text-base shadow dark:divide-gray-600 dark:bg-gray-700"
																id="user-dropdown">
																<div class="px-4 py-3">
																				<span class="block text-sm text-gray-900 dark:text-white">Admin</span>
																				<span class="block truncate text-sm text-gray-500 dark:text-gray-400">admin@admin.com</span>
																</div>
																<ul class="mx-2 py-2" aria-labelledby="user-menu-button">
																				<li>
																								<a href="#"
																												class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
																				</li>
																				<li>
																								<a href="#"
																												class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
																				</li>
																				<li>
																								<a href="#"
																												class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
																				</li>
																				<li>
																								<a href="#"
																												class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">Sign
																												out</a>
																				</li>
																</ul>
												</div>
												<!-- drawer init and show -->
												<!-- drawer init and toggle -->
												<button type="button"
																class="mx-2 inline-flex h-8 w-8 items-center justify-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
																id='dark-mode'>
																<span class="sr-only">Open main menu</span>
																<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50"
																				viewBox="0 0 172 172" style=" fill:#26e07f;">
																				<g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
																								stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
																								font-family="none" font-weight="none" font-size="none" text-anchor="none"
																								style="mix-blend-mode: normal">
																								<path d="M0,172v-172h172v172z" fill="none"></path>
																								<g fill="#1fb141">
																												<path
																																d="M21.5,21.5v129h64.5v-32.25v-64.5v-32.25zM86,53.75c0,17.7805 14.4695,32.25 32.25,32.25c17.7805,0 32.25,-14.4695 32.25,-32.25c0,-17.7805 -14.4695,-32.25 -32.25,-32.25c-17.7805,0 -32.25,14.4695 -32.25,32.25zM118.25,86c-17.7805,0 -32.25,14.4695 -32.25,32.25c0,17.7805 14.4695,32.25 32.25,32.25c17.7805,0 32.25,-14.4695 32.25,-32.25c0,-17.7805 -14.4695,-32.25 -32.25,-32.25z">
																												</path>
																								</g>
																				</g>
																</svg>
												</button>
												<!-- drawer init and toggle -->
												<button type="button"
																class="w-62 mx-2 inline-flex h-8 items-center justify-center rounded-lg px-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
																data-drawer-target="drawer-right-example" data-drawer-show="drawer-right-example"
																data-drawer-placement="right" aria-controls="drawer-right-example">
																<span class="sr-only">Open main menu</span>
																<h5 id="text-xs" class="inline-flex items-center whitespace-nowrap text-gray-500 dark:text-gray-400">
																				<svg class="h-6 w-14" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
																								viewBox="0 0 20 20">
																								<path
																												d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
																				</svg>System Info
																</h5>

												</button>

								</div>
								{{-- --menu-container --}}
								{{-- <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
      <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <a href="#" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
        </li>
        <li>
          <a href="#" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
        </li>
        <li>
          <a href="#" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
        </li>
        <li>
          <a href="#" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Pricing</a>
        </li>
        <li>
          <a href="#" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
        </li>
      </ul>
    </div> --}}
								{{-- --menu-container end --}}
				</div>
</nav>
