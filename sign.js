
function mobiles(){

  var x=document.getElementById("mobile").value;

  var reg=/(\+91[\-\s]?)?[0]?(91)?[789]\d{9}/;

  if(x.match(reg)==null){

    document.getElementById("mobile").style.borderColor="red";

  }

  else{

    document.getElementById("mobile").style.borderColor="lightblue";

  }

}

function validpass(){

  var x=document.getElementById("pass").value;

  var y=document.getElementById("valpass").value;

  if(x!=y){

    document.getElementById("valpass").style.borderColor="red";        

  }

  else{

    document.getElementById("valpass").style.borderColor="lightblue";

  }

}



function emailval(){

  var x=document.getElementById("email").value;

  var reg= /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/;

  if(x.match(reg==null)){

    document.getElementById("email").style.borderColor="red";

  }

  else{

    document.getElementById("email").style.borderColor="lightblue";

  }

}



function nameval(){

  var x=document.getElementById("name").value;

  var reg=/^[a-zA-Z ]*$/;

  if(x.match(reg)==null){

    document.getElementById("name").style.borderColor="red";

  }

  else{

    document.getElementById("name").style.borderColor="lightblue";

  }

}



function userval(){

  var x=document.getElementById("username").value;

  var reg=/^[a-zA-Z0-9]+([a-zA-Z0-9](_|-| )[a-zA-Z0-9])*[a-zA-Z0-9]+$/;

  if(x.match(reg)==null){

    document.getElementById("username").style.borderColor="red";

  }

  else{

    document.getElementById("username").style.borderColor="lightblue";

  }
}


