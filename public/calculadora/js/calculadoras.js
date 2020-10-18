//#####################################----FUNCION METABOLISMO----#################################################
var metabolismo = function(){
//----------------------------RECOGIDA DE DATOS PARA LA FÓRMULA---------------------------------
	function metabolismo_genero() {
            var inputs = document.getElementsByName("metabolismo_genero");
            for (var i = 0; i < inputs.length; i++) {
              if (inputs[i].checked) {
                return inputs[i].value;}}};
	var sexo = metabolismo_genero();
	var edad = document.getElementById("metabolismo_edad").value;
	var peso = document.getElementById("metabolismo_peso").value / 2.2046;
	var altura = document.getElementById("metabolismo_altura").value;

	if(edad == ''){
		alertify.error("Por favor colocar su edad.. ");
	return false;
	}
	if(peso == ''){
		alertify.error("Por favor colocar su peso.. ");
		return false;
		}
		if(altura == ''){
			alertify.error("Por favor colocar su altura.. ");
			return false;
			}
			if(edad < 50){
				alertify.error("Esta calculadora es solo para adultos mayores!!");
				return false;
				}


//-------------ASIGNA DIFERENTES DATOS DEPENDIENDO DEL SEXO-----------------------
	//DATOS PARA METABOLISMO BASAL - HOMBRE
	//MB hombres = a + (b * peso) + (c * altura) – (d * edad)
	if(sexo == "hombre" ){ 
		var a = 66.4730;
		var b = 13.7516;
		var c = 5.0033;
		var d = 6.7550;
		
		//DATOS PARA METABOLISMO TOTAL - HOMBRE
		//Hombres -> MB x 1.60 = Actividad ligera, MB x 1.78 = Actividad moderada, MB x 2.10 = Actividad intensa
		var actLigera = 1.60;
		var actModerada = 1.78;
		var actIntensa = 2.10;
	}
	
	//DATOS PARA METABOLISMO BASAL - MUJER
	//MB mujeres = a + (b * peso) + (c * altura) – (d * edad)
	else if(sexo == "mujer" ){	
		var a = 655.0955;
		var b = 9.5634;
		var c = 1.8496;
		var d = 4.6756;
		
		//DATOS PARA METABOLISMO TOTAL - MUJER
		//Mujeres -> MB x 1.50 = Actividad ligera , MB x 1.64 = Actividad moderada , MB x 1.90 = Actividad intensa
		var actLigera = 1.50;
		var actModerada = 1.64;
		var actIntensa = 1.90;
	}

//-------------------------------CALCULO DE DATOS-----------------------------------------
	//ECUACION DEL METABOLISMO BASAL
	var mb = a+(b*peso)+(c*altura)-(d*edad);
	
	//Muestra el resultado en una caja "confirm", si aceptamos calculara el METABOLISMO TOTAL, aceptamos?
	var desplegar_resultado = "Su metabolismo basal es de "+Math.floor(mb)+" calorías.";
	document.getElementById("resultado_metabolismo").innerHTML = desplegar_resultado;
}//#####################################----FIN FUNCION METABOLISMO----#############################################
	
	

	
//#####################################----FUNCION PESO IDEAL----##################################################
var pesoIdeal = function(){
//----------------------------RECOGIDA DE DATOS PARA LA FÓRMULA---------------------------------
	function peso_ideal_genero() {
            var inputs = document.getElementsByName("peso_ideal_genero");
            for (var i = 0; i < inputs.length; i++) {
              if (inputs[i].checked) {
              	return inputs[i].value;}}};
	var sexo = peso_ideal_genero();
	var edad = document.getElementById("peso_ideal_edad").value;
	var altura = document.getElementById("peso_ideal_altura").value;
	var peso = document.getElementById("peso_ideal_peso").value;

	if(edad == ''){
		alertify.error("Por favor colocar su edad.. ");
	return false;
	}
		if(altura == ''){
			alertify.error("Por favor colocar su altura.. ");
			return false;
			}
			if(peso == ''){
				alertify.error("Por favor colocar su peso.. ");
				return false;
				}
				if(edad < 50){
					alertify.error("Esta calculadora es solo para adultos mayores!!!");
					return false;
					}
			

//----------------------------CALCULO DE LA FORMULA----------------------------------------
	if(sexo == "hombre" ){var k=4;} else if(sexo == "mujer" ){var k=2.5} //Hombres -> k = 4, Mujeres -> 2,5
	var pI = altura -100 - ((altura - 150) / 4) + ((edad - 20) / k)
	var PS = pI *2.2046;
	//Despliega el resultado
	var desplegar_resultado = "Su peso ideal sería estar en "+Math.floor(PS)+" LB.";
	var recomendacion;
	console.log(PS);
	if (Math.floor(PS) > peso) { 
		recomendacion = "<a href='../rutinas_diarias/bajo_peso/ori.php'>Ver dietas recomendadas</a>";
	} else if (Math.floor(PS) < peso) {
		recomendacion = "<a href='../rutinas_diarias/Sobre_Peso/ori.php'>Ver dietas recomendadas</a>";
	} else {recomendacion = "<a href='../rutinas_diarias/peso_normal/ori.php'>Ver dietas recomendadas</a>";}
	
	document.getElementById("resultado_pesoideal").innerHTML = desplegar_resultado;
	document.getElementById("recomendacion_pesoideal").innerHTML = recomendacion;
}//#####################################----FIN FUNCION PESO IDEAL----##############################################




