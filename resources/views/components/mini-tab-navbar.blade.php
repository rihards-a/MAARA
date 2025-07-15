<nav aria-label="Galvenās sadaļas" class="bg-white sticky top-[40px] z-40">
  <div class="flex flex-wrap justify-center gap-2">
      <a href="{{ route('dashboard') }}"    
        class="flex items-center justify-center flex-shrink-0 px-4 py-2 text-xs font-medium rounded-md shadow-sm text-black bg-white hover:bg-[#76A392] hover:text-white transition-colors duration-150 ease-in-out min-w-[40px] max-w-[40px]"
        aria-label="Mājas">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" >
          <path stroke-linecap="round" stroke-linejoin="round" d="M3 9.75L12 4.5l9 5.25v9a1.5 1.5 0 01-1.5 1.5H4.5A1.5 1.5 0 013 18.75v-9z" />
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 22.5v-6h6v6" />
        </svg>
      </a>

      <a href="{{ route('dashboard.med') }}"
        class="flex items-end justify-center flex-shrink-0 px-4 py-2 text-xs font-medium rounded-md shadow-sm whitespace-normal text-center min-w-[80px] max-w-[120px] transition-colors duration-150 ease-in-out
        {{ request()->routeIs('dashboard.med') ? 'bg-[#29443D] text-white' : 'bg-white text-black hover:bg-[#76A392] hover:text-white' }}">
        Medicīniskās izvēles
      </a>

      <a href="{{ route('dashboard.pensija') }}"
        class="flex items-end justify-center flex-shrink-0 px-4 py-2 text-xs font-medium rounded-md shadow-sm whitespace-normal text-center min-w-[80px] max-w-[120px] transition-colors duration-150 ease-in-out
        {{ request()->routeIs('dashboard.pensija') ? 'bg-[#29443D] text-white' : 'bg-white text-black hover:bg-[#76A392] hover:text-white' }}">
        Pensijas mantošana
      </a>

      <a href="{{ route('dashboard.beres') }}"
        class="flex items-end justify-center flex-shrink-0 px-4 py-2 text-xs font-medium rounded-md shadow-sm whitespace-normal text-center min-w-[80px] max-w-[120px] transition-colors duration-150 ease-in-out
        {{ request()->routeIs('dashboard.beres') ? 'bg-[#29443D] text-white' : 'bg-white text-black hover:bg-[#76A392] hover:text-white' }}">
        Apbedīšanas izvēles
      </a>

      <a href="{{ route('dashboard.finanses') }}"
        class="flex items-end justify-center flex-shrink-0 px-4 py-2 text-xs font-medium rounded-md shadow-sm whitespace-normal text-center min-w-[80px] max-w-[120px] transition-colors duration-150 ease-in-out
        {{ request()->routeIs('dashboard.finanses') ? 'bg-[#29443D] text-white' : 'bg-white text-black hover:bg-[#76A392] hover:text-white' }}">
        Finanšu pārvaldība
      </a>

      <a href="{{ route('dashboard.testaments') }}"
        class="flex items-end justify-center flex-shrink-0 px-4 py-2 text-xs font-medium rounded-md shadow-sm whitespace-normal text-center min-w-[80px] max-w-[120px] transition-colors duration-150 ease-in-out
        {{ request()->routeIs('dashboard.testaments') ? 'bg-[#29443D] text-white' : 'bg-white text-black hover:bg-[#76A392] hover:text-white' }}">
        Testamenta sagatavošana
      </a>

      <a href="{{ route('dashboard.digmantojums') }}"
        class="flex items-end justify-center flex-shrink-0 px-4 py-2 text-xs font-medium rounded-md shadow-sm whitespace-normal text-center min-w-[80px] max-w-[120px] transition-colors duration-150 ease-in-out
        {{ request()->routeIs('dashboard.digmantojums') ? 'bg-[#29443D] text-white' : 'bg-white text-black hover:bg-[#76A392] hover:text-white' }}">
        Digitālais mantojums
      </a>

      <a href="{{ route('dashboard.pienakumi') }}"
        class="flex items-end justify-center flex-shrink-0 px-4 py-2 text-xs font-medium rounded-md shadow-sm whitespace-normal text-center min-w-[80px] max-w-[120px] transition-colors duration-150 ease-in-out
        {{ request()->routeIs('dashboard.pienakumi') ? 'bg-[#29443D] text-white' : 'bg-white text-black hover:bg-[#76A392] hover:text-white' }}">
        Dzīves pienākumi
      </a>

      <a href="{{ route('dashboard.zinas') }}"
        class="flex items-end justify-center flex-shrink-0 px-4 py-2 text-xs font-medium rounded-md shadow-sm whitespace-normal text-center min-w-[80px] max-w-[120px] transition-colors duration-150 ease-in-out
        {{ request()->routeIs('dashboard.zinas') ? 'bg-[#29443D] text-white' : 'bg-white text-black hover:bg-[#76A392] hover:text-white' }}">
        Ziņas palicējiem
      </a>
    </div>
  </nav>