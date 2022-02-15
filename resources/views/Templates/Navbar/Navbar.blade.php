<nav
          class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4"
        >
          <div
            class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4"
          >
            <a
              class="text-white text-sm uppercase hidden lg:inline-block font-semibold"
              href="#"
              >Dashboard</a
            >
            
              
            <ul
              class="flex-col md:flex-row list-none items-center hidden md:flex"
            >
                <div class="items-center flex">
                  <span
                    class="w-12 h-12 text-sm  text-black bg-white font-semibold bg-blueGray-200 inline-flex items-center justify-center"
                    >{{ session()->get('username') }}</span>
                </div>
              </a>
              <a
                class="text-blueGray-500 block"
                href="#pablo"
                onclick="openDropdown(event,'user-dropdown')"
              >
                <div class="items-center flex">
                  <span
                    class="w-12 h-12 text-sm  text-white  bg-blueGray-200 inline-flex items-center justify-center"
                    ><img
                      alt="..."
                      class="w-full  align-middle border-none rounded-r-lg"
                      src="data:image/jpeg;base64,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"
                  /></span>
                </div>
              </a>
              <div
                class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
                id="user-dropdown"
              >
                {{-- <a
                  href="#pablo"
                  class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                  >Action</a
                ><a
                  href="#pablo"
                  class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                  >Another action</a
                ><a
                  href="#pablo"
                  class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                  >Something else here</a
                >
                <div
                  class="h-0 my-2 border border-solid border-blueGray-100"
                ></div> --}}
                
                {{-- <a
                  href="{{ route('logout') }}"
                  class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                  >Logout</a
                > --}}
                <form action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Logout<button>
                  </form>
              </div>
            </ul>
          </div>
        </nav> 