<?php
/**
 * JS
 */
/**
 * Includes
 */
require "../../../core/boot.php";
$url = "/checkbox-checked/";
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <?php
        $core->head->setTitle('Javascript - Ler valores dos checkbox que estiverem checkados');
        $core->head->setDescription('Controle de checkbox em javascript, verificar se os CheckBox foram marcados.');
        $core->head->setkeywords('');
        $core->head->setAuthor();
        include BASE_PATH . VIEWS_PATH . "/head.php";
        ?>
    </head>
    <body>

        <?php
        $core->navtop->secao_ativa = Core::SECAO_JS;
        include BASE_PATH . VIEWS_PATH . "/nav-top.php";
        ?>

        <!-- Título -->
        <div class="bs-header" id="content">
            <div class="container">
                <h1>Manipulando check boxes com JavaScript</h1>
                <p>checkbox.checked=true</p>
                <p>checkbox.checked=false</p>
                <p></p>
            </div>
        </div>

        <!-- Linha abaixo do título -->
        <div class="bs-old-docs">
            <div class="container">
                Flávio Micheletti, atualizado em <span class="label label-success">21/02/2014</span>, escrito em <span class="label label-info">21/02/2014</span>.
            </div>
        </div>

        <!-- Matéria -->
        <div class="container bs-docs-container">
            <div class="row">

                <!-- navegação lateral esquerdo -->
                <div class="col-md-3">
                    <div class="bs-sidebar hidden-print" role="complementary">
                        <ul class="nav bs-sidenav">
                            <li><a href="#formulario-web">O formulário web</a></li>
                            <li>
                                <a href="#codando">Codando</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Corpo da matéria -->
                <div class="col-md-9" role="main">



                    <div class="bs-docs-section">
                        <div class="page-header">
                            <h2 id="formulario-web">O formulário web ...</h2>
                        </div>

                        <p>Checkboxes são controles "booleanos" (modo de dizer). Eles ou estão ligados (true) ou
                        estão desligados (false).</p>

                        <p>Veja o abaixo o formulário web que trabalharemos.</p>

                        <div class="bs-example">
                            <img class="img-rounded" alt="### Formulário com checkboxes" src="form-checkboxes.png">
                        </div>


                        <div class="code">
                            <h6>form.php</h6>
                            <pre><code class="language-html">&lt;!DOCTYPE html&gt;
&lt;html lang="pt-br"&gt;
    &lt;head&gt;
        &lt;title&gt;Form de exemplo com checkboxes&lt;/title&gt;
        &lt;meta charset="utf-8"&gt;
    &lt;/head&gt;
    &lt;body&gt;
        &lt;form action="form-action.php" method="post"&gt;
            &lt;p&gt;
                &lt;input type="checkbox" id="chkBike" value="on"&gt;I have a bike
            &lt;/p&gt;
            &lt;p&gt;
                &lt;input type="checkbox" id="chkCar" value="on"&gt;I have a car
            &lt;/p&gt;
            &lt;p&gt;
                &lt;input type="button" id="btnSubmit" value="Submit me!" /&gt;
                &lt;input type="button" id="btnLoad" value="Load!" /&gt;
            &lt;/p&gt;
        &lt;/form&gt;
        &lt;script type="text/javascript" src="checkboxes.js"&gt;&lt;/script&gt;
    &lt;/body&gt;
