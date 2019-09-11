<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
        <Title>PACIENTE</Title>
        <meta charset = "UTF-8" />
        <link rel = "stylesheet" href = "assets/css/bootstrap.min.css" />
        <meta name = "viewport" content = "width=device-width, initial-scale=1" />
    </head>

    <body>
        <div class = "container-fluid">
            <!-- Início do título da página -->
            <div class = "row" style = "background-color: #eeeeee;">
                <div class = "col-1" style = "border-bottom: 5px #dcdcdc solid;">
                    <img src = "assets/img/LOGO.png" height = "30px" />
                </div>
                <div class = "col-7" style = "border-bottom: 5px #dcdcdc solid; text-align: center;">
                    <span class = "text-primary text-uppercase">LISTA DE PACIENTES</span>
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
                <div class = "col-12" style = "border-left: 1px #dcdcdc solid; background-color: #eeeeee">
                    <span>Utilize o campo abaixo para realizar o filtro do paciente</span><br />
                    <label for = "procura">Procura: </label>
                    <input type = "text" id = "procura" size = "200" />
                </div>
            </div>
            <!-- Fim lista de paciente e informações do paciente-->



            <!-- Início Documentos e histórico -->
            <div class = "row">
                <div class = "col-12">
                    <table class = "table table-hover">
                        <thead>
                            <tr>
                                <th>Cod. Intern.</th>
                                <th>Cod. Pac</th>
                                <th>Nome Completo</th>
                                <th>Data de Internação</th>
                                <th>Convênio</th>
                                <th>Leito</th>
                                <th>Data de Nascimento</th>
                                <th>Idade</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                             $consulta_sql = "call lista_paciente_internados()";
                             $execucao_sql = $conecta->query($consulta_sql);
                              while ($armazenamento=$execucao_sql->fetch_array(MYSQLI_ASSOC)){
                        ?>

                            <tr>
                                <td>
                                    <?php
                                        echo("<a href = \"paciente.php?paciente=" .$armazenamento["cod_pac"]. "&internacao=" .$armazenamento["cod_intern"]. "\">");
                                        echo str_pad($armazenamento["cod_intern"], 8, "0", STR_PAD_LEFT);?>
                                </a>
                            </td>
                                <td>
                                <?php
                                        echo("<a href = \"paciente.php?paciente=" .$armazenamento["cod_pac"]. "&internacao=" .$armazenamento["cod_intern"]. "\">");
                                 echo str_pad($armazenamento["cod_pac"], 7, "0", STR_PAD_LEFT);?></a></td>
                                <td>
                                <?php
                                echo("<a href = \"paciente.php?paciente=" .$armazenamento["cod_pac"]. "&internacao=" .$armazenamento["cod_intern"]. "\">");
                                echo $armazenamento["nome_completo"];
                                ?></a></td>
                                <td>
                                <?php
                                echo("<a href = \"paciente.php?paciente=" .$armazenamento["cod_pac"]. "&internacao=" .$armazenamento["cod_intern"]. "\">");
                                echo $armazenamento["data_internacao"];
                                ?></a></td>
                                <td>
                                <?php
                                echo("<a href = \"paciente.php?paciente=" .$armazenamento["cod_pac"]. "&internacao=" .$armazenamento["cod_intern"]. "\">");
                                echo $armazenamento["convenio"];?></a></td>
                                <td>
                                <?php
                              echo("<a href = \"paciente.php?paciente=" .$armazenamento["cod_pac"]. "&internacao=" .$armazenamento["cod_intern"]. "\">");
                                echo $armazenamento["leito"];
                                ?></a></td>
                                <td>
                                <?php
                                echo("<a href = \"paciente.php?paciente=" .$armazenamento["cod_pac"]. "&internacao=" .$armazenamento["cod_intern"]. "\">");
                                echo $armazenamento["data_nascimento"];
                                ?></a></td>
                                <td>
                                <?php
                                echo("<a href = \"paciente.php?paciente=" .$armazenamento["cod_pac"]. "&internacao=" .$armazenamento["cod_intern"]. "\">");
                                echo $armazenamento["Idade"];
                                ?></a></td>
                            </tr>

                        <?php
                              }

                        ?>
                        </tbody>
                    </table>
                </div>

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