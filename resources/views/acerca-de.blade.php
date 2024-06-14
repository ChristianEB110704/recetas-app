<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Especificaciones del Proyecto') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-12">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <h3 class="text-lg font-semibold mb-4">¡Bienvenido a nuestra comunidad de panadería y repostería!</h3>
                        <p class="mb-4">En esta página, nos hemos propuesto compartir nuestra pasión por la cocina y la creatividad culinaria contigo. Creamos este espacio como un lugar de encuentro para amantes del pan y los dulces, donde puedas encontrar inspiración, aprender nuevas técnicas y compartir tus propias creaciones.</p>
                        <p class="mb-4">Nos apasiona la idea de que todos, desde principiantes hasta expertos, puedan explorar el mundo de la panadería y la repostería de una manera divertida y accesible. Ya sea que estés buscando recetas clásicas para mimar a tu familia o desafíos culinarios para impresionar a tus amigos, aquí encontrarás un lugar donde puedes experimentar libremente y desarrollar tus habilidades.</p>
                        <p class="mb-4">Además, creemos en la importancia de compartir conocimientos y experiencias. Esta página no solo se trata de recetas y técnicas, sino también de historias, tradiciones y culturas que rodean al mundo de la cocina. Queremos crear una comunidad donde podamos aprender unos de otros y celebrar nuestra pasión común por la comida.</p>
                        <p class="mb-4">¡Gracias por unirte a nosotros en esta emocionante aventura gastronómica! Esperamos que disfrutes explorando nuestras recetas, compartiendo tus propias creaciones y siendo parte de nuestra vibrante comunidad.</p>
                        <p class="mb-4">Con amor y mucha miga,</p>
                        <p class="mb-4">Christian Expósito</p>
                    </div>

                    <h3 class="text-lg font-bold mb-4 text-gray-900 dark:text-gray-100">Especificaciones del Proyecto</h3>
                    <table class="min-w-full bg-white dark:bg-gray-800">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 bg-gray-200 dark:bg-gray-700 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase">Elemento</th>
                                <th class="py-2 px-4 bg-gray-200 dark:bg-gray-700 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase">Descripción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border-t border-gray-200 dark:border-gray-700 py-2 px-4 text-gray-900 dark:text-gray-100">Nombre del Desarrollador</td>
                                <td class="border-t border-gray-200 dark:border-gray-700 py-2 px-4 text-gray-900 dark:text-gray-100">Christian Expósito</td>
                            </tr>
                            <tr class="bg-gray-50 dark:bg-gray-900">
                                <td class="border-t border-gray-200 dark:border-gray-700 py-2 px-4 text-gray-900 dark:text-gray-100">Correo Electrónico</td>
                                <td class="border-t border-gray-200 dark:border-gray-700 py-2 px-4 text-gray-900 dark:text-gray-100">christian.ex.ba110704@gmail.com</td>
                            </tr>
                            <tr>
                                <td class="border-t border-gray-200 dark:border-gray-700 py-2 px-4 text-gray-900 dark:text-gray-100">Lenguaje de Programación</td>
                                <td class="border-t border-gray-200 dark:border-gray-700 py-2 px-4 text-gray-900 dark:text-gray-100">PHP, JS</td>
                            </tr>
                            <tr class="bg-gray-50 dark:bg-gray-900">
                                <td class="border-t border-gray-200 dark:border-gray-700 py-2 px-4 text-gray-900 dark:text-gray-100">Framework</td>
                                <td class="border-t border-gray-200 dark:border-gray-700 py-2 px-4 text-gray-900 dark:text-gray-100">Laravel</td>
                            </tr>
                            <tr>
                                <td class="border-t border-gray-200 dark:border-gray-700 py-2 px-4 text-gray-900 dark:text-gray-100">CSS Framework</td>
                                <td class="border-t border-gray-200 dark:border-gray-700 py-2 px-4 text-gray-900 dark:text-gray-100">Tailwind CSS</td>
                            </tr>
                            <tr class="bg-gray-50 dark:bg-gray-900">
                                <td class="border-t border-gray-200 dark:border-gray-700 py-2 px-4 text-gray-900 dark:text-gray-100">JavaScript Framework</td>
                                <td class="border-t border-gray-200 dark:border-gray-700 py-2 px-4 text-gray-900 dark:text-gray-100">Alpine.js</td>
                            </tr>
                            <tr class="bg-gray-50 dark:bg-gray-900">
                                <td class="border-t border-gray-200 dark:border-gray-700 py-2 px-4 text-gray-900 dark:text-gray-100">Plantillas</td>
                                <td class="border-t border-gray-200 dark:border-gray-700 py-2 px-4 text-gray-900 dark:text-gray-100">Plantillas PHP Blade</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>