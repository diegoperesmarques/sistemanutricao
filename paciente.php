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
                    <span class = "text-primary text-uppercase">ADMISSÃO DO PACIENTE</span>
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
                    <span class = "text-uppercase"><a href = "lista_paciente.php">Lista de pacientes</a></span>
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
                                <a class = "nav-link" href = "paciente.html" style = "display: block;">ADMISSÃO DO PACIENTE</a>
                            </li>

                            <li class = "nav-item">
                                <a class = "nav-link" href = "evolucao_paciente.html" style = "display: block;">EVOLUÇÃO DO PACIENTE</a>
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
                                    <legend>Avaliação Clínica</legend>
                                    <input type = "checkbox" />HAS Crônica
                                    <input type = "checkbox" />HAS Gestacional
                                    <input type = "checkbox" />DB Tipo I/II
                                    <input type = "checkbox" />DB Gestacional
                                    <input type = "checkbox" />DLP
                                    <label for = "outros">Outros</label>
                                    <input type = "text" id = "outros" size = "40" />
                                    <br />

                                    FI:
                                    <input type = "radio" name = "fi" />Constipação
                                    <input type = "radio" name = "fi" />Diarréia
                                    <input type = "radio" name = "fi" />Normal
                                    <br />
                            </fieldset>

                            <fieldset>
                                <legend>Avaliação Antropométrica</legend>
                                <label for = "altura">Altura</label>
                                <input type = "text" size = "3" id = "altura" />&nbsp;&nbsp;
                                <label for = "idade_gestacional">Idade Gestacional</label>
                                <input type = "text" size = "4" id = "idade_gestacional" />
                                <label for = "em">Em</label>
                                <input type = "text" size = "10" id = "em" value = "" />

                                <br />
                            Dados Pré-Gestacional:
                            <label>Peso PG</label>
                            <input type = "text" id = "peso_pg" name = "peso_pg" onBlur = "calcula_pre_gestacional()"/>kg &nbsp;&nbsp;

                            <label>IMC PG</label>
                            <input type = "text" id = "imc_pg" name = "img_pg" size = "4" />

                            <label>Tipo</label>
                            <input type = "text" id = "tipo_obsidade_gestacional" name = "tipo_obesidade_gestacional" size = "10" />

                            <br />
                            Dados Atuais:
                            <label>Peso Atual</label>
                            <input type = "text" id = "peso_atual" name = "peso_atual" onBlur = "calcula_atual()" size = "4" />kg &nbsp;&nbsp;

                            <label>IMC Atual</label>
                            <input type = "tex" id = "imc_atual" name = "imc_atual" size = "4" />

                            <label>Tipo</label>
                            <input type = "text" id = "tipo_obesidade_atual" name = "tipo_obesidade_atual" size = "10" />

                            <br />
                            <input type = "radio" name = "gestante" onclick = "peso_total_gestacao()" />Adulto
                            <input type = "radio" name = "gestante" onclick = "peso_total_gestacao()" />Gestante Feto Único
                            <input type = "radio" name = "gestante" onclick = "peso_total_gestacao()" />Adolescente
                            <input type = "radio" name = "gestante" onclick = "peso_total_gestacao()" />Idoso NSI
                            <input type = "radio" name = "gestante" onclick = "peso_total_gestacao()" />Gestante Gemelar
                            <br />
                            <label for = "ganho_peso">Ganho de peso total na gestação</label>
                            <input type = "text" id = "ganho_peso" name = "ganho_peso" />
                        </fieldset>

                        <fieldset>
                            <label>Alergia/Intolerância</label>
                            <input type = "radio" name = "alergia_intolerancia" />Sim
                            <input type = "radio" name = "alergia_intolerancia" />Não

                            <br />
                            <input type = "checkbox" />Glúten
                            <input type = "checkbox" />Lactose
                            <input type = "checkbox" />Proteina do Leite
                            <input type = "checkbox" />Corante
                            <input type = "checkbox" />Ovo
                            <input type = "checkbox" />Amendoim
                            <input type = "checkbox" />Frutos do Mar
                            <input type = "checkbox" />Conservantes
                            <label for = "outros_alergia">Outros</label>
                            <input type = "text" id = "outros_alergia" name = "outros_alergia" />
                        </fieldset>

                        <fieldset>
                            <legend>Preferências Alimentares</legend>
                            <input type = "checkbox" />Carne bovina
                            <input type = "checkbox" />Frango
                            <input type = "checkbox" />Peixe
                            <input type = "checkbox" />Ovo
                            <input type = "checkbox" />Vegano
                            <input type = "checkbox" />Ovo-lacto vegetariano
                            <br />

                            <label for = "sopa">Sopa: </label>
                            <input type = "radio" name = "sopa" />Sim
                            <input type = "radio" name = "sopa" />Não
                             <br />


                             <label for = "preferencia_jantar">Preferência Jantar</label>
                             <input type = "checkbox" />Sopa
                             <input type = "checkbox" />Refeição
                             <br />


                             <input type = "checkbox" />Açúcar
                             <input type = "checkbox" />Adoçante aspartame
                             <input type = "checkbox" />Adoçante sucralose
                             <br />


                             <label for = "verdura">Verduras: </label>
                             <input type = "text" id = "verdura" size = "80" />
                             <br />

                             <label for = "legumes">Legumes: </label>
                             <input type = "text" id = "legumes" size = "80" />
                             <br />

                             <label for = "frutas">Frutas: </label>
                             <input type = "text" id = "frutas" size = "80" />
                             <br />

                             <label for = "leite_derivados">Leite e Derivados: </label>
                             <input type = "text" id = "leite_derivados" size = "80" />
                             <br />

                             <label for = "cereais">Cereias: </label>
                             <input type = "text" id = "cereais" size = "80" />
                             <br />

                             <label for = "leguminosas">Leguminosas: </label>
                             <input type = "text" id = "leguminosas" size = "80" />
                             <br />

                             <input type = "checkbox" />Creme de milho
                             <input type = "checkbox" />Creme de Palmito
                            <br />

                            <input type = "checkbox" />Chá
                            <input type = "checkbox" />Água de Côco 
                            <input type = "checkbox" />Iogurte Comum 
                            <input type = "checkbox" />Iogurte Desnatado
                            <label for = "obs">Obs: </label>
                            <input type = "text" id = "obs" size = "30" />

                            <br />
                            Molhos
                            <input type = "checkbox" />Sugo
                            <input type = "checkbox" />Ervas Finas
                            <input type = "checkbox" />Branco 
                            <input type = "checkbox" />Champignon 
                            <input type = "checkbox" />Alcaparras 
                            <input type = "checkbox" />Madeira 
                            <label for = "obs1">Obs: </label>
                            <input type = "text" id = "obs1" size = "30" /><br />

                            Sucos: 
                            <input type = "checkbox" />Acerola c/mamão 
                            <input type = "checkbox" />Abacaxi
                            <input type = "checkbox" />Caju
                            <input type = "checkbox" />Manga
                            <input type = "checkbox" />Uva
                            <input type = "checkbox" />Maracujá
                            <input type = "checkbox" />Morango
                            <input type = "checkbox" />Pêssego
                            <input type = "checkbox" />Laranja c/mamão 
                            <input type = "checkbox" />Melancia
                        </fieldset>

                        <label for "historico_evolucao">Histórico e Evolução Nutricional</label><br />
                        <textarea id = "historico_evolucao" cols = "100" rows = "20"></textarea>
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
                    <div class = "col-10" style = "background-color: white; border-top: 5px #dcdcdc solid">
                        Informações do usuário
                    </div>

                    <div class = "col-2" style = "background-color: white; border-top: 5px #dcdcdc solid; border-left: 2px #dcdcdc solid;">
                    <script type = "text/javascript">
                            var data = new Date;
                            document.write(data.getDate()+ "/" +data.getMonth()+ "/" +data.getFullYear()+ " " +data.getHours()+ ":" +data.getMinutes());
                        </script>
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