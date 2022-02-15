<nav
        class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6"
      >
        <div
          class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto"
        >
          <button
            class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
            type="button"
            onclick="toggleNavbar('example-collapse-sidebar')"
          >
            <i class="fas fa-bars"></i>
          </button>
          <a
            class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
            href="../../index.html"
          >
          <div class="text-2xl text-red-500">
              Tempo<div class="inline-block text-gray-700 ">Store</div>
          </div>
          </a>
          <ul class="md:hidden items-center flex flex-wrap list-none">
            {{-- <li class="inline-block relative">
              <a
                class="text-blueGray-500 block py-1 px-3"
                href="#pablo"
                onclick="openDropdown(event,'notification-dropdown')"
                ><i class="fas fa-bell"></i
              ></a>
              <div
                class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
                id="notification-dropdown"
              >
                <a
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
                ></div>
                <a
                  href="#pablo"
                  class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                  >Seprated link</a
                >
              </div>
            </li> --}}
            <li class="inline-block relative">
              <a
                class="text-blueGray-500 block"
                href="#pablo"
                onclick="openDropdown(event,'user-responsive-dropdown')"
                ><div class="items-center flex">
                  <span
                    class="w-12 h-12 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full"
                    ><img
                      alt="..."
                      class="w-full rounded-full align-middle border-none shadow-lg"
                      src="../../assets/img/team-1-800x800.jpg"
                  /></span></div
              ></a>
              <div
                class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
                id="user-responsive-dropdown"
              >
                <a
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
                ></div>
                <a
                  href="#pablo"
                  class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                  >Logout</a
                >
              </div>
            </li>
          </ul>
          <div
            class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden"
            id="example-collapse-sidebar"
          >
            <div
              class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-200"
            >
              <div class="flex flex-wrap">
                <div class="w-6/12">
                  <a
                    class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
                    href="../../index.html"
                  >
                  <div class="text-lg text-gray-700">
                    Tempo<div class="inline-block text-red-500">Store</div>
                </div>
                  </a>
                </div>
                <div class="w-6/12 flex justify-end">
                  <button
                    type="button"
                    class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                    onclick="toggleNavbar('example-collapse-sidebar')"
                  >
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </div>
            <form class="mt-6 mb-4 md:hidden">
              <div class="mb-3 pt-0">
                <input
                  type="text"
                  placeholder="Search"
                  class="border-0 px-3 py-2 h-12 border border-solid border-blueGray-500 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-base leading-snug shadow-none outline-none focus:outline-none w-full font-normal"
                />
              </div>
            </form>
            <!-- Divider -->
            <hr class="my-4 md:min-w-full" />
            <!-- Heading -->
            <h6
              class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline"
            >
              Layout Pages
            </h6>
            <!-- Navigation -->

            <ul class="md:flex-col md:min-w-full flex flex-col list-none">
              <li class="items-center">
                <a
                  href="{{ route('dashboard') }}"
                  class="text-xs uppercase py-3 font-bold block {{ $title=='Dashboard' ? 'text-pink-500 hover:text-pink-600' : 'text-blueGray-300' }}"
                >
                  <i class="fas fa-tv mr-2 text-sm opacity-75"></i>
                  Dashboard
                </a>
              </li>
              <hr class="my-4 md:min-w-full" />
              <!-- Heading -->
              <h6
                class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline"
              >
              Category
            </h6>
            <hr class="my-4 md:min-w-full" />
            <!-- Heading -->
            {{-- <h6
            class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline"
            >
            Order Produk
          </h6>
          <li class="items-center">
            <a
            href="{{ route('order') }}"
            class="text-xs uppercase py-3 font-bold block {{ $title=='Order' ? 'text-pink-500 hover:text-pink-600' : 'text-blueGray-300' }}"
            >
            <i class="fas fa-boxes mr-2 text-sm opacity-75"></i>
            Order Produk
          </a>
        </li> --}}
        <hr class="my-4 md:min-w-full" />
          <h6
            class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline"
            >
            Margin Hpp
          </h6>
          <li class="items-center">
            <a
              href="{{ route('margin') }}"
              class="text-xs uppercase py-3 font-bold block {{ $title=='Margin HPP' ? 'text-pink-500 hover:text-pink-600' : 'text-blueGray-300' }}"
            >
              <i class="fas fa-boxes mr-2 text-sm opacity-75"></i>
              Margin Hpp
            </a>
          </li>
        <hr class="my-4 md:min-w-full" />
          <h6
            class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline"
            >
            Penerimaan Barang
          </h6>
          <li class="items-center">
            <a
              href="{{ route('penerimaan.barang') }}"
              class="text-xs uppercase py-3 font-bold block {{ $title=='Penerimaan Barang' ? 'text-pink-500 hover:text-pink-600' : 'text-blueGray-300' }}"
            >
              <i class="fas fa-boxes mr-2 text-sm opacity-75"></i>
              Terima Barang
            </a>
          </li>
        <hr class="my-4 md:min-w-full" />
          <h6
            class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline"
            >
            Order
          </h6>
          <li class="items-center">
            <a
              href="{{ route('order.produk') }}"
              class="text-xs uppercase py-3 font-bold block {{ $title=='Order' ? 'text-pink-500 hover:text-pink-600' : 'text-blueGray-300' }}"
            >
              <i class="fas fa-boxes mr-2 text-sm opacity-75"></i>
              Order Produk
            </a>
          </li>
        <hr class="my-4 md:min-w-full" />
          <h6
            class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline"
            >
            Invoice
          </h6>
          <li class="items-center">
            <a
              href="{{ route('invoice') }}"
              class="text-xs uppercase py-3 font-bold block {{ $title=='Invoice' ? 'text-pink-500 hover:text-pink-600' : 'text-blueGray-300' }}"
            >
              <i class="fas fa-boxes mr-2 text-sm opacity-75"></i>
              Invoice Order Product
            </a>
          </li>
          <li class="items-center">
            <a
              href="{{ route('ListInvoice') }}"
              class="text-xs uppercase py-3 font-bold block {{ $title=='List Invoice' ? 'text-pink-500 hover:text-pink-600' : 'text-blueGray-300' }}"
            >
              <i class="fas fa-boxes mr-2 text-sm opacity-75"></i>
              List Invoice Produk
            </a>
          </li>
          <hr class="my-4 md:min-w-full" />
           
            <h6
            class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline"
            >
            Produk
          </h6>
          
          <li class="items-center">
            <a
              href="{{ route('category') }}"
              class="text-xs uppercase py-3 font-bold block {{ $title=='Category' ? 'text-pink-500 hover:text-pink-600' : 'text-blueGray-300' }}"
            >
              <i class="fas fa-boxes mr-2 text-sm opacity-75"></i>
              List Product Category
            </a>
          </li>
              <li class="items-center">
                <a
                  href="{{ route('get.product') }}"
                  class="text-xs uppercase py-3 font-bold block {{ $title=='ListProduct' ? 'text-pink-500 hover:text-pink-600' : 'text-blueGray-300' }}"
                >
                  <i class="fas fa-boxes mr-2 text-sm opacity-75"></i>
                  List Produk
                </a>
              </li>
              <li class="items-center">
                <a
                  href="{{ route('inputproduct') }}"
                  class="text-xs uppercase py-3 font-bold block {{ $title=='Product' ? 'text-pink-500 hover:text-pink-600' : 'text-blueGray-300' }}"
                >
                  <i class="fas fa-boxes mr-2 text-sm opacity-75"></i>
                  Input Produk
                </a>
              </li>

              <li class="items-center">
                <a
                  href="{{ route('update') }}"
                  class="text-xs uppercase py-3 font-bold block {{ $title=='Update Product' ? 'text-pink-500 hover:text-pink-600' : 'text-blueGray-300' }}"
                >
                  <i class="fas fa-box mr-2 text-sm opacity-75"></i>
                  Update Produk
                </a>
              </li>

              {{-- <li class="items-center">
                <a
                  href="./maps.html"
                  class="text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500"
                >
                  <i
                    class="fas fa-map-marked mr-2 text-sm text-blueGray-300"
                  ></i>
                  Maps
                </a>
              </li> --}}
            </ul>

            <!-- Divider -->
            <hr class="my-4 md:min-w-full" />
            <!-- Heading -->
            <h6
              class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline"
            >
              WhiteList User
            </h6>
            <!-- Navigation -->

            <ul
              class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4"
            >
              <li class="items-center">
                <a
                  href="{{ route('user.whitelist') }}"
                  class="text-xs uppercase py-3 font-bold block {{ $title=='WhiteList' ? 'text-pink-500 hover:text-pink-600' : 'text-blueGray-300' }}"
                >
                  <i class="fas fa-fingerprint   mr-2 text-sm opacity-75"></i>
                  Login
                </a>
              </li>

              <li class="items-center">
                <a
                  href="../auth/register.html"
                  class="text-blueGray-700 hover:text-blueGray-500 text-xs uppercase py-3 font-bold block"
                >
                  <i
                    class="fas fa-clipboard-list text-blueGray-300 mr-2 text-sm"
                  ></i>
                  Register
                </a>
              </li>
              <hr class="my-4 md:min-w-full" />
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="bg-purple-600 font-bold text-white p-1 rounded hover:bg-purple-500">Logout<button>
                </form>
            </ul>
            <!-- Heading -->
            </div>
        </div>
      </nav>