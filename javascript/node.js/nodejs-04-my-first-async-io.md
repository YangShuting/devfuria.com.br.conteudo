---
title:       Nodeschool - My First Async I/O!
description: Quarto exercício (My First Async I/O!) do Node.js da lista learnyounode da Nodeschool
---

{% include /alertas/js-ns-paraquedas.html %}


### Exercício

Escreva um programa que usa uma única operação assíncrona de sistema de arquivos para ler um arquivo e imprimir o número 
de novas linhas que ele contém no console (stdout), algo similar à executar `cat file | wc -l`.

O caminho completo até o arquivo à ser lido será fornecido como primeiro argumento da linha de comando.



### Dicas

A solução para este problema é parecida com a solução do problema anterior, a diferença  é que faremos de forma assíncrona.
Em vez de `fs.readFileSync()` você deve utilizar `fs.readFile()`.

Saiba que callbacks tradicionais do Node.js normalmente têm a seguinte assinatura:

```javascript
function callback (err, data) { /* ... */ }
```

Portanto, ao invés de utilizar o retorno do método...

```javascript
// errado !!!
var data = fs.readFile();
```

..devemos coletar o valor de uma função de callback que você irá passar como segundo argumento `fs.readFile(file, callback)`,
veja o exemplo abaixo.

```javascript
// certo !!!
fs.readFile(file, function (err, data)) {
    //
    // aqui sim você poderá utilizar o valor da variável `data`
    // pois é ela quem contém o "retorno da função"
    //
})
```

Além disso, podemos checar se um erro ocorreu checando se o primeiro argumento é verdadeiro.


### Solução

```javascript
// program04a.js
var fs   = require('fs')
var file = process.argv[2]

fs.readFile(file, function (err, contents) {
  var lines = contents.toString().split('\n').length - 1
  console.log(lines)
})
```

Assim como `readFileSync()`, você pode fornecer 'utf8' como segundo argumento e colocar o callback como terceiro 
argumento, assim você terá uma string ao invés de um buffer.


```javascript
// program04b.js
var fs   = require('fs')
var file = process.argv[2]

fs.readFile(file, 'utf8', function (err, contents) {
  var lines = contents.split('\n').length - 1
  console.log(lines)
})
```


{% include call.html
    style="success"
    title="Próximo exercício"
    descr="Filtered LS"
    href="/javascript/node.js/nodejs-05-filtered-ls/"
    label="Ver matéria!"
%}