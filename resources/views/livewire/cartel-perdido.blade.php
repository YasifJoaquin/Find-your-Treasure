<div>
    <div class="absolute inset-0 z-40 w-screen h-screen flex flex-col">
        <div class="relative z-50">
            @livewire('menu')
        </div>

        <div class="w-3/5 h-4/5 m-auto rounded-xl bg-center flex justify-center" style="background-image: url({{ asset('src/fondo-claro.png') }});" name="fondo">
            <div class="inline-flex">
                <div class="w-3/12"> 
                    <img src="{{ asset('src/clavo.png')}}" class="w-16 h-full object-cover mx-auto" alt="Clavo">
                </div>
                <div class="w-6/12"> <p class="text-3xl text-gray-100 tracking-widest"> Mi perfil </p> </div>
                <div class="w-3/12">
                    <img src="{{ asset('src/clavo.png')}}" class="w-16 h-full object-cover mx-auto" alt="Clavo">
                </div>
            </div>
        </div>

    </div>
</div>
