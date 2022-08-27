# Instruções para as rotas.
### Para gerar uma hash.
Utilizar metodo POST:

Link: "http://localhost:8000/api/hash/generate"

Obrigatório passar no body um JSON contendo a string a ser gerada.

Por exemplo:

<code>
{
    "string": "datum"
}
</code>

### Para Buscar os Registros salvos.
Utilizar metodo GET:

Link: "http://localhost:8000/api/hash/list"


###### Filtrando
Para passar o filtro como parâmetro basta adicionar o parâmetro qnty.

Por exemplo:

Link: "http://localhost:8000/api/hash/list?qnty=15000"

Assim filtraremos os resultados com menos do que 15000 tentativas para encontrar a hash.

# Instruções para rodar o comando.

Para executar o comando que ira gerar as hash's, basta usar da forma como abaixo.

<code>
php artisan avato:teste "datum" 20
</code>

Assim o comando ira executar durante 20 repetições respeitando o limite de requisições da api.

Caso o parâmetro de quantidade não seja passado, sera utilizado o default de 100.


# Solução e decisão

Durante todo o desenvolvimento foi decidido usar os padrões conhecidos.

Separamos o gerador de string aleatória em um "helper" para caso seja necessário para outra ação da nossa aplicação no futuro.

O mesmo para o gerador de hash, ele está em um serviço do hash para poder ser chamado em algum outro local caso seja necessário.

Os repositórios foram separados de uma forma que fique mais organizado e fácil de se usar.
Temos o "BaseRepository" onde todo repositório herdaria ele para os comandos que são em comum para todos.
Temos também o "HashRegistreRepository" que além de poder, usar todas as funções do "BaseRepository" ele poderá ter também as funções mais exclusivas dele, como no caso da função que retorna os registros filtrados ou não caso seja passado um filtro.

Assim conseguimos deixar a nossa aplicação com uma boa organização e conseguimos facilmente deixar cada qual responsável apenas pelo seu objetivo, evitando sobrecarregar um Controller ou uma Model, ou qualquer outra classe, com partes que não fazem sentido para ambos.
