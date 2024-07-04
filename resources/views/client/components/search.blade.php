   <!-- Start Search -->
   <div class="sticky top-0 p-2 bg-gradient-to-r from-primary dark:from-primary to-transparent z-[10] bg-white dark:bg-gray-800">
       <div class="max-w-screen-xl mx-auto">
           <form class="w-full" action="search_book.html">
               <div class="flex flex-wrap gap-2">
                   <!-- Search Database -->
                   <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                       class="text-gray-900 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-tl-lg rounded-tr-lg md:rounded-s-lg text-md px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-gray-100 dark:focus:ring-gra2bg-gray-200 w-full md:w-auto justify-center md:rounded-tr-none border border-primary"
                       type="button">
                       E-Publications
                       <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                           viewBox="0 0 10 6">
                           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                               d="m1 1 4 4 4-4" />
                       </svg>
                   </button>
                   <!-- Dropdown menu -->
                   <div id="dropdown"
                       class="z-30 hidden w-auto bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700">
                       <ul class="py-2 text-gray-700 text-md dark:text-gray-200"
                           aria-labelledby="dropdownDefaultButton">
                           <li>
                               <a href="./index.html"
                                   class="block px-6 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">E-Publications</a>
                           </li>
                           <li>
                               <a href="./viewDetailVideo.html"
                                   class="block px-6 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Videos</a>
                           </li>
                           <li>
                               <a href="./viewDetailAudio.html"
                                   class="block px-6 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Audios</a>
                           </li>
                           <li>
                               <a href="./viewDetailImage.html"
                                   class="block px-6 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Images</a>
                           </li>
                           <li>
                               <a href="./viewDetailBulletin.html"
                                   class="block px-6 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Bulletins</a>
                           </li>
                       </ul>
                   </div>
                   <!-- End Search Database -->

                   <div class="flex flex-1">
                       <input type="search" id="search-dropdown"
                           class="block p-2.5 w-full z-20 text-md text-gray-900 bg-gray-50 border-gray-50 border-1 border border-gray-300 focus:ring-primary focus:border-blue-500 dark:bg-gray-700 dark:border-gray-300 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500 rounded-bl-lg md:rounded-bl-none border border-primary"
                           placeholder="Search..." />
                       <button type="submit"
                           class="top-0 end-0 p-2.5 text-md font-medium h-full text-white bg-primary rounded-e-lg border border-primary hover:bg-primaryHover focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-primary dark:hover:bg-primary dark:focus:ring-primaryHover flex space-x-2 items-center justify-center ml-2 rounded-tr-none md:rounded-tr-lg">
                           <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                               viewBox="0 0 20 20">
                               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                   stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                           </svg>
                           <span>Search</span>
                       </button>
                   </div>
               </div>
           </form>
       </div>
   </div>
   <!-- End Search -->
