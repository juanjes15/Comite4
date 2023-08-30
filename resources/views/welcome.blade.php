<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CODES</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('/public/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700&display=swap"
        rel="stylesheet">



    <style>
        body {
            font-family: 'Nunito Sans', sans-serif;
        }

        /* Puedes añadir más estilos aquí si lo deseas */
        .bg-white {
            background-color: #fff;
        }

        /* Otros estilos... */
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    <style>
        .gradient {
            background: linear-gradient(90deg, #33d540 0%, #da9a51 100%);
        }
    </style>
</head>

<body class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">
    <!--Nav-->
    <nav id="header" class="fixed w-full z-30 top-0 text-white">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
            <div class="pl-4 flex items-center">
                <a class="toggleColour text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl"
                    href="#">
                    <!--Icon from: http://www.potlabicons.com/ -->
                    <svg class="h-14 fill-current inline" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512.005 512.005">
                        <path class="plane-take-off"
                            d=" M208.793 11.027 C 210.267 20.392,206.755 29.176,200.304 32.255 C 193.070 35.708,184.791 26.191,184.791 14.421 C 184.791 10.289,184.769 10.140,184.183 10.281 C 183.384 10.474,182.481 11.266,182.685 11.596 C 182.773 11.739,182.651 11.782,182.414 11.691 C 181.436 11.315,178.650 16.255,177.942 19.620 C 174.555 35.714,192.657 48.068,206.928 39.403 C 217.265 33.128,219.095 18.605,210.526 10.864 C 208.873 9.370,208.537 9.402,208.793 11.027 M185.703 48.269 C 184.924 48.370,180.524 49.441,178.327 50.066 C 177.951 50.173,177.643 50.373,177.643 50.511 C 177.643 50.648,177.403 50.747,177.110 50.731 C 176.545 50.700,171.607 52.553,171.118 52.980 C 170.959 53.118,170.637 53.232,170.403 53.232 C 169.994 53.232,169.140 53.569,166.540 54.756 C 165.871 55.061,164.707 55.473,163.954 55.672 C 163.202 55.870,162.517 56.127,162.433 56.243 C 162.222 56.537,155.719 58.099,154.708 58.099 C 154.240 58.099,153.961 58.230,154.066 58.400 C 154.171 58.569,154.055 58.624,153.799 58.526 C 153.549 58.431,152.550 58.518,151.578 58.720 C 150.605 58.923,149.262 59.121,148.593 59.160 C 147.924 59.200,146.213 59.324,144.791 59.436 C 143.369 59.549,140.745 59.696,138.959 59.764 C 137.174 59.832,135.257 59.964,134.701 60.057 C 134.144 60.150,132.935 60.286,132.015 60.359 C 124.476 60.957,120.591 65.323,120.629 73.156 C 120.670 81.795,124.810 87.222,132.950 89.307 C 143.106 91.909,152.361 83.529,149.920 73.942 C 149.834 73.607,150.928 73.325,154.829 72.672 C 161.863 71.497,162.443 71.313,174.762 66.372 C 185.594 62.027,191.128 61.431,193.074 64.398 C 193.764 65.451,193.897 78.663,193.998 156.140 C 194.072 212.411,194.068 212.624,192.950 212.624 C 192.459 212.624,189.790 213.829,189.506 214.179 C 189.422 214.282,189.046 214.463,188.669 214.580 C 188.293 214.698,187.985 214.930,187.985 215.095 C 187.985 215.261,187.857 215.318,187.701 215.222 C 187.279 214.961,183.561 218.771,182.762 220.284 C 181.535 222.607,180.057 226.427,179.871 227.757 L 179.689 229.049 196.841 229.013 C 206.274 228.994,214.350 228.891,214.787 228.785 L 215.581 228.593 215.006 226.170 C 213.388 219.348,209.065 214.662,202.394 212.497 L 200.834 211.991 200.645 210.254 C 199.807 202.530,200.274 66.190,201.144 64.581 C 203.003 61.147,209.931 62.192,223.070 67.888 C 231.585 71.580,241.716 74.221,247.363 74.221 C 247.496 74.221,247.605 75.046,247.605 76.055 C 247.605 89.322,265.529 95.084,273.731 84.454 C 279.325 77.203,277.547 65.704,270.300 62.263 C 266.986 60.689,266.172 60.542,259.028 60.229 C 241.706 59.469,237.870 58.674,223.878 52.937 C 211.296 47.779,206.134 46.974,200.419 49.278 L 197.401 50.495 195.659 49.856 C 190.798 48.075,189.198 47.820,185.703 48.269 M145.839 76.198 C 145.752 88.659,128.740 90.040,126.244 77.789 C 125.959 76.390,126.006 74.542,126.336 74.161 C 126.389 74.099,143.737 73.716,145.095 73.747 C 145.843 73.764,145.855 73.805,145.839 76.198 M270.481 74.829 C 271.574 76.175,271.146 81.118,269.788 82.820 C 263.997 90.079,252.552 86.131,252.358 76.806 C 252.291 73.626,251.538 73.864,261.318 73.973 L 269.864 74.069 270.481 74.829 M135.600 112.699 C 134.623 113.249,133.547 114.995,132.505 117.722 C 131.254 120.992,128.807 126.869,127.819 128.973 C 126.947 130.830,123.525 138.624,118.201 150.875 C 116.929 153.802,114.940 158.114,113.783 160.456 C 111.163 165.756,111.080 166.065,111.993 167.115 C 113.588 168.951,115.071 168.288,116.006 165.321 C 116.298 164.397,117.281 162.060,118.192 160.129 C 119.103 158.198,119.848 156.566,119.848 156.501 C 119.848 156.437,120.389 155.247,121.050 153.857 C 121.711 152.468,123.498 148.388,125.020 144.791 C 126.542 141.194,128.071 137.635,128.419 136.882 C 131.067 131.147,134.989 122.350,136.353 119.087 C 137.539 116.249,137.984 116.083,138.797 118.175 C 139.634 120.328,139.952 121.062,141.837 125.171 C 142.758 127.179,145.799 134.160,148.595 140.684 C 151.392 147.209,154.630 154.738,155.791 157.414 C 156.952 160.091,158.125 162.805,158.399 163.444 C 159.321 165.603,161.198 166.406,162.433 165.171 C 163.355 164.250,163.193 163.397,161.360 159.512 C 160.436 157.551,158.982 154.293,158.131 152.270 C 157.279 150.248,156.341 148.046,156.047 147.376 C 154.820 144.586,152.352 138.923,150.877 135.513 C 150.009 133.506,149.017 131.247,148.672 130.494 C 148.328 129.741,147.271 127.346,146.324 125.171 C 141.112 113.200,140.674 112.518,138.084 112.344 C 136.977 112.270,136.151 112.388,135.600 112.699 M257.407 113.384 C 256.804 113.903,256.077 115.087,255.493 116.502 C 254.975 117.757,254.302 119.331,253.998 120.000 C 253.694 120.669,252.868 122.586,252.164 124.259 C 251.459 125.932,250.704 127.711,250.488 128.213 C 250.271 128.715,249.479 130.563,248.727 132.319 C 247.157 135.987,246.082 138.370,244.301 142.123 C 243.609 143.584,243.042 144.847,243.042 144.931 C 243.042 145.070,240.886 149.785,240.324 150.876 C 240.194 151.128,239.162 153.523,238.029 156.199 C 235.573 162.005,233.880 165.798,231.945 169.827 C 230.173 173.517,230.400 175.209,232.668 175.209 C 233.972 175.209,234.619 174.231,236.899 168.821 C 239.221 163.311,241.988 156.847,242.433 155.894 C 244.401 151.672,247.219 145.382,249.177 140.837 C 250.510 137.741,251.993 134.319,252.473 133.232 C 255.581 126.186,257.707 121.217,258.461 119.240 C 259.810 115.701,259.679 115.548,263.836 125.475 C 267.652 134.587,268.628 136.882,269.916 139.772 C 274.143 149.261,275.623 152.634,278.458 159.240 C 280.181 163.255,281.682 166.833,281.794 167.190 C 282.439 169.257,284.628 170.057,285.909 168.694 C 286.859 167.682,285.679 164.429,280.107 152.700 C 279.591 151.612,278.379 148.875,277.415 146.616 C 276.451 144.357,275.219 141.551,274.678 140.380 C 273.045 136.848,267.681 124.731,267.681 124.574 C 267.681 124.494,267.349 123.704,266.944 122.817 C 266.538 121.931,265.915 120.467,265.559 119.563 C 264.947 118.010,264.216 116.328,263.223 114.187 C 262.364 112.333,259.146 111.889,257.407 113.384 M355.589 114.817 C 353.769 115.503,350.871 117.155,350.955 117.459 C 351.000 117.617,350.853 117.707,350.630 117.657 C 350.157 117.552,347.985 118.658,347.985 119.005 C 347.985 119.134,347.779 119.240,347.528 119.240 C 346.823 119.240,344.291 120.917,344.556 121.208 C 344.685 121.350,344.641 121.381,344.457 121.276 C 343.976 121.002,340.023 123.166,340.271 123.568 C 340.385 123.753,340.333 123.809,340.152 123.697 C 339.791 123.474,337.644 124.537,336.723 125.395 C 336.392 125.703,336.117 125.847,336.112 125.715 C 336.107 125.583,335.936 125.681,335.732 125.932 C 335.528 126.183,334.848 126.625,334.221 126.915 C 333.593 127.205,333.080 127.605,333.080 127.802 C 333.080 128.000,332.993 128.075,332.886 127.968 C 332.779 127.862,332.313 128.044,331.850 128.374 C 331.388 128.704,330.859 128.973,330.675 128.973 C 330.492 128.973,330.342 129.110,330.342 129.278 C 330.342 129.445,330.156 129.582,329.928 129.582 C 329.232 129.582,326.138 131.775,325.979 132.381 C 325.535 134.082,332.319 137.393,338.707 138.592 C 342.506 139.306,364.764 139.436,369.327 138.771 C 373.798 138.120,379.525 135.816,384.105 132.826 C 387.213 130.797,387.323 130.195,384.847 128.756 C 384.063 128.301,382.122 127.092,380.532 126.070 C 377.073 123.845,368.860 119.273,363.215 116.430 C 358.851 114.232,357.756 114.000,355.589 114.817 M39.027 122.266 C 37.619 122.779,35.704 123.669,33.916 124.641 C 33.582 124.822,32.213 125.476,30.875 126.093 C 29.536 126.711,27.688 127.664,26.768 128.212 C 25.848 128.761,22.649 130.628,19.658 132.361 C 16.668 134.095,13.789 135.787,13.261 136.122 C 12.733 136.456,11.861 137.004,11.323 137.338 C 8.853 138.876,11.562 142.211,16.274 143.431 C 21.181 144.702,51.840 145.159,57.592 144.047 C 62.863 143.028,69.658 139.636,69.658 138.025 C 69.658 137.382,66.136 134.809,62.475 132.777 C 61.657 132.323,60.852 131.842,60.684 131.709 C 59.979 131.147,48.567 124.741,45.922 123.423 C 42.466 121.700,41.175 121.484,39.027 122.266 M355.206 141.981 L 342.824 142.060 342.633 142.819 C 341.691 146.574,344.480 154.446,347.622 156.899 C 357.900 164.926,370.739 158.738,370.912 145.675 C 370.958 142.163,370.705 141.690,368.844 141.816 C 368.153 141.863,362.016 141.937,355.206 141.981 M28.746 147.491 C 27.636 147.729,27.295 149.487,27.440 154.238 C 27.756 164.627,38.713 170.824,47.359 165.504 C 48.583 164.751,52.254 161.262,52.101 160.997 C 51.983 160.794,52.797 159.087,53.012 159.087 C 53.153 159.087,53.198 158.975,53.113 158.838 C 53.028 158.700,53.144 158.231,53.370 157.794 C 53.597 157.358,53.710 156.929,53.621 156.841 C 53.533 156.752,53.562 156.435,53.684 156.135 C 53.995 155.377,53.857 152.022,53.417 149.661 L 53.050 147.686 51.848 147.473 C 50.355 147.208,29.996 147.224,28.746 147.491 M351.562 165.952 C 349.933 166.175,348.085 166.509,347.456 166.695 C 346.827 166.880,345.909 167.105,345.417 167.194 C 344.925 167.283,343.512 167.822,342.277 168.392 C 341.042 168.963,339.871 169.432,339.674 169.434 C 339.461 169.437,339.500 169.566,339.772 169.752 C 340.150 170.012,340.124 170.055,339.620 170.006 C 338.844 169.930,337.591 170.436,337.620 170.814 C 337.632 170.973,337.540 171.109,337.414 171.118 C 336.838 171.155,335.790 171.632,335.944 171.787 C 336.177 172.020,335.524 172.777,335.096 172.771 C 334.907 172.768,334.958 172.634,335.209 172.471 C 335.460 172.309,335.511 172.175,335.322 172.172 C 334.835 172.165,334.258 172.935,334.527 173.233 C 334.651 173.370,334.598 173.393,334.408 173.285 C 333.857 172.970,332.325 174.313,332.826 174.672 C 333.136 174.894,333.113 174.924,332.727 174.802 C 330.434 174.072,323.974 185.403,322.908 192.023 C 322.334 195.589,322.199 228.839,322.748 231.399 C 323.928 236.901,332.079 237.879,334.855 232.852 C 335.279 232.083,335.384 230.547,335.522 223.118 C 335.706 213.222,335.704 213.232,337.354 213.232 C 339.657 213.232,339.474 208.847,339.465 263.709 L 339.457 312.827 340.149 313.519 L 340.841 314.211 357.566 314.226 C 373.263 314.239,374.316 314.207,374.700 313.698 C 375.039 313.249,375.066 309.979,374.855 294.601 C 374.591 275.304,374.640 211.684,374.921 209.971 C 375.329 207.482,378.063 206.187,379.211 207.938 C 379.677 208.650,379.721 209.797,379.650 219.628 C 379.560 232.328,379.596 232.535,382.245 234.215 C 385.739 236.430,389.953 234.989,391.516 231.045 C 392.257 229.176,392.602 196.134,391.924 191.944 C 388.992 173.814,372.365 163.107,351.562 165.952 M39.392 173.112 C 24.118 173.938,11.754 182.686,7.849 195.430 C 6.010 201.433,5.932 202.559,5.932 223.118 L 5.932 241.673 6.762 243.249 C 8.733 246.986,13.235 247.634,16.533 244.654 C 17.227 244.027,17.734 243.511,17.659 243.506 C 17.474 243.495,18.361 241.522,18.553 241.518 C 18.813 241.513,19.011 235.941,19.011 228.669 C 19.011 224.863,19.122 221.749,19.257 221.749 C 19.393 221.749,19.422 221.618,19.323 221.457 C 18.761 220.547,20.435 219.614,21.735 220.113 C 23.165 220.661,23.118 219.068,23.118 266.837 C 23.118 306.029,23.175 311.733,23.571 312.298 C 24.023 312.944,24.044 312.945,40.283 312.937 L 56.542 312.930 57.244 312.182 C 57.800 311.590,57.942 311.106,57.924 309.862 C 57.703 294.667,57.868 223.700,58.126 223.390 C 58.306 223.173,58.364 222.715,58.256 222.372 C 58.136 221.996,58.194 221.749,58.400 221.749 C 58.589 221.749,58.664 221.621,58.567 221.464 C 58.470 221.307,58.633 221.037,58.929 220.864 C 59.225 220.692,59.331 220.545,59.163 220.537 C 58.650 220.513,59.737 219.934,60.304 219.929 C 60.597 219.926,60.837 220.069,60.837 220.246 C 60.837 220.423,60.700 220.484,60.532 220.380 C 60.365 220.277,60.228 220.352,60.228 220.547 C 60.228 220.750,60.440 220.820,60.723 220.712 C 61.924 220.251,62.033 221.139,62.044 231.448 C 62.054 242.313,62.162 243.130,63.795 244.764 C 67.248 248.216,72.642 247.064,74.284 242.524 C 74.484 241.972,74.722 241.521,74.814 241.521 C 75.393 241.522,74.614 198.714,73.997 196.654 C 70.088 183.600,59.445 174.566,46.707 173.489 C 45.444 173.382,44.411 173.178,44.411 173.035 C 44.411 172.892,44.308 172.796,44.183 172.821 C 44.057 172.846,41.901 172.977,39.392 173.112 M166.956 187.822 C 166.857 187.921,153.351 187.998,136.942 187.994 C 120.533 187.989,107.044 188.088,106.966 188.214 C 106.021 189.743,111.426 196.436,115.909 199.290 C 129.635 208.027,145.697 208.378,158.290 200.219 C 160.304 198.914,160.710 198.606,162.930 196.707 C 165.296 194.683,169.382 187.471,167.825 188.069 C 167.558 188.171,167.294 188.117,167.238 187.949 C 167.182 187.780,167.055 187.723,166.956 187.822 M287.688 194.537 C 287.556 194.659,254.247 194.961,239.792 194.971 L 226.656 194.981 226.803 195.789 C 227.107 197.466,228.454 199.305,231.916 202.765 C 243.617 214.466,265.933 216.424,279.188 206.915 C 284.511 203.095,290.293 196.379,289.443 195.002 C 289.293 194.759,287.859 194.379,287.688 194.537 M158.479 239.741 C 157.894 239.904,157.277 240.201,157.109 240.399 C 156.941 240.598,156.600 240.806,156.352 240.861 C 156.103 240.916,155.814 241.099,155.710 241.267 C 155.606 241.435,155.400 241.558,155.251 241.540 C 154.745 241.478,153.004 242.570,153.004 242.949 C 153.004 243.157,152.816 243.255,152.587 243.167 C 152.357 243.079,151.957 243.220,151.696 243.481 C 151.435 243.741,151.076 243.954,150.896 243.954 C 150.717 243.954,150.570 244.114,150.570 244.309 C 150.570 244.504,150.479 244.573,150.368 244.461 C 150.185 244.279,149.288 244.721,145.247 246.984 C 144.578 247.359,143.483 247.960,142.814 248.319 C 142.144 248.679,141.416 249.144,141.195 249.354 C 140.974 249.563,140.598 249.734,140.359 249.734 C 140.120 249.734,139.924 249.871,139.924 250.038 C 139.924 250.205,139.728 250.342,139.489 250.342 C 139.250 250.342,138.874 250.520,138.653 250.738 C 138.432 250.956,137.635 251.433,136.882 251.798 C 136.129 252.162,135.120 252.802,134.640 253.218 C 134.159 253.634,133.475 254.064,133.119 254.172 C 132.280 254.427,131.379 255.222,131.573 255.536 C 131.656 255.670,131.473 255.762,131.167 255.739 C 130.482 255.687,128.304 256.993,128.512 257.330 C 128.595 257.464,128.433 257.555,128.151 257.532 C 127.870 257.509,127.466 257.832,127.252 258.250 C 126.444 259.836,125.696 259.792,152.109 259.703 C 165.567 259.657,196.357 259.620,220.532 259.620 C 252.317 259.620,264.645 259.526,265.060 259.281 C 265.673 258.918,265.644 258.874,263.726 257.221 C 263.475 257.005,261.422 255.691,259.163 254.301 C 256.905 252.912,254.578 251.474,253.992 251.106 C 253.407 250.738,251.901 249.843,250.646 249.117 C 249.392 248.392,248.134 247.604,247.852 247.367 C 247.570 247.130,247.172 247.040,246.968 247.165 C 246.761 247.294,246.676 247.268,246.776 247.107 C 246.874 246.948,243.918 245.182,240.207 243.181 L 233.460 239.544 196.502 239.493 C 173.160 239.461,159.151 239.553,158.479 239.741 " />
                    </svg>
                    COES
                </a>
            </div>
            <div class="block lg:hidden pr-4">
                <button id="nav-toggle"
                    class="flex items-center p-1 text-pink-800 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                    <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                    </svg>
                </button>
            </div>
            <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-white lg:bg-transparent text-black p-4 lg:p-0 z-20"
                id="nav-content">
                @if (Route::has('login'))
                    @auth
                        <ul class="list-reset lg:flex justify-end flex-1 items-center">
                            <li class="mr-3">
                                <a href="{{ url('/dashboard') }}" id="navAction"
                                    class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                    Dashboard
                                </a>
                            </li>
                        </ul>
                    @else
                        <ul class="list-reset lg:flex justify-end flex-1 items-center">

                        </ul>
                        <a href="{{ route('login') }}" id="navAction"
                            class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                            Iniciar sesión
                        </a>
                    @endauth
                @endif
            </div>

        </div>
        <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
    </nav>



    <!--Hero-->
    <div class="pt-24">
        <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
            <!--Left Col-->
            <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
                <p class="uppercase tracking-loose w-full">ADSO 2504591 Presenta:</p>
                <h1 class="my-4 text-5xl font-bold leading-tight">
                    Comité de Evaluación y seguimiento COES
                </h1>
                <p class="leading-normal text-2xl mb-8">
                    Software para la gestion completa de los comites en la Regional Caldas
                </p>
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                        Dashboard
                    </a>
                @endauth
            </div>
            <!--Right Col (Logo)-->
            <div class="w-full md:w-3/5 py-6 text-center flex justify-center items-center">
                <img id="logo" class="w-1/2 md:w-4/4 z-50" src="{{ asset('img/icon.png') }}" />

            </div>
        </div>
    </div>
    <div class="relative -mt-12 lg:-mt-24">
        <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <path
                        d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496"
                        opacity="0.100000001"></path>
                    <path
                        d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                        opacity="0.100000001"></path>
                    <path
                        d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z"
                        id="Path-4" opacity="0.200000003"></path>
                </g>
                <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <path
                        d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z">
                    </path>
                </g>
            </g>
        </svg>
    </div>
    <footer class="bg-white text-black font-nunito-sans">
        <div class="container mx-auto px-8 py-12">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <!-- Logo Section -->
                <div class="flex-shrink-0 text-black">
                    <div class="logo-title flex items-center">
                        <img src="{{ asset('/logo/logoSena.png') }}" alt=""
                            style="width: 64px; border-radius: 50%; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);">
                        <p class="ml-4 font-bold text-xl">Servicio Nacional de Aprendizaje SENA</p>
                    </div>
                    <hr class="horizontal-divider" style="background-color: #ccc;">
                </div>

                <div class="flex-1 ml-12">
                    <div class="block-container">
                        <h2 class="uppercase text-gray-500 mb-4">Puntos de atención <i
                                class="fas fa-phone-alt ml-2"></i></h2>
                        <hr class="w-16 border-gray-500 mb-4">
                        <div style="color: black;">
                            <strong>Contactos</strong><br>
                            <li>Línea nacional, exclusiva para comunicarse con un servidor público SENA: +(57) 601
                                5461500</li>
                            <li>Línea de atención al empresario: Bogotá +(57) 601 3430101 - Línea gratuita y resto del
                                país 018000 910682</li>
                            <li>Línea de atención al ciudadano: Bogotá +(57) 601 3430111 - Línea gratuita y resto del
                                país 018000 910270</li>
                        </div>
                    </div>
                </div>
                <div class="flex-1 ml-12">
                    <div class="block-container">
                        <h2 class="uppercase text-gray-500 mb-4">DIRECCIÓN GENERAL <i
                                class="fas fa-map-marker-alt ml-2"></i></h2>
                        <hr class="w-16 border-gray-500 mb-4">
                        <div style="color: black;">
                            <strong>Logo decorativo certificaciones ISO</strong><br>
                            <i class="fas fa-map-marker-alt"></i> Calle 57 No. 8 - 69<br>
                            Bogotá D.C. (Cundinamarca), Colombia<br>
                            El SENA brinda a la ciudadanía, atención presencial en las 33 Regionales y 117 Centros
                        </div>
                    </div>
                </div>

                <div class="flex-1 ml-12">
                    <div class="block-container">
                        <h2 class="uppercase text-gray-500 mb-4">OTROS</h2>
                        <hr class="w-16 border-gray-500 mb-4">
                        <ul class="list-reset ml-6" style="color: black;">
                            <li><i class="fas fa-chevron-right mr-2"></i><a
                                    href="https://www.sena.edu.co/es-co/sena/Paginas/directorio.aspx"
                                    style="color: blue;">Directorio SENA</a></li>
                            <li><i class="fas fa-chevron-right mr-2"></i><a
                                    href="https://sciudadanos.sena.edu.co/SolicitudIndex.aspx"
                                    style="color: blue;">PQRS</a></li>
                            <li><i class="fas fa-chevron-right mr-2"></i><a
                                    href="https://www.sena.edu.co/es-co/ciudadano/Paginas/chat.aspx"
                                    style="color: blue;">Chat en línea</a></li>
                            <li><i class="fas fa-chevron-right mr-2"></i><a
                                    href="https://www.sena.edu.co/es-co/ciudadano/Paginas/Denuncias_Corrupcion.aspx"
                                    style="color: blue;">Denuncias por actos de corrupción</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <hr class="w-full my-8 border-gray-500">

        <!-- Social Section -->
        <div class="flex justify-center items-center mb-8">
            <a href="{{ url('https://www.facebook.com/SENA/') }}" target="_blank"
                style="color: black; font-size: 24px; margin: 5px;">
                <i class="fab fa-facebook"></i>
            </a>
            <a href="{{ url('https://twitter.com/SENAComunica') }}" target="_blank"
                style="color: black; font-size: 24px; margin: 5px;">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="{{ url('https://www.instagram.com/senacomunica/') }}" target="_blank"
                style="color: black; font-size: 24px; margin: 5px;">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="{{ url('https://www.linkedin.com/school/servicio-nacional-de-aprendizaje-sena-/') }}"
                target="_blank" style="color: black; font-size: 24px; margin: 5px;">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="{{ url('https://www.youtube.com/user/SENATV') }}" target="_blank"
                style="color: black; font-size: 24px; margin: 5px;">
                <i class="fab fa-youtube"></i>
            </a>
        </div>

        <div class="bg-gradient-to-r from-green-500 to-blue-500 w-full p-4 rounded-lg">
            <div class="container mx-auto px-8 text-center flex flex-wrap justify-between">
                <p class="text-white text-sm md:w-1/2">&copy; 2023 Servicio Nacional de Aprendizaje SENA. Todos los
                    derechos reservados</p>
                <p class="text-white text-sm md:w-1/2">Política de privacidad - Términos y condiciones</p>
            </div>
        </div>


    </footer>

    <!-- jQuery if you need it
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      -->
    <script>
        var scrollpos = window.scrollY;
        var header = document.getElementById("header");
        var navcontent = document.getElementById("nav-content");
        var navaction = document.getElementById("navAction");
        var brandname = document.getElementById("brandname");
        var toToggle = document.querySelectorAll(".toggleColour");

        document.addEventListener("scroll", function() {
            /Apply classes for slide in bar/
            scrollpos = window.scrollY;

            if (scrollpos > 10) {
                header.classList.add("bg-white");
                navaction.classList.remove("bg-white");
                navaction.classList.add("gradient");
                navaction.classList.remove("text-gray-800");
                navaction.classList.add("text-white");
                //Use to switch toggleColour colours
                for (var i = 0; i < toToggle.length; i++) {
                    toToggle[i].classList.add("text-gray-800");
                    toToggle[i].classList.remove("text-white");
                }
                header.classList.add("shadow");
                navcontent.classList.remove("bg-gray-100");
                navcontent.classList.add("bg-white");
            } else {
                header.classList.remove("bg-white");
                navaction.classList.remove("gradient");
                navaction.classList.add("bg-white");
                navaction.classList.remove("text-white");
                navaction.classList.add("text-gray-800");
                //Use to switch toggleColour colours
                for (var i = 0; i < toToggle.length; i++) {
                    toToggle[i].classList.add("text-white");
                    toToggle[i].classList.remove("text-gray-800");
                }

                header.classList.remove("shadow");
                navcontent.classList.remove("bg-white");
                navcontent.classList.add("bg-gray-100");
            }
        });
    </script>
    <script>
        /Toggle dropdown list/ /
        https: //gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8/

            var navMenuDiv = document.getElementById("nav-content");
        var navMenu = document.getElementById("nav-toggle");

        document.onclick = check;

        function check(e) {
            var target = (e && e.target) || (event && event.srcElement);

            //Nav Menu
            if (!checkParent(target, navMenuDiv)) {
                // click NOT on the menu
                if (checkParent(target, navMenu)) {
                    // click on the link
                    if (navMenuDiv.classList.contains("hidden")) {
                        navMenuDiv.classList.remove("hidden");
                    } else {
                        navMenuDiv.classList.add("hidden");
                    }
                } else {
                    // click both outside link and outside menu, hide menu
                    navMenuDiv.classList.add("hidden");
                }
            }
        }

        function checkParent(t, elm) {
            while (t.parentNode) {
                if (t == elm) {
                    return true;
                }
                t = t.parentNode;
            }
            return false;
        }
    </script>
    <script>
        var prevScrollpos = window.pageYOffset;
        var logo = document.getElementById("logo");

        window.onscroll = function() {
            var currentScrollPos = window.pageYOffset;
            if (prevScrollpos > currentScrollPos) {
                logo.style.opacity = "1";
            } else {
                logo.style.opacity = "0";
            }
            prevScrollpos = currentScrollPos;
        };
    </script>


</body>

</html>
