
var removeCartItemButtons =document.getElementsByClassName('btn')
updateTotal()
console.log(removeCartItemButtons)
for (var i=0; i < removeCartItemButtons.length;i++){


var button = removeCartItemButtons[i]
button.addEventListener('click',function(event){
var ButtonClicked = event.target

ButtonClicked.parentElement.parentElement.parentElement.parentElement.remove() 

})

}
function updateTotal(){
   const subtotal= parseFloat(document.querySelector("#subtotal1").dataset.value)+parseFloat(document.querySelector("#subtotal2").dataset.value)+parseFloat(document.querySelector("#subtotal3").dataset.value);
    const qst=subtotal/10;
    const gst=subtotal/20;

    const total=(subtotal+qst+gst).toFixed(2);
   
    const target=document.querySelector("#output");
    let html=`<table> 
        <tr>
        <td>Subtotal</td>
        <td >$${subtotal}</td> 
        </tr>
        <tr>
        <td>QST</td>
        <td>$${qst}</td>
            </tr> 
        <tr>  <td>GST</td>
            <td>$${gst}</td>
        </tr>
    <tr>
        <td>Total</td>
        <td>$${total}</td>
    </tr>
    </table>`;
    target.innerHTML=html;
}
Array.from(document.querySelectorAll(".qty")).forEach(ele=>{
    ele.addEventListener("change",e=>{
        var total=e.target.value*e.target.dataset.cost;
        var target=document.querySelector(`#${e.target.dataset.target}`)
        target.innerHTML="$"+total;
        target.dataset.value=total;
        updateTotal();
    })
})


