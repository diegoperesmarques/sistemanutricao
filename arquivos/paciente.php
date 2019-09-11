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
        <script type = "text/javascript" src = "js/admissao_paciente.js"></script>
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
                            <form method = "post" action = "recebe.php">
                              
                            <?php
                                include("admissao_paciente.php");
                            ?>

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