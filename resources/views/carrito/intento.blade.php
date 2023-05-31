
<!DOCTYPE html>

<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ESTRELLA'S</title>
    <!-- component -->
   
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">




</head>
<body>

<!-- component -->
<div class="w-full">
    <nav class="bg-white shadow-lg">
        <div class="md:flex items-center justify-between py-2 px-8 md:px-12">
            <div class="flex justify-between items-center">
               <div class="text-2xl font-bold text-gray-800 md:text-3xl">
                    <a href="#">Estrella's Store</a>
               </div>
                <div class="md:hidden">
                    <button type="button" class="block text-gray-800 hover:text-gray-700 focus:text-gray-700 focus:outline-none">
                        <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                            <path class="hidden" d="M16.24 14.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 0 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12l2.83 2.83z"/>
                            <path d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="flex flex-col md:flex-row hidden md:block -mx-2">
                <a href="{{route('home')}}" class="text-gray-800 rounded hover:bg-gray-900 hover:text-gray-100 hover:font-medium py-2 px-2 md:mx-2">Inicio</a>
                <a href="{{route('login')}}" class="text-gray-800 rounded hover:bg-gray-900 hover:text-gray-100 hover:font-medium py-2 px-2 md:mx-2">Iniciar Sesión</a>
            </div>
        </div>
    </nav>
   
</div>

<br>

<div class="w-full">
    <div class="row" id="cards"></div>
    <hr>
    
</div>
<br>




<div class="flex mb-4">
    <div class="w-5/6 p-2 text-center bg-white-400">
        <div class="card">
        <h2>Listado de Compras</h2>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Item</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Acción</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody id="items"></tbody>
            <tfoot>
              <tr id="footer">
                <th scope="row" colspan="5">Carrito vacío - comience a comprar!</th>
              </tr>
            </tfoot>
          </table>
    
        </div>
    
    </div>
    <div class="w-1/6 p-2 text-center bg-white-500 ">

        <div class="card">
            <label for="form_name">First name:</label><br>
            <input type="text" id="form_name" name="name"><br>
            <label for="form_surname">Last name:</label><br>
            <input type="text" id="form_surname" name="surname"><br><br>
            <button  class="btn btn-primary" onclick=';'><a style="color: white; font-weight:bold" href="{{route('venta.index')}}">
            Comprar Carrito</a> </button>
        </div>
           
      
        
    </div>
</div>



<template id="template-footer">
    <th scope="row" colspan="2">Total productos</th>
    <td>10</td>
    <td>
        <button class="btn btn-danger btn-sm" id="vaciar-carrito">
            vaciar todo
        </button>
    </td>
    <td class="font-weight-bold">$ <span>5000</span></td>
</template>

<template id="template-carrito">
  <tr>
    <th scope="row">id</th>
    <td>Café</td>
    <td>1</td>
    <td>
        <button class="btn btn-info btn-sm">
            +
        </button>
        <button class="btn btn-danger btn-sm">
            -
        </button>
    </td>
    <td>$ <span>500</span></td>
  </tr>
</template>

<template id="template-card">
    <div class="col-12 mb-2 col-md-3 d-flex justify-content-center">
      <div class="card ">
        <img style="width: 180px" src="" class="card-img-top" alt="">
        <div class="card-body">
          <h5>Titulo</h5>
          <p>precio</p>
          <button class="btn btn-dark">Comprar</button>
        </div>
      </div>
    </div>
</template>
</div>


