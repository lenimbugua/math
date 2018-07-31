<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
     <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
   
    {{-- <script type="text/javascript">
        var dataUri = "{{ url('orders')}}";
    </script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
   @include('includes.messages')
    @yield('content') 

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script> 
    <script >
        function calculateCost(){
        // y = 88x +19;
        let y = 0;
        let e = document.getElementById('academiclevel');   
        let x = e.options[e.selectedIndex].value;

        if (x==='0'){
            document.getElementById('totalcost').innerHTML = "$ 00.00";
        }
        else{
           
            y = (88*x) + 19;
            console.log( '$ '+y);
            document.getElementById('totalcost').innerHTML = "$ "+y+".00";
            document.getElementById("hiddentotalcost").value = y;
        }
        

}
    </script>
</body>
</html>