//#####################################----FUNCION IMC----#########################################################
var imc = function(){
//----------------------------RECOGIDA DE DATOS PARA LA FÓRMULA---------------------------------
	var peso = document.getElementById("imc_peso").value / 2.2046;
	var altura = document.getElementById("imc_altura").value;

	if(peso == ''){
		alertify.error("Por favor colocar su peso.. ");
		return false;
		}
		if(altura == ''){
			alertify.error("Por favor colocar su altura.. ");
			return false;
			}
			
	
//----------------------------CALCULO DE LA FORMULA----------------------------------------
	var tuIMC = peso / (altura*altura)
	/* -------- RESULTADO DE IMC ----------
		Desnutrido	 <18,5
		Normal	 18,5-24,9
		Sobrepeso grado I	 25-26,9
		Sobrepeso grado II	 27-29,9
		Obesidad tipo I	 30-34,6
		Obesidad tipo II	 35-39,9
		Obesidad tipo III(mórbida)	 40-49,9
	*/
	if(tuIMC>=10 && tuIMC<18.5){resultadoIMC = " está desnutrido: <18,5 (valores normales: 18,5-24.9)";}
	else if(tuIMC>=18.5 && tuIMC<=24.9){resultadoIMC = " está en los valores normales: 18,5-24.9";}
	else if(tuIMC>=25 && tuIMC<=26.9){resultadoIMC = " tiene Sobrepeso Grado I: 25-26.9 (valores normales: 18,5-24.9)";}
	else if(tuIMC>=27 && tuIMC<=29.9){resultadoIMC = " tiene Sobrepeso Grado II: 27-29.9 (valores normales: 18,5-24.9)";}
	else if(tuIMC>=30 && tuIMC<=34.6){resultadoIMC = " tiene Obesidad Tipo I: 30-34.6 (valores normales: 18,5-24.9)";}
	else if(tuIMC>=35 && tuIMC<=39.9){resultadoIMC = " tiene Obesidad Tipo II: 35-39.9 (valores normales: 18,5-24.9)";}
	else if(tuIMC>40){resultadoIMC = "tiene Obesidad Tipo III(mórbida): +40 (valores normales: 18,5-24.9)";}
	//si el resultado no es un valor de la lista, avisa del error
	else {alertify.error("La altura debe de ser introducida en METROS! Acuerdate de separar los decimales con un PUNTO no con una coma.")}
	
	//Informa del resultado, toFixed(2) -> lo da en 2 decimales
	var desplegar_resultado = "Su IMC es de "+tuIMC.toFixed(2)+ resultadoIMC;
	var recomendacion;
	if (tuIMC <= 18.5){recomendacion = "Se recomienda aumentar de peso. Utilize nuestra calculadora de " + "<a href='Peso_Ideal.html'>peso ideal</a>" + " para conocer en que peso deberia estar y obtener una dieta recomendada";}
	else if (tuIMC>=25 && tuIMC<=29.9){recomendacion = "Se recomienda adoptar una " + "alimentación equilibrada</a>" + " y realizar actividad física de manera regular para llegar al peso ideal";}
	else if (tuIMC>30){recomendacion = "Se recomienda visitar al médico para que realice una evaluación y recomiende una dieta";}
	document.getElementById("resultado_imc").innerHTML = desplegar_resultado;
	document.getElementById("recomendacion_imc").innerHTML = recomendacion;	
}//#####################################----FIN FUNCION IMC----#####################################################




//#####################################----FUNCION ICC----#########################################################
var icc = function(){
//----------------------------RECOGIDA DE DATOS PARA LA FÓRMULA---------------------------------
	var pCintura = document.getElementById("icc_cintura").value;
	var pCadera = document.getElementById("icc_cadera").value;

//----------------------------CALCULO DE LA FORMULA----------------------------------------
	var tuICC = pCintura / pCadera;
	
	//Informa del resultado, nos lo da en 2 decimales -> toFixed(2)
	desplegar_resultado = "El ICC del individuo es "+tuICC.toFixed(2)+" en hombres debe ser menor a 1 y en mujeres menor a 0.85";
	document.getElementById("resultado_icc").innerHTML = desplegar_resultado;
}//#####################################----FIN FUNCION ICC----#####################################################




//#####################################----FUNCION ICT----#########################################################
var ict = function(){
//----------------------------RECOGIDA DE DATOS PARA LA FÓRMULA---------------------------------
	var pCintura = document.getElementById("ict_cintura").value;
	var altura = document.getElementById("ict_altura").value;

//----------------------------CALCULO DE LA FORMULA----------------------------------------
	var tuICT = pCintura / altura;
	
	//Informa del resultado, nos lo da en 2 decimales -> toFixed(2)
	desplegar_resultado = "El ICT del individuo es "+tuICT.toFixed(2)+" debe ser menor a 0.5";
	document.getElementById("resultado_ict").innerHTML = desplegar_resultado;
}//#####################################----FIN FUNCION ICC----#####################################################