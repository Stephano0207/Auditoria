

const cards= document.getElementById('cards')
const items = document.getElementById('items')
const footer = document.getElementById('footer')

const templateCard = document.getElementById('template-card').content;
const fragment = document.createDocumentFragment()

const templateFooter= document.getElementById('template-footer').content
const templateCarrito = document.getElementById('template-carrito').content


let carrito ={}
var s=[]

document.addEventListener('DOMContentLoaded', () => {
    fetchData()
    if(localStorage.getItem('carrito')){
        carrito = JSON.parse(localStorage.getItem('carrito'))
       
    }
    if(localStorage.getItem('s')){
      s=JSON.parse(localStorage.getItem('s'))
    }
    pintarCarrito()
})

cards.addEventListener('click', e => {
    addCarrito(e)
})
items.addEventListener('click', e => {
    btnAccion(e)
})
    //preparacion del archivo .json
  //  const a= {!! json_encode($productos) !!} ;


const fetchData = async () => {
     
try {
  //le decimos que espere a que lea el api.json  con await
   const res=  await fetch('http://127.0.0.1:8000/api/json')
  // esperate tenemos que guardar la respuesta como json
   const data= await res.json()
  

   pintarCards(data)

} catch (error) {
 console.log(error)
}


}


const pintarCards = data => {
   data.forEach(producto =>{
 //console.log(producto)
 templateCard.querySelector('h5').textContent = producto.nombre
 templateCard.querySelector('p').textContent = producto.precio
 templateCard.querySelector('img').setAttribute('src','/images/'+producto.image)
templateCard.querySelector('.btn-dark').dataset.id = producto.idProducto
 const clone  = templateCard.cloneNode(true)
 fragment.appendChild(clone)

   })

   cards.appendChild(fragment)

}

const addCarrito = e =>
{
   // console.log(e.target)
     
       if(e.target.classList.contains('btn-dark')){
      
      // console.log( e.target.parentElement)
               setCarrito(e.target.parentElement)
       }
       e.stopPropagation()
 }
 const setCarrito = objeto =>{
 //  console.log(objeto)
   const producto = {
     id:  objeto.querySelector('.btn-dark').dataset.id,
     nombre: objeto.querySelector('h5').textContent,
     precio: objeto.querySelector('p').textContent,
     cantidad: 1

   }
   
   //incrementa la cantidad de un producto seleccionado varias veces
   if(carrito.hasOwnProperty(producto.id)){
    producto.cantidad = carrito[producto.id].cantidad+1
   }else{
    s.push(producto.id)
   }
//empujamos el producto al carrito haciendo una copia del producto
   carrito[producto.id] = {...producto}
 //  console.log(carrito)
 pintarCarrito()
 }

 const pintarCarrito = () => {
  //  console.log(carrito)
  items.innerHTML = ''
  Object.values(carrito).forEach(producto => {
    templateCarrito.querySelector('th').textContent = producto.id
    templateCarrito.querySelectorAll('td')[0].textContent=producto.nombre
    templateCarrito.querySelectorAll('td')[1].textContent=producto.cantidad
    templateCarrito.querySelector('.btn-info').dataset.id=producto.id
    templateCarrito.querySelector('.btn-danger').dataset.id=producto.id
    templateCarrito.querySelector('span').textContent=producto.cantidad*producto.precio
    const clone= templateCarrito.cloneNode(true)
    fragment.appendChild(clone)
  })
  items.appendChild(fragment)
  pintarFooter()
  //guardado del carrito para recuperar al recargar la pagina
  localStorage.setItem('carrito',JSON.stringify(carrito))
  localStorage.setItem('s',JSON.stringify(s))
 }

 const pintarFooter = () =>{
    footer.innerHTML = ''
    if(Object.keys(carrito).length ===0){
        footer.innerHTML = ` 
        <th scope="row" colspan="5">Carrito vacío - comience a comprar!</th>
        
        `  
        //return para evitar que siga volteando pues el carrito esta vacio
        return
    }
    const nCantidad = Object.values(carrito).reduce((acumulador,{cantidad}) => acumulador + cantidad,0  )
    const nPrecio = Object.values(carrito).reduce((acumulador,{cantidad,precio}) => acumulador + cantidad * precio,0  )

    templateFooter.querySelectorAll('td')[0].textContent = nCantidad
    templateFooter.querySelector('span').textContent = nPrecio
  const clone = templateFooter.cloneNode(true)
  fragment.appendChild(clone)
  footer.appendChild(fragment)
   // console.log(nPrecio)
   const btnVaciar = document.getElementById('vaciar-carrito')
   btnVaciar.addEventListener('click', () =>{
    carrito = {}
    s =[]
    pintarCarrito()
   })

 }

 const btnAccion = e =>{
    //console.log(e.target)
    //acion de aumentar
    if(e.target.classList.contains('btn-info')){
       carrito[e.target.dataset.id]
       const producto =  carrito[e.target.dataset.id]
       producto.cantidad ++
       carrito[e.target.dataset.id] = {...producto}
       pintarCarrito()
    }
    if(e.target.classList.contains('btn-danger')){
        carrito[e.target.dataset.id]
        const producto =  carrito[e.target.dataset.id]
        producto.cantidad --
      if(producto.cantidad===0){
        delete carrito[e.target.dataset.id]
        s = s.filter((item) => item !== e.target.dataset.id)
       
      }
      pintarCarrito()
     }
     e.stopPropagation
 }


 async function proccess(){
  const course = { name: 'JavaScript'  };
  var z= {tope: s.length}
var cantidad= s.length
var productoFinal={}
  for (let index = 0; index < cantidad; index++) {
    var i= { index: index}
       productoFinal = Object.assign(carrito[s[index]],z)
      
      productoFinal=Object.assign(productoFinal,i)
     console.log(productoFinal)
 await fetch('/save', {
      headers:{
         'Content-Type': 'application/json',
         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      },
      method:'POST',
      body: JSON.stringify(productoFinal)//body: JSON.stringify(carrito[s[index]])
  })
  .then(response => response.json())
  .then(function(result){
      alert(result.message);
  })
  .catch(function (error) {
    console.log(error);
  });
 }
  }
  