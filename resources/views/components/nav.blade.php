 <div class="navbar bg-base-200 ">
     <div class="navbar-start">
         <div class="dropdown">
             <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                 <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                 </svg>
             </div>
             <ul tabindex="-1" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                 <li><a href="/">home</a></li>
                 <li><a href="/about">About us</a> </li>
                 <li><a href="/contact">Contact us</a></li>
                 <li><a href="/prisma">Prisma</a></li>
                 <li> <a href="/tasks">tasks</a></li>
                 <li> <a href='/additional-tasks'>add-tasks</a></li>
                 <li><a href="/forms">forms</a></li>
                 <li> <a href="/ideas/index">index</a></li>
                 <li><a href="/ideas/create">create</a></li>
             </ul>
         </div>
         <a class="btn btn-ghost text-xl">daisyUI</a>
     </div>
     <div class="navbar-center hidden lg:flex">
         <ul class="menu menu-horizontal px-1">
             <li><a href="/">home</a></li>
             <li><a href="/about">About us</a> </li>
             <li><a href="/contact">Contact us</a></li>
         </ul>
     </div>
     {{-- @guest ით ამოწმებს რომ თუ სტუმარია მხოლოდ მაშინ აჩვენოს register ღილაკი --}}
     {{-- @guest
         <div class="navbar-end space-x-2">
             <a class="btn btn-primary" href="/register">Register</a>
             <a class="btn btn-secondary" href="/login">Login</a>
         </div>
     @endguest --}}
     {{-- როცა ავტორიზებულია მაშინ რა გამოჩნდეს @auth --}}
     @auth
         <form action="/logout" method="POST">
             @csrf
             @method('DELETE')
             <button class="btn btn-ghost">Log out</button>
         </form>
     @else
         <div class="navbar-end space-x-2">
             <a class="btn btn-primary" href="/register">Register</a>
             <a class="btn btn-secondary" href="/login">Login</a>
         </div>
     @endauth

 </div>
 <nav class='flex flex-row justify-evenly'>




 </nav>
