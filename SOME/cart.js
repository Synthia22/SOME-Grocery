function modPrice(frm){
    var quantity;
    var price= frm.elements['FIXEDP'].value;;
    

    for (i=0;i<frm.elements.length;i++){
          
        if(frm.elements[i].type=="number"){
            quantity = frm.elements[i].value;
        }
    }
    var total = Number(price)*quantity;
    var t=total.toFixed(2);

    frm.elements["price"].value = t;
    subTotal();
}

function subTotal(){
    var allsubTotal=document.querySelectorAll("#price");
    var TOTAL=0.0;
    for (var i=0;i<allsubTotal.length;i++){
        TOTAL+=parseFloat(allsubTotal[i].value);
    }
    var t=TOTAL.toFixed(2);
    document.getElementById("subtotal").value=t;

    var gst = parseFloat(t*0.05);
    gst=gst.toFixed(2);
    var qst = parseFloat(t*0.099);
    qst=qst.toFixed(2);

    

    var finalTOTAL= parseFloat(TOTAL)+parseFloat(gst)+parseFloat(qst);
    document.getElementById("QST").value=qst;
    document.getElementById("GST").value=gst;
    document.getElementById("ENDPRICE").value=finalTOTAL;
    console.log(typeof finalTOTAL);
}
