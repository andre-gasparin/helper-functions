<p align="center">
<img src="https://img.shields.io/badge/VERSÃO-1.0.0-green">
<img src="https://img.shields.io/badge/Licença-GNU 3.0-success">
<img src="https://img.shields.io/badge/PHP-Adianti-blue">
<img src="https://img.shields.io/badge/PHP->7.2-blueviolet">
</p>

# Funções auxiliares
Helper com algumas funções de rotinas diárias

# Utilizando no Adianti Framework
Caso você utilize adianti, apenas coloque o arquivo na pasta app/lib/Helper.php e utilize em qualquer lugar do framework.

# Funções
<b>Helper::n2br($number);</b><br>
Transforma número para o formato brasileiro.<br>
<br>
<b>Helper::n2bd($number);</b> <br>
Transforma número para o formato do banco de dados.<br>
<br>
<b>Helper::d2br($date);</b> <br>
Transforma data informada para o formato brasileiro, ainda com opcionais:<br>
now = mostra data atual. <br>
nowtime = mostra data e hora atual.<br>
<br>
<b>Helper::d2bd($date);</b> <br>
Transforma data informada para o formato do banco de dados, ainda com opcionais:<br>
now = mostra data atual. <br>
nowtime = mostra data e hora atual.<br>
<br>
<b>Helper::existon('teste', $phrase));</b> <br>
Verifica se existe a palavra "teste" na frase $phrase.<br>
<br>
<b>Helper::exist(isset($param['teste'])));</b> <br>
Verifica se a variavel citada existe.<br>
<br>
<b>Helper::exist(@$param['teste']));</b> <br>
Verifica se a variavel citada existe ignorando o notice.<br>
<br>
<b>Helper::exist(isset($param['teste']));</b> <br>
Verifica se a variavel citada existe, modelo de uso para não dar notice.<br>
<br>
<b>Helper::count($teste);</b> <br>
Conta quantos elementos tem na array e caso seja uma string a quantidade de letras da mesma<br>
<br>
<b>Helper::replace('teste', 'efeito',$phrase);</b> <br>
Substitui o 'teste' por 'efeito' na $phrase, obs, pode ser utilizado arrays ex. ['teste', 'outroteste']<br>
<br>
<b>Helper::allerror();</b><BR>
 Mostra todos os erros (inserir no inicio da página)<br>
<b>Helper::noerror();</b> <br> 
  Oculta todos os erros (inserir no inicio da página)<br>
<b>Helper::noticeofferror();</b> <br>
  Oculta os erros "notice" somente (inserir no inicio da página)<br>
        <br>
<b>Helper::ddt($phrase);</b><br>
Exibe o retorno com a data<br>
<br>
<b>Helper::dnl($teste);</b><br>
Exibe o que existe na variavel, seja array, objeto ou string<br>
<br>
<b>Helper::dd($teste);</b><br>
Exibe o que existe na variavel, seja array, objeto ou string e mata a aplicação (exit())<br>
<br>
# Modelo de Utilização
        //Variaveis de teste
        $number = '1.650,123';
        $datebd = date('Y-m-d');
        $datetimebd = date('Y-m-d H:i:s');
        $datebr = date('d/m/Y');
        $datetimebr = date('d/m/Y H:i:s');
        $phrase = 'Minha frase de teste!';


        //Funções
        echo '<br> <b>Helper::n2br</b> <br>';
        echo Helper::n2br($number); // 1.650,123
        echo '<br> <b>Helper::n2bd</b> <br>';
        echo Helper::n2bd($number); // 1650.123

        echo '<br><br><b>Helper::d2br</b> <br>';
        echo Helper::d2br($datebd); // 24/12/2020
        echo '<br> <b>Helper::d2br</b> <br>';
        echo Helper::d2br($datetimebd); //24/12/2020 09:48:12


        echo '<br><br> <b>Helper::d2bd</b> <br>';
        echo Helper::d2bd($datebr); //2020-12-24
        echo '<br><b> Helper::d2bd</b> <br>';
        echo Helper::d2bd($datetimebr); //2020-12-24 09:48:12
        echo '<br>';
       
        echo '<br><br> <b>Helper::d2br NOW</b> <br>';
        echo Helper::d2br('now'); // 24/12/2020
 
        echo '<br><br><b> Helper::d2br NOWTIME</b> <br>';
        echo Helper::d2br('nowtime'); // 24/12/2020
      
        echo '<br><br> <b>Helper::d2bd NOW</b><br>';
        echo Helper::d2bd('now'); // 24/12/2020
 
        echo '<br><br> <b>Helper::d2bd NOWTIME</b> <br>';
        echo Helper::d2bd('nowtime'); // 24/12/2020
      
        echo '<br><br> <b>Helper::existon</b> <br>';
        if( Helper::existon('teste', $phrase)) // true
            echo 'Existe';
      
        echo '<br><br> <b>Helper::exist  (array ou string)</b> <br>';
        if( Helper::exist(isset($param['teste']))) // false
            echo 'Existe';
     
       echo '<br><br> <b>Helper::exist  (array ou string)</b> <br>';
       if( Helper::exist(@$param['teste'])) // false
            echo 'Existe';

       echo '<br><br> <b>Helper::exist  (array ou string)</b> <br>';
       $param['teste'] = ['1','2'];
       if( Helper::exist(isset($param['teste']))) // true
             echo 'Existe';
      
        echo '<br><br> <b>Helper::count  (array)</b> <br>';
        $teste = ['abcd', 'asfa', [3,4]];
        echo Helper::count($teste); // 3

        echo '<br><br> <b>Helper::count  (string)</b> <br>';
        $teste = '123456';
        echo Helper::count($teste); // 6

        echo '<br><br> <b>Helper::replace</b> (string) <br>';
        echo Helper::replace('teste', 'efeito',$phrase); //Minha frase de efeito!

        echo '<br><br> <b>Helper::replace</b> (array => string) <br>';
        echo Helper::replace(['teste', 'frase'], 'efeito',$phrase); //Minha efeito de efeito!

        echo '<br><br> <b>Helper::replace</b>  (array => array) <br>';
        echo Helper::replace(['teste', 'frase'], ['efeito', 'palavra'],$phrase); //Minha palavra de efeito!

        Helper::allerror(); // mostra todos os erros (inserir no inicio da página)
        Helper::noerror(); // oculta todos os erros (inserir no inicio da página)
        Helper::noticeofferror(); // oculta os erros "notice" somente (inserir no inicio da página)
        
        echo '<br><br> <b>Helper::ddt</b>  (array => array) <br>';
        echo Helper::ddt($phrase); //Minha palavra de efeito!


        $teste = ['abcd', 'asfa', [3,4]];
        echo '<br> <b>Helper::dnl</b>  (array => array) <br>';
        echo Helper::dnl($teste); //Minha palavra de efeito!

        echo '<br> <b>Helper::dd  (array ou string)</b> <br>';      
        Helper::dd($teste);

        echo 'DD parou a aplicação, isso não vai aparecer!';