&lt;/html&gt;
</code></pre>
                        </div>

                        <p>Nossos objetivos são:</p>

                        <p>1) Programar o evento do botão "Submit me!" para que ele descubra se as duas checkboxes
                            (bike e car) estão desligadas ou não e...</p>

                        <p>2) Programar o botão "Load" para carregar, aleatóriamente, as checkboxes. Simulando, dessa
                            forma, o carregamento de um formulário com dados de verdade.</p>



                    </div>



                    <div class="bs-docs-section">
                        <div class="page-header">
                            <h1 id="codando">Codando</h1>
                        </div>




                        <p>Vou utilizar uma variável <code>myApp</code> para conter todo o meu código e dessa forma
                            evitar <strong>poluir o espaço global de variáveis</strong></p>

                        <pre><code class="language-javascript">var myApp = {}</code></pre>

                        <p>Eu estou prevendo que utilizarei pelo menos uma função. Por enquanto a chamarei de <code>init</code>
                            porque imagino que ela irá iniciar meu objeto.</p>

                        <pre><code class="language-javascript">var myApp = {
    init: function() {
    }
}</code></pre>
                        <p>Agora eu posso inicializar o objeto chamando a função <code>init</code> da seguinte maneira...</p>

                        <pre><code class="language-javascript">var myApp = {
    init: function() {
    }
};
myApp.init();
</code></pre>

                        <p>Eu sei que posso fazer a chamada da função ao atribuir o objeto a variável, então...</p>

                        <pre><code class="language-javascript">var myApp = {
    init: function() {
    }
}.init();
</code></pre>
                        <p>Para ver se está tudo funcionando eu vou ver se a função <code>init</code> imprime alguma coisa.</p>


                        <pre><code class="language-javascript">var myApp = {
    init: function() {
        console.log("alguma coisa");
    }
}.init();
</code></pre>
                        <p>Meu objetivo é capturar os 2 botão do nosso formulário, o "Submit me!" e o "Load".</p>

                        <pre><code class="language-javascript">var myApp = {
    init: function() {
        var btnSubmit = document.getElementById("btnSubmit");
        var btnLoad = document.getElementById("btnLoad");
    }
}.init();
</code></pre>

                        <p>Só que, por costume, eu quero utilizar as variáveis <code>btnSubmit</code> e <code>btnLoad</code>
                            como propriedades do meu objeto <code>myApp</code>.</p>

                        <pre><code class="language-javascript">var myApp = {
    btnSubmit: document.getElementById("btnSubmit"),
    btnLoad: document.getElementById("btnLoad"),
    init: function() {
    }
}.init();
</code></pre>

                        <p>Agora dentro da função <code>init</code> eu posso utilizar a palavra <code>this</code> para
                            referenciar as propriedades que, por sua vez, apontam para os controles do formulário.</p>

                        <pre><code class="language-javascript">var myApp = {
    btnSubmit: document.getElementById("btnSubmit"),
    btnLoad: document.getElementById("btnLoad"),
    init: function() {

        this.btnSubmit;

        this.btnLoad;
    }
}.init();
</code></pre>

                        <p>Vamos atribuir ao evento <code>onclick</code> uma função void (que não faz nada).</p>

                        <pre><code class="language-javascript">var myApp = {
    btnSubmit: document.getElementById("btnSubmit"),
    btnLoad: document.getElementById("btnLoad"),
    init: function() {

        this.btnSubmit.onclick = function() {
        }

        this.btnLoad.onclick = function() {
        }
    }
}.init();
</code></pre>


                        <p>Vamos testar, faça as funções lançarem um log.</p>

                        <pre><code class="language-javascript">var myApp = {
    btnSubmit: document.getElementById("btnSubmit"),
    btnLoad: document.getElementById("btnLoad"),
    init: function() {

        this.btnSubmit.onclick = function() {
            console.log("disparou onclik do botão Submit");
        }

        this.btnLoad.onclick = function() {
            console.log("disparou onclik do botão Load");
        }
    }
}.init();
</code></pre>

                        <p>Pode rodar e clicar nos botões. Está vendo alguma coisa?</p>

                        <p>Não? Abra o Firebug, a aba <strong>Console</strong>, clique nos botões, e agora?</p>

                        <p>Vou apenas comentar as linhas de console caso precise delas depois.</p>

                        <p>Nosso objetivo agora é referenciar as checkboxes para trabalharmos dentro das funções
                            que acabamos de criar, ok?</p>

                        <pre><code class="language-javascript">var myApp = {
    btnSubmit: document.getElementById("btnSubmit"),
    btnLoad: document.getElementById("btnLoad"),
    init: function() {

        this.btnSubmit.onclick = function() {
//            console.log("disparou onclik do botão Submit");
            var chkBike = document.getElementById("chkBike");
            var chkCar = document.getElementById("chkCar");

        }

        this.btnLoad.onclick = function() {
//            console.log("disparou onclik do botão Load");
            var chkBike = document.getElementById("chkBike");
            var chkCar = document.getElementById("chkCar");
        }
    }
}.init();
</code></pre>
                        <p>Preciso dizer que também vou colocá-las como propriedades?</p>

                        <pre><code class="language-javascript">var myApp = {
    btnSubmit: document.getElementById("btnSubmit"),
    btnLoad: document.getElementById("btnLoad"),
    chkBike: document.getElementById("chkBike"),
    chkCar: document.getElementById("chkCar"),
    init: function() {

        this.btnSubmit.onclick = function() {
//            console.log("disparou onclik do botão Submit");

        }

        this.btnLoad.onclick = function() {
//            console.log("disparou onclik do botão Load");
        }
    }
}.init();
</code></pre>

                        <p>Agora <strong>muito cuidado</strong>, queremos referenciar dentro das funções as proriedades
                            <code>chkBike</code> e <code>chkCar</code>. E podemos cair no seguinte erro:</p>


                        <pre><code class="language-javascript">/* ESTE CÓDIGO NÃO FUNCIONA */
