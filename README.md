# README

## Instruções para Configuração e Execução do Projeto

Este projeto foi desenvolvido para ser executado em um ambiente local utilizando o XAMPP. Abaixo estão as instruções necessárias para configurar e executar o projeto corretamente.

### Pré-requisitos

1. **XAMPP**: 
   - Caso você já tenha o XAMPP instalado em sua máquina, prossiga para a próxima etapa.
   - Se você não possui o XAMPP instalado, faça o download e instale a versão mais recente a partir do [site oficial](https://www.apachefriends.org/index.html).

### Configuração do Projeto

1. **Exportação do Projeto**:
   - Após clonar ou baixar o repositório do projeto, mova a pasta do projeto para o diretório `htdocs` do XAMPP. O caminho padrão para o `htdocs` no Windows é geralmente `C:\xampp\htdocs`.

2. **Execução do Projeto**:
   - Inicie o XAMPP e ative os módulos `Apache`.
   - Abra o navegador e acesse o projeto através do endereço `http://localhost/API%20Futebol/public.

### Sobre o Banco de Dados

- **Banco de Dados**: Este projeto **não** requer a configuração de um banco de dados, pois todas as operações são realizadas diretamente através de uma API externa.

### Considerações sobre a API

1. **Limitações da API**:
   - A API utilizada neste projeto **não suporta muitas requisições simultâneas** e pode apresentar instabilidades, como travamentos e lentidão.
   - Em caso de falha ou demora no carregamento das informações, é recomendado realizar alguns **reloads** na página para que os dados sejam exibidos corretamente.

2. **Pesquisa por ID de Time**:
   - Devido às limitações da API, **não foi possível implementar a funcionalidade de pesquisa de time por nome**. A API não permite essa consulta diretamente, e o excesso de requisições compromete a estabilidade do sistema.
   - Link do site da API para consultar IDs dos times, ligas, etc - https://www.football-data.org/coverage 
   - Caso exista uma solução bacana deste problema, estou muito curioso para aprender.

3. **Busca por ID de Times**:
   - Para buscar informações sobre times, utilize os **IDs de times europeus**, como os da Premier League, La Liga, Bundesliga, entre outros.
   - **Observação**: Os times brasileiros **não estão com os dados atualizados** na API, portanto, é recomendado evitar o uso de IDs de times brasileiros.
  
3. **Placares exibidos**:
   - A API exibe os placares como 0 x 0, e só exibirá os verdadeiros na versão paga.

### Conclusão

Este projeto foi desenvolvido com base nas limitações e funcionalidades disponíveis na API utilizada. É recomendado seguir as instruções acima para garantir a melhor experiência possível durante a execução do projeto. Em caso de dúvidas ou problemas, sinta-se à vontade para entrar em contato.

Agradeço pela compreensão!

---

**Desenvolvimento e contato**  
[Paulo Santos]  
[pauloeduardosdsilva@gmail.com]
