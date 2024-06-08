<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inicio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-12">
                <div class="p-6 bg-white border-b border-gray-200">
                
                    <h3 class=" p-6 text-3xl font-bold dark:text-white">Bienvenido a la biblioteca de recetas</h3>
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col md:flex-row">
                    <!-- Text Section -->
                    <div class="md:w-1/2 md:pr-6">
                        <h3 class="text-lg font-semibold mb-4">Bienvenido a tu página de recetas</h3>
                        <p class="mb-4">Aquí puedes explorar una variedad de recetas deliciosas y fáciles de seguir. Nuestra colección incluye desde aperitivos rápidos hasta postres exquisitos, todo diseñado para ayudarte a cocinar comidas increíbles en casa.</p>
                        <p class="mb-4">En nuestra página, encontrarás secciones dedicadas a diferentes tipos de cocina, ingredientes y niveles de dificultad. Además, ofrecemos consejos culinarios, trucos de cocina y noticias recientes sobre tendencias gastronómicas para mantenerte siempre inspirado.</p>
                        <p class="mb-6">¡Sumérgete en el mundo de la gastronomía, descubre nuevas recetas y comparte tus propias creaciones con nuestra comunidad! Estamos aquí para hacer que tu experiencia culinaria sea única y emocionante.</p>
                    </div>

                    <!-- Carousel Section -->
                    <div x-data="{ activeSlide: 0, slides: 5 }" class="relative md:w-1/2" x-init="setInterval(() => { activeSlide = (activeSlide + 1) % slides }, 5000)">
                        <!-- Carousel Wrapper -->
                        <div class="relative h-64 overflow-hidden rounded-lg md:h-96">
                            <!-- Item 1 -->
                            <div x-show="activeSlide === 0" x-transition:enter="transition-opacity ease-out duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-in duration-500" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                                <img src="{{ asset('images/panadera1.jpg') }}" class="absolute block w-full h-full object-cover" alt="Panadera 1">
                            </div>
                            <!-- Item 2 -->
                            <div x-show="activeSlide === 1" x-transition:enter="transition-opacity ease-out duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-in duration-500" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                                <img src="{{ asset('images/pan2.jpg') }}" class="absolute block w-full h-full object-cover" alt="Pan 2">
                            </div>
                            <!-- Item 3 -->
                            <div x-show="activeSlide === 2" x-transition:enter="transition-opacity ease-out duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-in duration-500" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                                <img src="{{ asset('images/pan3.jpg') }}" class="absolute block w-full h-full object-cover" alt="Pan 3">
                            </div>
                            <!-- Item 4 -->
                            <div x-show="activeSlide === 3" x-transition:enter="transition-opacity ease-out duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-in duration-500" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                                <img src="{{ asset('images/pan4.avif') }}" class="absolute block w-full h-full object-cover" alt="Pan 4">
                            </div>
                            <!-- Item 5 -->
                            <div x-show="activeSlide === 4" x-transition:enter="transition-opacity ease-out duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-in duration-500" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                                <img src="{{ asset('images/pan5.jpg') }}" class="absolute block w-full h-full object-cover" alt="Pan 5">
                            </div>
                        </div>
                        <!-- Slider Indicators -->
                        <div class="absolute z-30 flex space-x-3 bottom-5 left-1/2 transform -translate-x-1/2">
                            <template x-for="i in slides" :key="i">
                                <button type="button" :class="{'bg-white': activeSlide === i-1, 'bg-gray-400': activeSlide !== i-1}" class="w-3 h-3 rounded-full" aria-label="Slide Indicator" @click="activeSlide = i-1"></button>
                            </template>
                        </div>
                        <!-- Slider Controls -->
                        <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" @click="activeSlide = activeSlide === 0 ? slides - 1 : activeSlide - 1">
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70">
                                <svg class="w-6 h-6 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                </svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" @click="activeSlide = (activeSlide + 1) % slides">
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70">
                                <svg class="w-6 h-6 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>
                    <!-- End of Carousel Section -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
