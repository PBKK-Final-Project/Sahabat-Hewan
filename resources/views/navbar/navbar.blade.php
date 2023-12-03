<nav class="bg-white z-[99999] border-gray-200 w-full fixed top-0 dark:bg-gray-900">
  <div class="max-w flex items-center justify-between mx-auto px-6 py-4 h-16 sticky">
    <a href="/landing" class="flex items-center">
      <img src="/images/SeAn.png" class="h-8 mr-3"/>
      <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">SeAn</span>
    </a>

    <div class="flex items-center md:order-2">
      <div class="flex flex-row gap-x-5">
        <a href="/profile" class="mt-1 flex mr-3 text-sm rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
          <span class="sr-only">Open user menu</span>
          <img class="w-8 h-8 rounded-full" src="/images/AelitaStones.png" alt="user photo">
        </a>   
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="bg-blue-800 hover:bg-yellow-800 text-white font-bold py-2 px-4 rounded">
              {{ __('Log Out') }}
          </button>
        </form>
      </div>
    </div>

    <div class="items-center justify-center hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
      <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
          <li>
              <a href="home" 
                 @class([
                     'block py-2 pl-3 pr-4 text-gray-900 rounded',
                     'hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700',
                     'text-blue-700' => request()->is('home')
                 ])>
                 Home
              </a>
          </li>
          <li>
              <a href="/shop" 
                 @class([
                     'block py-2 pl-3 pr-4 text-gray-900 rounded',
                     'hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700',
                     'text-blue-700' => request()->is('shop')
                 ])>
                 Shop
              </a>
          </li>
          <li>
              <a href="/academy" 
                 @class([
                     'block py-2 pl-3 pr-4 text-gray-900 rounded',
                     'hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700',
                     'text-blue-700' => request()->is('academy')
                 ])>
                 Academy
              </a>
          </li>
          <li>
              <a href="/consult" 
                 @class([
                     'block py-2 pl-3 pr-4 text-gray-900 rounded',
                     'hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700',
                     'text-blue-700' => request()->is('consult')
                 ])>
                 Consult
              </a>
          </li>
          <li>
            <a href="/vetvan" 
               @class([
                   'block py-2 pl-3 pr-4 text-gray-900 rounded',
                   'hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700',
                   'text-blue-700' => request()->is('consult')
               ])>
               Vet Van
            </a>
        </li>
      </ul>
  </div>
  
  </div>
</nav>