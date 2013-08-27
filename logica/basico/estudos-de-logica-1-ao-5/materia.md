Estudos de lógica com respostas (1 ao 5)
========================================

Não vamos criar programas completos e profissionais, nada disso. Construiremos apenas pequenos trechos de códigos para
exercitar o raciocínio e desenvolver uma intimidade com a linguagem.


Nota antes de começarmos
------------------------

Os exercícios iniciais foram adaptados para a realidade do desenvolvimento web. Em programas desktop a simples instrução
 “leia o valor digitado do usuário” significa que o sistema fará uma pausa é esperará o usuário digitar alguma coisa.
Já em programas para web (aplicações web) pedir para o usuário digitar algo significa ter que construir um formulário
HTML, enviar esses dados para um script, receber esses dados “via protocolo HTTP”, e finalmente, processar a informação.
Pensando nisso e com o objetivo de facilitar a vida do iniciante em programação, optei por trabalhar com valores
arbitrários, ou seja, valores são definidos pelo programador e atribuídos diretamente no código fonte sem a interferência
do usuário.


*IMPORTANTE: O aprendizado da lógica se faz a passos lentos, bem lentos. Leia o exercício mas não veja a solução enquanto
não tiver “suado a camisa”. Normalmente, leva-se de 10 a 20 minutos em cada exercício, cronometre o seu tempo e não
desista antes dos 20 minutos pensando  na solução (o tempo para desenhar o diagrama e para executar o teste de mesa não
contam). Em um curso formal (acadêmico), a disciplina lógica de programação dura um semestre inteiro. Se você nunca viu
programação antes, dê-se pelo menos 6 meses de amadurecimento em lógica.*

Inspirado nos <a href="http://fit.faccat.br/~fpereira/apostilas/exerc_resp_alg_mar2007.pdf">91 exercícios</a> de
Flávia Pereira de Carvalho.




Exercício 1
-----------

Escreva um algoritmo que armazene o valor 10 em uma variável denominada “num\_a” e também o valor 20 em uma variável
denominada “num\_b”. Agora, apenas com o uso de atribuições (vimos isto em artigos anteriores) passe o valor de num\_a
para num\_b e imprima os resultados.

#### Solução (comentada)

Você entendeu o problema e o que se espera dele? É importante que o enunciado seja lido com atenção e que ele não deixe
dúvidas ou seja ambíguo.

Esse primeiro exercício é bastante básico, o objetivo é apenas “quebrar o gelo”. Comece rascunhando a solução, passe a
limpo, faça o diagrama e aplique o teste de mesa. Se estiver seguro, parta para a codificação (transformar o algoritmo
em código fonte).

As primeiras atribuições são fáceis...

<div class="code menor">
<h6>PSEUDOCÓDIGO</h6>
<pre>num_a = 10

num_b = 20</pre>
</div>

Vamos pensar no resultado final

<div class="code">
<h6>PSEUDOCÓDIGO</h6>
<pre>imprimir num_a, num_b

// mostra na tela “20, 10”</pre>
</div>

O que fazer para trocar os valores de uma variável para a outra? Esse é o foco do problema. Se utilizar uma variável a
mais, podemos resolver dessa forma...

<div class="code">
<h6>PSEUDOCÓDIGO</h6>
<pre><em>INÍCIO</em>

// Inicializar as variáveis
num_a = 10
num_b = 20
num_c = 0

// Efetuar a troca
num_c = num_a
num_a = num_b
num_b = num_c

// Mostrar na tela
imprimir num_a, num_b

<em>FIM</em></pre>
</div>


Agora em php...

<div class="code">
<h6>PHP - Solução para o exercício 1</h6>
<pre>&lt;?php

// Inicializar as variáveis
$num_a = 10;
$num_b = 20;
$num_c = null; // inicializamos os variáveis com null em PHP.

// Efetuar a troca
$num_c = $num_a;
$num_a = $num_b;
$num_b = $num_c;

// Mostrar na tela
echo “$num_a, $num_b”;
?&gt;</pre>
</div>




Exercício 2
-----------

Escreva um algoritmo que mostre a área quadrada de um espaço qualquer (os valores desse espaço são atribuídos
arbitrariamente pelo programador)

#### Solução (comentada)

A primeira lição que tiramos deste exercício é a diferença entre “lógica pura” e “conhecimento alheio”. Neste caso,
conhecimento alheio é saber que o metro quadrado é obtido através de uma simples multiplicação(lado x lado) e lógica pura
seria o algoritmo que expressa a multiplicação de dois números.

Se este exercício estivesse escrito assim “escreva um algoritmo para calcular as área de um retângulo de dimensões
quaisquer” ele teria a mesma solução, então vamos à ela.

Sabendo que temos que multiplicar dois números para encontrar o metro quadrado a solução aparece rapidamente...

<div class="code">
<h6>PHP - Solução para o exercício 2</h6>
<pre>&lt;?php

$lado_um = 7;   // poderia ser qualquer valor
$lado_dois = 2; // poderia ser qualquer valor

$metro_quadrado = $lado_um * $lado_dois;

echo $metro_quadrado; // mostra na tela “14”
?&gt;</pre>
</div>



Exercício 3
-----------

Escreva um algoritmo para mostrar o sucessor e o antecessor de um número qualquer.

#### Solução (comentada)

<div class="code">
<h6>PSEUDOCÓDIGO</h6>
<pre><em>INÍCIO</em>

// Inicia as variáveis
numero     = 0
numero_ant = 0
numero_suc = 0

// Efetua a operação
numero     = 45;
numero_ant = numero - 1
numero_suc = numero + 1

// Mostra os resultados obtidos
mostrar numero_suc, numero_ant

<em>FIM</em></pre>
</div>



Exercício 4
-----------

Calcular o total de dias de n meses, considerando que os meses tenham 30 dias.

#### Solução

<div class="code">
<h6>PSEUDOCÓDIGO</h6>
<pre><em>INÍCIO</em>

n_meses = 3 // valor arbitrário

total_de_dias  = n_meses * 30

mostrar total_de_dias

<em>FIM</em></pre>
</div>




Exercício 5
-----------

Faça um algoritmo que mostre e calcule o reajuste de um salário qualquer. O salário e o reajuste serão valores quaisquer
e a saída mostrará o valor do reajuste e o salário reajustado.

#### Solução (comentada)

O objetivo deste exercícío é apenas ganhar prática. Seu nível de dificuldade é extremamente baixo e não envolve o uso de
nenhuma ferramenta, basta lógica pura. O ideal seria os valores de salário e percentual de reajuste fossem inseridos
pelo usuário, mas como estamos construíndo aplicações web, precisaríamos desenhar um formulário, tarefa que enfrentaremos
em outro momento.

Apresentamos apenas o pseudo-código, mas não deixe de fazer os diagramas, o teste de mesa e transcreva o algoritmo para
uma linguagem de programação (no caso PHP).

<div class="code">
<h6>PSEUDOCÓDIGO</h6>
<pre><em>INÍCIO</em>

salario = 1000

perc_reajuste = 0.05 // 0.05 é igual a 5%

valor_reajuste = salario * perc_reajuste

salario_reajustado = salario + valor_reajuste

mostrar valor_reajuste, salario_reajustado

<em>FIM</em></pre>
</div>