<fieldset>
    <input type = "hidden" <?php echo ("value=" .$codigo_paciente); ?> name = "codigo_paciente" id = "codigo_paciente" />
    <input type = "hidden" <?php echo ("value =" .$codigo_internacao); ?> name = "codigo_internacao" id = "codigo_internacao" />
                                    <legend>Avaliação Clínica</legend>
                                    <input type = "checkbox" value = "1" name = "has_cronica" />HAS Crônica
                                    <input type = "checkbox" value = "1" name = "has_gestacional" />HAS Gestacional
                                    <input type = "checkbox" value = "1" name = "db_tipo" />DB Tipo I/II
                                    <input type = "checkbox" value = "1" name = "db_gestacional" />DB Gestacional
                                    <input type = "checkbox" value = "1"  name = "dlp" />DLP
                                    <label for = "outros">Outros</label>
                                    <input type = "text" id = "outros" size = "40" name = "outros" />
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
                                <input type = "text" size = "3" id = "altura" name = "altura" />&nbsp;&nbsp;
                                <label for = "idade_gestacional">Idade Gestacional</label>
                                <input type = "text" size = "4" id = "idade_gestacional" name = "idade_gestacional" />
                                <label for = "em">Em</label>
                                <input type = "text" size = "10" id = "em" value = "" name = "em" />

                                <br />
                            Dados Pré-Gestacional:
                            <label>Peso PG</label>
                            <input type = "text" id = "peso_pg" name = "peso_pg" onBlur = "calcula_pre_gestacional()"/>kg &nbsp;&nbsp;

                            <label>IMC PG</label>
                            <input type = "text" id = "imc_pg" name = "imc_pg" size = "4" />

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
                            <input type = "radio" name = "alergia_intolerancia" value = "1" />Sim
                            <input type = "radio" name = "alergia_intolerancia" value = "0" />Não

                            <br />
                            <input type = "checkbox" name = "alergia_gluten" value = "1" />Glúten
                            <input type = "checkbox" name = "alergia_lactose" value = "1"/>Lactose
                            <input type = "checkbox" name = "alergia_proteina_leite" value = "1" />Proteina do Leite
                            <input type = "checkbox" name = "alergia_corante" value = "1" />Corante
                            <input type = "checkbox" name = "alergia_ovo" value = "1" />Ovo
                            <input type = "checkbox" name = "alergia_amendoim" value = "1" />Amendoim
                            <input type = "checkbox" name = "alergia_frutos_mar" value = "1" />Frutos do Mar
                            <input type = "checkbox" name = "alergia_conservantes" value = "1" />Conservantes
                            <label for = "outros_alergia">Outros</label>
                            <input type = "text" id = "outros_alergia" name = "outros_alergia" />
                        </fieldset>

                        <fieldset>
                            <legend>Preferências Alimentares</legend>
                            <input type = "checkbox" name = "preferencia_carne_bovina" value = "1" />Carne bovina
                            <input type = "checkbox" name = "preferencia_frango" value = "1" />Frango
                            <input type = "checkbox" name = "preferencia_peixe" value = "1" />Peixe
                            <input type = "checkbox" name = "preferencia_ovo" value = "1" />Ovo
                            <input type = "checkbox" name = "preferencia_vegano" value = "1" />Vegano
                            <input type = "checkbox" name = "preferencia_ovo_lacto_vegetariano" value = "1" />Ovo-lacto vegetariano
                            <br />

                            <label for = "sopa">Sopa: </label>
                            <input type = "radio" name = "preferencia_sopa" value = "1" />Sim
                            <input type = "radio" name = "preferencia_sopa" value = "0" />Não
                             <br />


                             <label for = "preferencia_jantar">Preferência Jantar</label>
                             <input type = "checkbox" name = "sopa" value = "1" />Sopa
                             <input type = "checkbox" name = "refeicao" value = "1" />Refeição
                             <br />


                             <input type = "checkbox" name = "acucar" value = "1" />Açúcar
                             <input type = "checkbox" name = "adocante_aspartame" value = "1" />Adoçante aspartame
                             <input type = "checkbox" name = "adocante_sucralose" value = "1" />Adoçante sucralose
                             <br />


                             <label for = "verduras">Verduras: </label>
                             <input type = "text" id = "verduras" size = "80" name = "verduras" />
                             <br />

                             <label for = "legumes">Legumes: </label>
                             <input type = "text" id = "legumes" size = "80" name = "legumes" />
                             <br />

                             <label for = "frutas">Frutas: </label>
                             <input type = "text" id = "frutas" size = "80" name = "frutas" />
                             <br />

                             <label for = "leite_derivados">Leite e Derivados: </label>
                             <input type = "text" id = "leite_derivados" size = "80" name = "leite_derivados" />
                             <br />

                             <label for = "cereais">Cereias: </label>
                             <input type = "text" id = "cereais" size = "80" name = "cereais" />
                             <br />

                             <label for = "leguminosas">Leguminosas: </label>
                             <input type = "text" id = "leguminosas" size = "80" name = "leguminosas" />
                             <br />

                             <input type = "checkbox" name = "creme_milho" value = "1" />Creme de milho
                             <input type = "checkbox" name = "creme_palmito" value = "1" />Creme de Palmito
                            <br />

                            <input type = "checkbox" name = "cha" value = "1" />Chá
                            <input type = "checkbox" name = "agua_coco" value = "1" />Água de Côco
                            <input type = "checkbox" name = "iogurte_comum" value = "1" />Iogurte Comum
                            <input type = "checkbox" name = "iogurte_desnatado" value = "1" />Iogurte Desnatado
                            <label for = "obs">Obs: </label>
                            <input type = "text" id = "obs" size = "30" name = "observacao" />

                            <br />
                            Molhos
                            <input type = "checkbox" name = "sugo" value = "1" />Sugo
                            <input type = "checkbox" name = "ervas_finas" value = "1" />Ervas Finas
                            <input type = "checkbox" name = "branco" value = "1" />Branco
                            <input type = "checkbox" name = "champignon" value = "1" />Champignon
                            <input type = "checkbox" name = "alcaparras" value = "1" />Alcaparras
                            <input type = "checkbox" name = "madeira" value = "1" />Madeira
                            <label for = "obs1">Obs: </label>
                            <input type = "text" id = "obs1" size = "30" name = "observacao_molhos" /><br />

                            Sucos:
                            <input type = "checkbox" name = "acerola_mamao" value = "1" />Acerola c/mamão
                            <input type = "checkbox" name = "abacaxi" value = "1" />Abacaxi
                            <input type = "checkbox" name = "caju" value = "1" />Caju
                            <input type = "checkbox" name = "manga" value = "1" />Manga
                            <input type = "checkbox" name = "uva" value = "1" />Uva
                            <input type = "checkbox" name = "maracuja" value = "1" />Maracujá
                            <input type = "checkbox" name = "morango" value = "1" />Morango
                            <input type = "checkbox" name = "pessego" value = "1" />Pêssego
                            <input type = "checkbox" name = "laranja_mamao" value = "1" />Laranja c/mamão
                            <input type = "checkbox" name = "melancia" value = "1" />Melancia
                        </fieldset>

                        <label for "historico_evolucao">Histórico e Evolução Nutricional</label><br />
                        <textarea id = "historico_evolucao" cols = "100" rows = "20"name = "historico_evolucao_nutricional"></textarea>
                        <br />
                        <input type = "submit" value = "Cadastrar" />