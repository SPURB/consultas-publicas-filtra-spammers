# Consultas públicas filtra spammers
Filtra comentários repetidos de consultas públicas. Exemplo de consulta: [piu-vila-leopoldina-3](https://participe.gestaourbana.prefeitura.sp.gov.br/#/vila-leopoldina-projeto-de-lei). É uma aplicação que extende as consultas públicas do gestão urbana [documentação da api](https://github.com/SPURB/consultas-publicas-backend).


![Alt text](screenshot-2018-6-12.png?raw=true "Comentários repetidos")

# Exemplo de análise

## Url
http://localhost/consultas-publicas-filtra-spammers/?output_type=name&id_consulta=5&spam_characteres=60&textpath=spam_templates/spam_1.txt

## Varíaveis
* `output_type` deve ser `name` ou `memid` para retornar nomes ou ids dos comentários
* `id_consulta` valor numérico da consulta no banco de dados
* `spam_characteres` valor numérico. Define o número de strings a dividir o documento de texto `spam.txt` 
* `textpath` caminho de arquivo txt a ser verificado. Arquivos desta análise estão em `spam_templates/`

### Setup
Criar um arquivo no diretório acima da raiz deste projeto no padrão abaixo. `../bd.local.properties`
```
dbtype:mysql
host:127.0.0.1
port:3306
user:seuUsuario
password:suaSenha
dbname:nomeDoBancoDeDados
```
