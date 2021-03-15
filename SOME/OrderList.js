var removeORDERButtons =document.getElementsByClassName('btn')

console.log(removeORDERButtons)
for (var i=0; i < removeORDERButtons.length;i++){


var button = removeORDERButtons[i]
button.addEventListener('click',function(event){
var ButtonClicked = event.target

ButtonClicked.parentElement.parentElement.remove() 

})

}
