# consultas-publicas-filtra-spammers
Filtra comentários repetidos de consultas públicas. Exemplo: [piu-vila-leopoldina](minuta.gestaourbana.prefeitura.sp.gov.br/piu-vila-leopoldina)

![Alt text](screenshot-2018-6-12.png?raw=true "Comentários repetidos")

Para acessar dados

* `output_type` deve ser `name` ou `memid` para retornar nomes ou ids dos comentários repetidos
* `id_consulta`  valor numérico da consulta no banco de dados
* `spam_characteres` valor numérico. Define o número de strings a dividir o documento de texto `spam.txt` 
* `textpath` caminho de arquivo txt a ser verificado. Arquivos desta análise estão em `spam_templates/`

> Exemplo de url
http://localhost:7080/consultas-publicas-filtra-spammers/?output_type=name&id_consulta=5&spam_characteres=60&textpath=spam_templates/spam_0.txt