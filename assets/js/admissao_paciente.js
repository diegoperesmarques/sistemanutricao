function data_atual (){
    data = new Date;
    data_completa = data.getDate() + "/" +data.getMonth()+ "/" + data.getFullYear();
document.getElementById("em").value = data_completa;
}



function calcula_pre_gestacional(){
    peso_recebido = document.getElementById("peso_pg").value;
    peso_tratado = Number(peso_recebido.replace(",","."));
    altura_digitado = document.getElementById("altura").value;
    altura_tratado = Number(altura_digitado.replace(",", "."));
    altura_quadrado = altura_tratado * altura_tratado;
    imc = peso_tratado / altura_quadrado;
    imc_arredondado = imc.toFixed(2);
   document.getElementById("imc_pg").value = imc_arredondado;

    if(imc_arredondado < 18.9){
        document.getElementById("tipo_obsidade_gestacional").value = "Baixo Peso";
    } else if (imc_arredondado < 24.9){
        document.getElementById("tipo_obsidade_gestacional").value = "Eutrófico";
    } else if (imc_arredondado < 29.9) {
        document.getElementById("tipo_obsidade_gestacional").value = "Sobrepeso";
    } else {
        document.getElementById("tipo_obsidade_gestacional").value = "Obesidade";
    }
}


function calcula_atual() {
    peso_recebido = document.getElementById("peso_atual").value;
    peso_tratado = Number(peso_recebido.replace(",", "."));
    altura_digitado = document.getElementById("altura").value;
    altura_tratado = Number(altura_digitado.replace(",", "."));
    altura_quadrado = altura_tratado * altura_tratado;
    imc = peso_tratado / altura_quadrado;
    imc_arredondado = imc.toFixed(2);
   document.getElementById("imc_atual").value = imc_arredondado;

   if(imc_arredondado < 18.9){
        document.getElementById("tipo_obesidade_atual").value = "Baixo Peso";
    } else if (imc_arredondado < 24.9){
        document.getElementById("tipo_obesidade_atual").value = "Eutrófico";
    } else if (imc_arredondado < 29.9) {
        document.getElementById("tipo_obesidade_atual").value = "Sobrepeso";
    } else {
        document.getElementById("tipo_obesidade_atual").value = "Obesidade";
    }
}

function peso_total_gestacao(){
    peso_pg = document.getElementById("peso_pg").value;
    peso_pg_tratado = Number(peso_pg.replace(",", "."));
    peso_atual = document.getElementById("peso_atual").value;
    peso_atual_tratado = Number(peso_atual.replace(",", "."));
    ganho_peso = peso_atual_tratado - peso_pg_tratado;
    ganho_peso_arredondado =  ganho_peso.toFixed(2);

    document.getElementById("ganho_peso").value = ganho_peso_arredondado;
}