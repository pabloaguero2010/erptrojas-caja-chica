function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
  		}
	}

	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

function datosproveedor(){
  
  //donde se mostrará lo resultados
  divdatosproveedor = document.getElementById('datosprov');
  divdatosproveedor.innerHTML= 'cargando...';
  //valores de las cajas de texto
  rut=document.aif.rut.value;
  crut=document.aif.crut.value;
  //instanciamos el objetoAjax
  ajax=objetoAjax();
  //uso del medoto POST
  //archivo que realizará la operacion
  ajax.open("POST", "procesar_if.php",true);
  ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
  //mostrar resultados en esta capa
  divdatosproveedor.innerHTML = ajax.responseText
 
  
  }
  }
  

  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  //enviando los valores
  ajax.send("rutprov="+rut+"&crutprov="+crut)
}


function datosconductor(){
  
  //donde se mostrará lo resultados
  divdatosproveedor = document.getElementById('datosprov');
  divdatosproveedor.innerHTML= 'cargando...';
  //valores de las cajas de texto
  rut=document.aif.rut.value;
  crut=document.aif.crut.value;
  //instanciamos el objetoAjax
  ajax=objetoAjax();
  //uso del medoto POST
  //archivo que realizará la operacion
  ajax.open("POST", "procesar_aco.php",true);
  ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
  //mostrar resultados en esta capa
  divdatosproveedor.innerHTML = ajax.responseText
 
  
  }
  }
  

  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  //enviando los valores
  ajax.send("rutprov="+rut+"&crutprov="+crut)
}




function calcularconneto(){
  
  //calcualar iva
  campoiva = document.getElementById('iva');
  neto=document.aif.neto.value;
  iva=neto*0.19;
  campoiva.value=iva.toFixed();
  //calcular total;
  
  campototal = document.getElementById('total');
  neto=document.aif.neto.value;
  total=neto*1.19;
  campototal.value=total.toFixed();
  
}

function calcularcontotal(){
  
  //calcular neto;
  
  camponeto = document.getElementById('neto');
  total=document.aif.total.value;
  neto=total*(100/119);
  camponeto.value=neto.toFixed();

  //calcualar iva
  campoiva = document.getElementById('iva');
  iva=neto*0.19;
  campoiva.value=iva.toFixed();
}

function calcularconiva(){
  
  //calcualar neto
  camponeto = document.getElementById('neto');
  iva=document.aif.iva.value;
  neto=iva*(100/19);
  camponeto.value=neto.toFixed();
  
  //calcular total;
  
  campototal = document.getElementById('total');
  total=neto*1.19;
  campototal.value=total.toFixed();
  
}



function gotoLink(url){
location.href = url;
}