<!-- component -->
<footer class="w-auto p-4 bottom-0 h-auto relative bg-gray-600 ">
    <div class="lg:flex  lg:mt-3 md:mx-12 lg:mx-28 lg:justify-between">
        <div class="mb-4 lg:columns-1 w-96">
            <p class="text-white font-bold mb-1 mt-3">Comunícate con nosotros</p>
            <p class="text-gray-200 text-sm">Lima y Provincias: (01) 625 8000
            </p>
        </div>
        <div class="mb-4  lg:mt-3">
            <h3 class="text-white font-bold mb-2 lg:mb-4"> Redes Sociales</h3>
            <div class="">
                <div class=" flex lg:items-center ">
                    <div class="lg:container lg:max-w-screen-lg ">
                        <div>
                            <div class="lg:flex lg:flex-wrap gap-2 ">
                                
                                <a href="">
                                    <button
                                        class="bg-gray-700 hover:bg-white hover:text-black  p-2 font-semibold text-white inline-flex items-center space-x-2 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                            role="img" class="w-5" preserveAspectRatio="xMidYMid meet"
                                            viewBox="0 0 24 24">
                                            <g fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385c.6.105.825-.255.825-.57c0-.285-.015-1.23-.015-2.235c-3.015.555-3.795-.735-4.035-1.41c-.135-.345-.72-1.41-1.23-1.695c-.42-.225-1.02-.78-.015-.795c.945-.015 1.62.87 1.845 1.23c1.08 1.815 2.805 1.305 3.495.99c.105-.78.42-1.305.765-1.605c-2.67-.3-5.46-1.335-5.46-5.925c0-1.305.465-2.385 1.23-3.225c-.12-.3-.54-1.53.12-3.18c0 0 1.005-.315 3.3 1.23c.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23c.66 1.65.24 2.88.12 3.18c.765.84 1.23 1.905 1.23 3.225c0 4.605-2.805 5.625-5.475 5.925c.435.375.81 1.095.81 2.22c0 1.605-.015 2.895-.015 3.3c0 .315.225.69.825.57A12.02 12.02 0 0 0 24 12c0-6.63-5.37-12-12-12z"
                                                    fill="currentColor" />
                                            </g>
                                        </svg>
                                    </button>
                                </a>
                                <a href="">
                                    <button
                                        class="bg-blue-400 p-2 hover:bg-white hover:text-black font-semibold  text-white inline-flex items-center space-x-2 rounded">
                                        <svg class="w-5 h-5 fill-current" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path
                                                d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                                        </svg>
                                    </button>
                                </a>
                                <a href="">
                                    <button
                                        class="bg-red-500 p-2 hover:bg-white hover:text-black font-semibold text-white inline-flex items-center space-x-2 rounded">
                                        <svg class="w-5 h-5 fill-current" role="img" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0zm5.01 4.744c.688 0 1.25.561 1.25 1.249a1.25 1.25 0 0 1-2.498.056l-2.597-.547-.8 3.747c1.824.07 3.48.632 4.674 1.488.308-.309.73-.491 1.207-.491.968 0 1.754.786 1.754 1.754 0 .716-.435 1.333-1.01 1.614a3.111 3.111 0 0 1 .042.52c0 2.694-3.13 4.87-7.004 4.87-3.874 0-7.004-2.176-7.004-4.87 0-.183.015-.366.043-.534A1.748 1.748 0 0 1 4.028 12c0-.968.786-1.754 1.754-1.754.463 0 .898.196 1.207.49 1.207-.883 2.878-1.43 4.744-1.487l.885-4.182a.342.342 0 0 1 .14-.197.35.35 0 0 1 .238-.042l2.906.617a1.214 1.214 0 0 1 1.108-.701zM9.25 12C8.561 12 8 12.562 8 13.25c0 .687.561 1.248 1.25 1.248.687 0 1.248-.561 1.248-1.249 0-.688-.561-1.249-1.249-1.249zm5.5 0c-.687 0-1.248.561-1.248 1.25 0 .687.561 1.248 1.249 1.248.688 0 1.249-.561 1.249-1.249 0-.687-.562-1.249-1.25-1.249zm-5.466 3.99a.327.327 0 0 0-.231.094.33.33 0 0 0 0 .463c.842.842 2.484.913 2.961.913.477 0 2.105-.056 2.961-.913a.361.361 0 0 0 .029-.463.33.33 0 0 0-.464 0c-.547.533-1.684.73-2.512.73-.828 0-1.979-.196-2.512-.73a.326.326 0 0 0-.232-.095z" />
                                        </svg>
                                    </button>
                                </a>
                                <a href="">
                                    <button
                                        class="bg-blue-600 p-2 hover:bg-white hover:text-black font-semibold text-white inline-flex items-center space-x-2 rounded">
                                        <svg class="w-5 h-5 fill-current" role="img" viewBox="0 0 256 256"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path
                                                    d="M218.123122,218.127392 L180.191928,218.127392 L180.191928,158.724263 C180.191928,144.559023 179.939053,126.323993 160.463756,126.323993 C140.707926,126.323993 137.685284,141.757585 137.685284,157.692986 L137.685284,218.123441 L99.7540894,218.123441 L99.7540894,95.9665207 L136.168036,95.9665207 L136.168036,112.660562 L136.677736,112.660562 C144.102746,99.9650027 157.908637,92.3824528 172.605689,92.9280076 C211.050535,92.9280076 218.138927,118.216023 218.138927,151.114151 L218.123122,218.127392 Z M56.9550587,79.2685282 C44.7981969,79.2707099 34.9413443,69.4171797 34.9391618,57.260052 C34.93698,45.1029244 44.7902948,35.2458562 56.9471566,35.2436736 C69.1040185,35.2414916 78.9608713,45.0950217 78.963054,57.2521493 C78.9641017,63.090208 76.6459976,68.6895714 72.5186979,72.8184433 C68.3913982,76.9473153 62.7929898,79.26748 56.9550587,79.2685282 M75.9206558,218.127392 L37.94995,218.127392 L37.94995,95.9665207 L75.9206558,95.9665207 L75.9206558,218.127392 Z M237.033403,0.0182577091 L18.8895249,0.0182577091 C8.57959469,-0.0980923971 0.124827038,8.16056231 -0.001,18.4706066 L-0.001,237.524091 C0.120519052,247.839103 8.57460631,256.105934 18.8895249,255.9977 L237.033403,255.9977 C247.368728,256.125818 255.855922,247.859464 255.999,237.524091 L255.999,18.4548016 C255.851624,8.12438979 247.363742,-0.133792868 237.033403,0.000790807055">
                                                </path>
                                            </g>
                                        </svg>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:mt-3 mb-4">
            <h3 class="text-white font-bold mb-2 lg:mb-2">Métodos de Pago</h3>
            <div class="columns-2 md:columns-3 lg:columns-2">
                <a class="text-gray-200" href="">Visa</a><br>
                <a href="" class="text-gray-200">Mastercard</a><br>
                <a class="text-gray-200" href="">Paypal</a><br>
                <a class="text-gray-200" href="">Yape</a><br>
                <a href="" class="text-gray-200">Plin</a><br>
               
            </div>
        </div>
    </div>
    <div>
        <div class="flex justify-center mt-2">
            <p class="text-gray-400"> Copyright &copy;
                <script>document.write(new Date().getFullYear());</script> Todos los derechos reservados
            </p>
        </div>
    </div>
</footer>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
{{-- <script  src="/js/carrito.js"></script> --}}

</body>
   
</html>


