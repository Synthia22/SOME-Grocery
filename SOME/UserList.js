var count = 7;
function change(i){
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
    var count = window.count+1;
    var i = count;
    var rangee = document.getElementById("row-"+i);
    /*khvbjkjhhjbnkmklkklk*/
rangee.cells[0].innerHTML = document.getElementById("fname2").value;

rangee.cells[1].innerHTML = document.getElementById("lname2").value;
rangee.cells[2].innerHTML = document.getElementById("cemail2").value;
rangee.cells[3].innerHTML = document.getElementById("pnumber2").value;
rangee.cells[4].innerHTML = document.getElementById("city2").value;
rangee.cells[5].innerHTML = document.getElementById("address2").value;
rangee.cells[6].innerHTML = document.getElementById("postalCode2").value;
rangee.cells[7].innerHTML = document.getElementById("province2").value;
rangee.cells[8].innerHTML = document.getElementById("cpwd2").value;
rangee.style.display="table-row";
rangee.cells[0].style.display = "table-cell";
rangee.cells[1].style.display = "table-cell";
rangee.cells[2].style.display = "table-cell";
rangee.cells[3].style.display = "table-cell";

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

   
    myTable.style.display = "table";
    document.getElementById("Add").style.display="initial";
    document.getElementById("Editing").style.display="none";
    document.getElementById("Appending").style.display="none";
    window.count++;
   
}
function unHideAdd(){
    var myTable = document.getElementById("myTable");
    myTable.style.display = "none";
    document.getElementById("Add").style.display="none";
    document.getElementById("Appending").style.display="initial";
}
function deleteUser(i){
    var myTable = document.getElementById("myTable");
    var row = document.getElementById("row-"+i);
    row.style.display="none";
}
