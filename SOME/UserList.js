function change(i){
    document.getElementById("efface").style.display="none";
    var myTable = document.getElementById("myTable");
    var row = document.getElementById("row-"+i);
myTable.style.display = "none";
document.getElementById("cpwd").value="";
document.getElementById("pwd").value="";
document.getElementById("cemail").value="";
document.getElementById("Add").style.display="none";
document.getElementById("Editing").style.display="initial";
document.getElementById("voir").value=i;
document.getElementById("mdp").value=row.cells[8].innerHTML;
document.getElementById("fname").value=row.cells[0].innerHTML;
document.getElementById("lname").value=row.cells[1].innerHTML;
document.getElementById("email").value=row.cells[2].innerHTML;
document.getElementById("pnumber").value=row.cells[3].innerHTML;
document.getElementById("city").value=row.cells[4].innerHTML;
document.getElementById("address").value=row.cells[5].innerHTML;
document.getElementById("postalCode").value=row.cells[6].innerHTML;

}
function bringBack(){
    const code = /^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/;
    if(!code.exec(document.getElementById("postalCode").value)){
        alert("Postal code is invalid");
        return false;
    }
    const phoneno = /^(\([0-9]{3}\)\s*|[0-9]{3}\-)[0-9]{3}-[0-9]{4}$/;
  if(!document.getElementById("pnumber").value.match(phoneno)) {
      alert("Phone number is invalid");
    return false;
  }
    
    if(document.getElementById("email").value == document.getElementById("cemail").value){
        alert("New email adress cannot be the same as the previous one")
        return false;
    }
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(!re.test(String(document.getElementById("cemail").value).toLowerCase())){
        alert("Email address format is invalid");
        return false;
    }
    if(document.getElementById("mdp").value != document.getElementById("pwd").value){
        alert("Current Password is incorrect");
        return false;
    }
    if(document.getElementById("pwd").value == document.getElementById("cpwd").value){
        alert("New password cannot be the same as the previous one")
        return false;
    }
    var i = document.getElementById("voir").value;
    var myTable = document.getElementById("myTable");
myTable.style.display = "table";
document.getElementById("Add").style.display="initial";
document.getElementById("Editing").style.display="none";
document.getElementById("myTable").rows[i].cells[0].innerHTML=document.getElementById("fname").value;
document.getElementById("myTable").rows[i].cells[1].innerHTML=document.getElementById("lname").value;
document.getElementById("myTable").rows[i].cells[2].innerHTML=document.getElementById("cemail").value;
document.getElementById("myTable").rows[i].cells[3].innerHTML=document.getElementById("pnumber").value;
document.getElementById("myTable").rows[i].cells[4].innerHTML=document.getElementById("city").value;
document.getElementById("myTable").rows[i].cells[5].innerHTML=document.getElementById("address").value;
document.getElementById("myTable").rows[i].cells[6].innerHTML=document.getElementById("postalCode").value;
document.getElementById("myTable").rows[i].cells[8].innerHTML=document.getElementById("cpwd").value;
document.getElementById("efface").style.display="initial";
}
function save(){
    const code = /^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/;
    if(!code.exec(document.getElementById("postalCode2").value)){
        alert("Postal code is invalid");
        return false;
    }
    const phoneno = /^(\([0-9]{3}\)\s*|[0-9]{3}\-)[0-9]{3}-[0-9]{4}$/;
  if(!document.getElementById("pnumber2").value.match(phoneno)) {
      alert("Phone number is invalid");
    return false;
  }
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(!re.test(String(document.getElementById("email2").value).toLowerCase())){
        alert("Email format is invalid");
        return false;
    }
    if(document.getElementById("email2").value!= document.getElementById("cemail2").value){
        alert("Error in confirmation of email address")
        return false;
    }
    if(document.getElementById("pwd2").value!= document.getElementById("cpwd2").value){
        alert("Error in confirmation of password")
        return false;
    }
    
    var myTable = document.getElementById("myTable");
    var i = myTable.rows.length;
    // Create an empty <tr> element and add it to the 1st position of the table:
var row = myTable.insertRow(myTable.rows.length);
row.id="row-"+i;
// Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
var cell0 = row.insertCell(0);
var cell1 = row.insertCell(1);
var cell2 = row.insertCell(2);
var cell3 = row.insertCell(3);
var cell4 = row.insertCell(4);
var cell5 = row.insertCell(5);
var cell6 = row.insertCell(6);
var cell7 = row.insertCell(7);
var cell8 = row.insertCell(8);
var cell9 = row.insertCell(9);
// Add some text to the new cells:
cell0.innerHTML = document.getElementById("fname2").value;
cell1.innerHTML = document.getElementById("lname2").value;
cell2.innerHTML = document.getElementById("cemail2").value;
cell3.innerHTML = document.getElementById("pnumber2").value;
cell4.innerHTML = document.getElementById("city2").value;
cell5.innerHTML = document.getElementById("address2").value;
cell6.innerHTML = document.getElementById("postalCode2").value;
cell7.innerHTML = document.getElementById("province2").value;
cell8.innerHTML = document.getElementById("cpwd2").value;
cell9.innerHTML ='<input type = "button"  value = "Edit" onclick="change(' + i + ')"/>';


cell4.style="display:none";
cell5.style="display:none";
cell6.style="display:none";
cell7.style="display:none";
cell8.style="display:none";
    myTable.style.display = "table";
    document.getElementById("Add").style.display="initial";
    document.getElementById("Editing").style.display="none";
    document.getElementById("Appending").style.display="none";

document.getElementById("lname2").value="";
document.getElementById("fname2").value="";
document.getElementById("address2").value="";
document.getElementById("email2").value="";
document.getElementById("cemail2").value="";
document.getElementById("pnumber2").value="";
document.getElementById("city2").value="";
document.getElementById("pwd2").value="";
document.getElementById("cpwd2").value="";
document.getElementById("postalCode2").value="";
document.getElementById("efface").style.display="initial";
}
function unHideAdd(){
    var myTable = document.getElementById("myTable");
    myTable.style.display = "none";
    document.getElementById("efface").style.display="none";
    document.getElementById("Add").style.display="none";
    document.getElementById("Appending").style.display="initial";
}
function deleteUser(){
    document.getElementById("efface").style.display="none";
    document.getElementById("Deleting").style.display="initial";
    document.getElementById("del").value="";
}

function deleteUser2(){
    document.getElementById("Deleting").style.display="none";
}
function rowInd(x){
    return x.rowIndex;
}
function reArrow(){
    // Getting the table element
    var tables = document.getElementById("myTable");

// Looping over tables
for (var i = 1; i < tables.length; i++) {

    // Get the ith table
    var table = tables[i];
    // Set the id dynamically
    
    table.id = "row-"+i;
}
    }

