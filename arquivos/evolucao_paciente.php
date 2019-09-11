<?php
    include("conexao.php");
    header("Content-Type: text/html; charset=utf-8");
    $codigo_paciente = $_GET["paciente"];
    $codigo_internacao = $_GET["internacao"];
?>
<!DOCTYPE html>
<html>
    <head>
        <Title>PACIENTE</Title>
        <meta charset = "UTF-8" />
        <link rel = "stylesheet" href = "assets/css/bootstrap.min.css" />
        <meta name = "viewport" content = "width=device-width, initial-scale=1" />
        <script type = "text/javascript">
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
        </script>
    </head>

    <body onload = "data_atual()">
        <div class = "container-fluid">
            <!-- Início do título da página -->
            <div class = "row" style = "background-color: #eeeeee;">
                <div class = "col-1" style = "border-bottom: 5px #dcdcdc solid;">
                    <img src = "assets/img/LOGO.png" height = "30px" />
                </div>
                <div class = "col-7" style = "border-bottom: 5px #dcdcdc solid; text-align: center;">
                    <span class = "text-primary text-uppercase">EVOLUÇÃO PACIENTE</span>
                </div>
                <div class = "col-4" style = "border-bottom: 5px #dcdcdc solid; text-align: right;">
                    VERSÃO 1.0 &nbsp;&nbsp;
                    <img src = "assets/img/configuracoes.png" height = "30px" />&nbsp;&nbsp;
                    <img src = "assets/img/sair.png" height = "30px"  />
                </div>
            </div>
            <!-- Fim do título da página -->

            <!-- Início Lista de pacientes e informações do paciente -->
            <div class = "row">
                <div class = "col-2" style = "padding-top: 5px;">
                    <a href = "lista_paciente.html"><img src = "assets/img/lista_paciente.png" height = "40px" /></a>
                    <span class = "text-uppercase"><a href = "lista_paciente.html">Lista de pacientes</a></span>
                </div>


                <?php
                    $consulta_adm_paciente = "call info_administrativa_paciente({$codigo_paciente}, {$codigo_internacao})";
                    $executa_consulta_adm_paciente = $conecta->query($consulta_adm_paciente);
                    $bd_adm_paciente = $executa_consulta_adm_paciente->fetch_array(MYSQLI_ASSOC);
                ?>
                <div class = "col-10" style = "border-left: 1px #dcdcdc solid; background-color: #eeeeee">
                    <span class = "text-uppercase font-weight-bold"><?php echo $bd_adm_paciente["nome_completo"]; ?></span><br />
                    <span><?php echo $bd_adm_paciente["convenio"]; ?></span>,
                    <span><?php echo $bd_adm_paciente["Idade"]; ?></span>,
                    <span><?php echo $bd_adm_paciente["leito"]; ?></span>
                </div>
            </div>
            <!-- Fim lista de paciente e informações do paciente-->

            <!-- Início Documentos e histórico -->
            <div class = "row">
                <div class = "col-2" style = "border-right: 1px #dcdcdc solid; padding: 0px;">
                    <div style = "background-color: #41748D; height: 10px;">&nbsp;</div>
                    <nav class = "navbar bg-light">
                        <ul class = "navbar-nav">
                            <li class = "nav-item">
                                <a class = "nav-link"
                                <?php
                                  echo ("href = \"paciente.php?paciente=" .$codigo_paciente. "&internacao=" .$codigo_internacao. "\"");
                                ?>
                                style = "display: block;">ADMISSÃO DO PACIENTE</a>
                            </li>

                            <li class = "nav-item">
                                <a class = "nav-link"
                                <?php
                                    echo ("href = \"evolucao_paciente.php?paciente=" .$codigo_paciente. "&internacao=" .$codigo_internacao. "\""); 
                                ?>
                                style = "display: block;">EVOLUÇÃO DO PACIENTE</a>
                            </li>
                        </ul>
                    </nav>
                <!--
                    <table class = "table table-hover">
                        <tbody>
                            <tr>
                                <td>ADMISSÃO DO PACIENTE</td>
                            </tr>

                            <tr>
                                <td>EVOLUÇÃO DO PACIENTE</td>
                            </tr>
                        </tbody>
                    </table>
                -->
                </div>

                <!-- Início informações e histórico -->
                <div class = "col-10">
                    <div class = "row">
                        <div class = "col-10" style = "overflow: auto">

                            <!-- Início do documento -->
                            <form method = "post" action = "#">
                               <fieldset>
                                   <legend>Anamnese</legend>
                               <textarea cols = "100" rows = "5" id = "anamnese" name = "anamnese"></textarea>

                               <br />
                               <label for = "azia">Azia: </label>
                               <input type = "radio" name = "azia" value = "1" />Sim
                               <input type = "radio" name = "azia" value = "0" />Não
                               &nbsp;&nbsp;
                               <label for = "nauseas">Náuses: </label>
                               <input type = "radio" name = "nauseas" value = "1" />Sim
                               <input type = "radio" name = "nauseas" value = "0" />Não
                               &nbsp;&nbsp;
                               <label for = "vomitos">Vômitos: </label>
                               <input type = "radio" name = "vomitos" value = "1" />Sim
                               <input type = "radio" name = "vomitos" value = "0" />Não
                               </fieldset>

                               <fieldset>
                                   <legend>Informações</legend>
                                   <label for = "idade_gestacional">Idade Gestacional: </label>
                                   <input type = "text" name = "idade_gestacional" id = "idade_gestacional" size = "4" />
                                   &nbsp; &nbsp;
                                   <label for = "gestacao">Gestação</label>
                                   <input type = "text" name = "gestacao" id = "gestacao" size = "10" />
                                   &nbsp; &nbsp;
                                   <label for = "altura">Altura: </label>
                                   <input type = "text" name = "altura"
                               </fieldset>
                            </form>
                            <!-- Fim do documento -->
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                        </div>
                        <div class = "col-2" style = "padding: 0px;">
                            <table class = "table table-hover">
                                <thead>
                                    <tr>
                                        <th style = "background-color: #dcdcdc">ADMISSÃO DO PACIENTE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td>
                                                <span class = "text-uppercase">01/05/2019 13:50</span><br />
                                                <span class = "text-uppercase">NUTRICIONISTA 001</span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <span class = "text-uppercase">15/05/2019 14:05</span><br />
                                                <span class = "text-uppercase">NUTRICIONISTA 002</span>
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Fim informações e histórico -->

            </div>
            <!-- Fim documentos e histórico -->

            <!-- Informações de usuário -->
            <div class = "fixed-bottom">
                <div class = "row">
                    <div class = "col-11" style = "background-color: white; border-top: 5px #dcdcdc solid">
                        Informações do usuário
                    </div>

                    <div class = "col-1" style = "background-color: white; border-top: 5px #dcdcdc solid; border-left: 2px #dcdcdc solid;">
                        Data e horário
                    </div>
                </div>
            </div>
            <!-- Fim informações de usuário -->
        </div>
        <footer>
            <script type = "text/javascript" src = "assets/js/bootstrap.min.js"></script>
            <script type = "text/javascript" src = "assets/js/jquery.min.js"></script>
        </footer>
    </body>
</html>