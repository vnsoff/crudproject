# CrudProject
<h2>Sobre o teste</h2>
<p>Foi implementado dois sistemas de CRUD (Create, Read, Update e Delete), o primeiro utilizando apenas com PHP e o segundo, utilizando o framework CodeIgniter 4. </p>
<p>Em ambos foi utilizado o Bootstrap e um pouco de Javascript. </p>
<p>O banco de dados utilizado foi o Mysql como solicitado, instalado por meio do xampp. </p>
<p> A estrutura do CRUD em PHP foi composta por um arquivo principal index e um para cada operação de cada tabela, ja com o CodeIgniter 4 a estrutura está um pouco diferente, as tabelas estão em páginas diferentes, há um controller, model e index para cada tabela.</p>
<p> Os tipos de dados utilizados no mysql foram INT com auto incremento para o ID, VARCHAR para o nome nas duas tabelas, BIGINT(14) para o cnpj, INT para o valor e por fim ENUM pré definido para o status ao invés do BOOLEAN pois foi mais eficiente.</p>
<p> O crud em PHP puro está funcionando 100% sem pendências, já o crudigniter que utiliza o CodeIgniter 4 como framework, há uma pendência relacionada ao Update dos dados. </p>
