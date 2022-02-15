<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    {{-- alert --}}
    <div class=" mx-auto p-4 md:justify-center max-w-screen-sm mt-20">
        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative " role="alert">
            <strong class="font-bold">Username Atau Password Anda Salah!</strong>
            <span class="block sm:inline">Periksa kembali Username dan Password Anda</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
            </span>
        </div>
        @endif
    </div>
    {{-- end Alert --}}
    <div class="mx-auto p-4 md:flex md:justify-center mb-6 -mt-10">
        <div class="max-w-screen-lg border-2 shadow-lg rounded overflow-hidden m-4 lg:flex">
            {{-- card content --}}
            <div class="bg-white px-8 pt-6 pb-8 flex flex-col">
                <div class="text-xl">
                    <div class="text-red-500 font-bold">
                        Tempo<div class="text-gray-500 inline-block">Store</div>
                    </div>
                </div>
                <div class="m-3">
                </div>
                <p class="text-2xl font-bold">
                    Login
                </p>
                <p class="text-sm text-gray-400 mb-3">
                    Please Input Your Account
                </p>
                <form action="{{ route('userlogin') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-grey-darker text-sm font-bold mb-2" for="username">
                            Username
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="username" name="username" required type="text" placeholder="Username">
                    </div>
                    <div class="mb-6">
                        <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
                          Password
                        </label>
                        <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" required id="password" name="password" type="password" placeholder="******************">
                    </div>
                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-purple-600 hover:bg-blue-dark w-full text-white font-bold py-2 px-4 rounded" type="button">
                          Login
                        </button>
                    </div>
                </form>
            </div>
            <div class="bg-red-500 border-x-2 rounded px-8 pt-6 pb-8 overflow-hidden  flex flex-col">
                <div class="w-96"></div>
            </div>
        </div>
    </div>
</body>
</html>