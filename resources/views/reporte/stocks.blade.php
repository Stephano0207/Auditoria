@extends('plantilla.plantilla')
@section('encabezado')
    Reporte Productos
@endsection
@section('css')
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script type="text/javascript">
 
    function r() {
     
    
      const i=  document.querySelector('#c1');
      const p=  i.getAttribute('class');
     
      const c1 = document.querySelector('#c1');
      const c2= document.querySelector('#titulo');
    
      const nav= document.querySelector('#nav');
      const pie= document.querySelector('#pie');
     
   
       if (p==="content") {
        c1.removeAttribute('class');
      c2.removeAttribute('class');
   
      nav.removeAttribute('class');
  
    
        c1.setAttribute('class', 'content  bg-dark text-white');
        c2.setAttribute('class', 'content-header  bg-dark text-white');
       
        nav.setAttribute('class','main-header navbar navbar-expand navbar-white navbar-light navbar navbar-dark bg-dark');
        pie.setAttribute('class','main-footer  bg-dark text-white');
        
        


    }else{
        c1.removeAttribute('class');
      c2.removeAttribute('class');
     

        c1.setAttribute('class', 'content');
        c2.setAttribute('class', 'content-header');
       
       
        nav.setAttribute('class','main-header navbar navbar-expand navbar-white navbar-light');
        pie.setAttribute('class','main-footer')

    }
 

      
    }

</script>

@endsection
@section('titulo')
   Reporte de Productos 
@endsection

@section('contenido')
        

<div class="row">
    <div class="col">
    <figure class="highcharts-figure">
        <div id="container"></div>
        <p class="highcharts-description">
         
        </p>
      </figure>
    </div>
</div>
@endsection


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
-->




@section('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script >
    Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: " {{$fecha_actual}}",
        align: 'left'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'cantidad',
        data: <?= $data ?>
    }] 
});
    </script>
@endsection

