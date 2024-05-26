<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Animeku')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="icon" href="{{ asset('img/boy.png') }}" type="image/png">
    <style>
        .sticky-sidebar {
            position: -webkit-sticky;
            position: sticky;
            top: 0;
            height: 50vh; /* Sidebar penuh tinggi layar */
        }
        #scrollToTop {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none;
            background-color: #2779bd;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #scrollToTop:hover {
            background-color: #16549c;
        }

    </style>

<body class="bg-black text-white">

    @include('partials.navbar')

    <div class="container mx-auto my-8 px-4 bg-gray-800">
        @yield('detail')
    </div>

    <div class="container mx-auto my-8 px-4 flex bg-gray-800" style="max-width: 1200px;">
        <!-- Sidebar -->
        <div class="w-1/4 p-4 h-auto mr-2">
            @yield('sidebar')
        </div>

        <!-- Main Content -->
        <div class="w-3/4 p-4">
            <!-- Seasons Section -->
            <div class="my-8 ">
                @yield('seasons')
            </div>
            <!-- Recommendations Section -->
            <div class="my-8">
                @yield('recom')
            </div>
            <!-- Top Anime Section -->
            <div class="my-8">
                @yield('top')
            </div>
        </div>
    </div>

    @include('partials.footer')

    <button onclick="topFunction()" id="scrollToTop" title="Go to top">
        &#9650;
    </button>

    <script>
        // Get the button
        let mybutton = document.getElementById("scrollToTop");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction();
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }


    </script>


    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