var myApp = {
    btnSubmit: document.getElementById("btnSubmit"),
    btnLoad: document.getElementById("btnLoad"),
    chkBike: document.getElementById("chkBike"),
    chkCar: document.getElementById("chkCar"),
    init: function() {

        this.btnSubmit.onclick = function() {
//            console.log("disparou onclik do botão Submit");
            <em>this.chkCar;</em>

        }

        this.btnLoad.onclick = function() {
//            console.log("disparou onclik do botão Load");
        }
    }
}.init();
</code></pre>
                        <p>E aí, arrisca um palpite do porquê do erro?</p>

                        <p>O <code>this</code> sublinhado não aponta para a propriedade desejada e o console do FireBug
                            acusa que ela é indefinida (undefined).</p>

                        <p>O <code>this</code> não passa de uma variável e nossa função anônima fechou o escopo das
                            variáveis dentro da função.</p>
                        <p>Em outras palavras, <code>this</code> dentro da função aponta
                            para o botão submit, é isso mesmo, faça o teste:</p>

                        <pre><code class="language-javascript">var myApp = {
    btnSubmit: document.getElementById("btnSubmit"),
    btnLoad: document.getElementById("btnLoad"),
    chkBike: document.getElementById("chkBike"),
    chkCar: document.getElementById("chkCar"),
    init: function() {

        this.btnSubmit.onclick = function() {
//            console.log("disparou onclik do botão Submit");
            <em>console.log(this);</em>

        }

        this.btnLoad.onclick = function() {
//            console.log("disparou onclik do botão Load");
        }
    }
}.init();
</code></pre>

                        <p>O que mostra o console?</p>

                        <p>Nós voltaremos concerteza nessa questão, ela faz parte das características que tornam o Javascript
                            tão atraente. Por hora, vamos aprender apenas como contorná-la</p>

                        <p>A saída, mais utilizada (e única que conheco), é anotar o <code>this</code> (o outro, o que
                            relamente aponta para nosso objeto <code>myApp</code>) em uma variável qualquer e então
                            utilizar essa variável. Por conveção, utiliza-se um desses 2 nomes: <code>that</code> ou
                            <code>me</code>. Eu gosto de usar <code>me</code>.</p>

                        <pre><code class="language-javascript">var myApp = {
    btnSubmit: document.getElementById("btnSubmit"),
    btnLoad: document.getElementById("btnLoad"),
    chkBike: document.getElementById("chkBike"),
    chkCar: document.getElementById("chkCar"),
    init: function() {
        <em>var me = this;</em>

        this.btnSubmit.onclick = function() {
//            console.log("disparou onclik do botão Submit");
            <em>console.log(me);</em>

        }

        this.btnLoad.onclick = function() {
//            console.log("disparou onclik do botão Load");
        }
    }
}.init();
</code></pre>
                        <p>Agora podemos seguir com nosso código. Ufa!</p>

                        <p>Onde paramos mesmo? Haaa, agora só falta trabalhar com as checkboxes.</p>

                        <p>Posso ouvir você falar: "Aeeeee, até que emfim!!!"</p>

                        <p>É que essa é a parte mais fácil.</p>

                        <p>Para o botão "Submit me!, queremos saber se o valor da checkbox foi selecionado ou não
                            e tomaremos ações diferentes para cada caso, resumindo:</p>

                        <pre><code class="language-javascript">var myApp = {
    btnSubmit: document.getElementById("btnSubmit"),
    btnLoad: document.getElementById("btnLoad"),
    chkBike: document.getElementById("chkBike"),
    chkCar: document.getElementById("chkCar"),
    init: function() {
        var me = this;

        this.btnSubmit.onclick = function() {
<em>            // check 1
            if (me.chkBike.checked) {
                console.log("escolheu 'bike'");
            } else {
                console.log("não escolheu 'bike'");
            }

            // check 2
            if (me.chkCar.checked) {
                console.log("escolheu 'car'");
            } else {
                console.log("não escolheu 'car'");
            }</em>
        }

        this.btnLoad.onclick = function() {
//            console.log("disparou onclik do botão Load");
        }
    }
}.init();
</code></pre>

                        <p>Já para o botão "Load", queremos trocar o valor das checkboxes. Quer dizer, queremos ligar ou
                            desligar os valores. Como se estivéssemos carregando o formulário web.</p>

                        <pre><code class="language-javascript">var myApp = {
    btnSubmit: document.getElementById("btnSubmit"),
    btnLoad: document.getElementById("btnLoad"),
    chkBike: document.getElementById("chkBike"),
    chkCar: document.getElementById("chkCar"),
    init: function() {
        var me = this;

        this.btnSubmit.onclick = function() {
            // check 1
            if (me.chkBike.checked) {
                console.log("escolheu 'bike'");
            } else {
                console.log("não escolheu 'bike'");
            }

            // check 2
            if (me.chkCar.checked) {
                console.log("escolheu 'car'");
            } else {
                console.log("não escolheu 'car'");
            }
        }

        this.btnLoad.onclick = function() {
            // check 1
<em>            if (Math.floor(Math.random() * 2)) {
                me.chkBike.checked = true;
            } else {
                me.chkBike.checked = false;
            }

            // check 2
            if (Math.floor(Math.random() * 2)) {
                me.chkCar.checked = true;
            } else {
                me.chkCar.checked = false;
            }</em>
        }
    }
}.init();
</code></pre>

                        <p>Há um elemento estranho aí, veja</p>

                        <pre><code class="language-javascript">Math.floor(Math.random() * 2)</code></pre>

                        <p>Como estamos simulando o carregamento do formulário, eu quis fazer um valor randômico.</p>

                        <p>Se o seu código funcionou, clique várias vezes no botão "Load". Ele anota aleatóriamente
                            as combobox, certo?</p>

                        <p>Como as checkboxes trabalham com 2 valores, ligado e desligado, ou seja, 0 e 1. Eu precisava de
                            uma função que me retorna-se (aleatóriamente) os valores 0 e 1. E é isso que temos na
                            expressão misteriosa rsss.
                        </p>

                        <p>Momento Eureka: Vou abrir uma seção aqui no site que chama-se "referência" e fazer as referências
                            para estes casos.</p>

                        <p>Mas só para fechar a matéria, segue o código final.</p>


                        <div class="code">
                            <h6>checkboxes.js</h6>
                            <pre><code class="language-javascript">var myApp = {
    btnSubmit: document.getElementById("btnSubmit"),
    btnLoad: document.getElementById("btnLoad"),
    chkBike: document.getElementById("chkBike"),
    chkCar: document.getElementById("chkCar"),
    init: function() {
        var me = this;

        this.btnSubmit.onclick = function() {
            // check 1
            if (me.chkBike.checked) {
                console.log("escolheu 'bike'");
            } else {
                console.log("não escolheu 'bike'");
            }

            // check 2
            if (me.chkCar.checked) {
                console.log("escolheu 'car'");
            } else {
                console.log("não escolheu 'car'");
            }
        }

        this.btnLoad.onclick = function() {
            // check 1
            if (Math.floor(Math.random() * 2)) {
                me.chkBike.checked = true;
            } else {
                me.chkBike.checked = false;
            }

            // check 2
            if (Math.floor(Math.random() * 2)) {
                me.chkCar.checked = true;
            } else {
                me.chkCar.checked = false;
            }
        }
    }
}.init();
</code></pre>
                        </div>
                    </div>

                    <?php
                    $core->paginacao->link_ativo = $url;
                    $core->paginacao->descobrirAnteriorProxima($core->links[Core::SECAO_JS]);
                    include BASE_PATH . VIEWS_PATH . "/paginacao.php";
                    ?>
                </div><!-- Corpo da matéria -->
            </div><!-- row -->
        </div><!-- Matéria -->

        <footer class="bs-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1></h1>
                        <?php
                        $core->lista->setLinks($core->links, Core::SECAO_JS);
                        $core->lista->link_ativo = $url;
                        include BASE_PATH . VIEWS_PATH . "/lista-secao.php";
                        ?>
                    </div>
                </div>
            </div>
        </footer>
        <?php include BASE_PATH . VIEWS_PATH . "/footer-js.php"; ?>

    </body>
</html>