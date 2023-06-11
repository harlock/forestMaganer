<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/tailwindcss">
        @layer utilities {
            .content-auto {
                content-visibility: auto;
            }
        }
    </style>
</head>
<body>
<div class="lg:content-auto">
    <div class="bg-white min-h-full flex flex-col lg:relative">
        <div class="flex-grow flex flex-col">
            <main class="flex-grow flex flex-col bg-white">
                <div class="flex-grow mx-auto max-w-7xl w-full flex flex-col px-4 sm:px-6 lg:px-8">
                    <div class="flex-shrink-0 pt-10 sm:pt-16">
                        <a href="/" class="inline-flex">
                            <span class="sr-only">Workflow</span>
                            <img class="h-12 w-auto"
                                 src="https://tailwindui.com/img/logos/workflow-mark.svg?color=indigo&shade=600" alt="">
                        </a>
                    </div>
                    <div class="flex-shrink-0 my-auto py-16 sm:py-32">
                        <p class="text-sm font-semibold text-indigo-600 uppercase tracking-wide">404 error</p>
                        <h1 class="mt-2 text-4xl font-extrabold text-gray-900 tracking-tight sm:text-5xl">Page not
                            found</h1>
                        <p class="mt-2 text-base text-gray-500">Sorry, we couldn’t find the page you’re looking for.</p>
                        <div class="mt-6">
                            <a href="#" class="text-base font-medium text-indigo-600 hover:text-indigo-500">Go back
                                home<span aria-hidden="true"> &rarr;</span></a>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="flex-shrink-0 bg-gray-50">
                <div class="mx-auto max-w-7xl w-full px-4 py-16 sm:px-6 lg:px-8">
                    <nav class="flex space-x-4">
                        <a href="#" class="text-sm font-medium text-gray-500 hover:text-gray-600">Contact Support</a>
                        <span class="inline-block border-l border-gray-300" aria-hidden="true"></span>
                        <a href="#" class="text-sm font-medium text-gray-500 hover:text-gray-600">Status</a>
                        <span class="inline-block border-l border-gray-300" aria-hidden="true"></span>
                        <a href="#" class="text-sm font-medium text-gray-500 hover:text-gray-600">Twitter</a>
                    </nav>
                </div>
            </footer>
        </div>
        <div class="hidden lg:block lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img class=" inset-0 h-full w-full object-cover"
                 src="{{asset("images/404.svg")}}"
                 alt="">
        </div>
    </div>
</div>
</body>
</html>





<!--</editor-fold>-->