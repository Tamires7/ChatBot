<?php
# fazendo a importaçãp da classe Bot
include("Bot.php");

# criar o objeto para manipular o chatbot
$bot = new Bot();

# aqui vamos definir as perguntas e respostas do sistema
$questionso = [
    "O que é php" => "É  uma linguagem Server Side para Web.",
    "O que é um carro" => "É uma máquin que leva pessoas.",
    "O que é ML" => "É um sistema computacional que permite o aprendizado por equacionamento matemático.",
    "Quem é BTS " => "BTS, também conhecido como Bangtan Boys (hangul: 방탄소년단; hanja: 防彈少年團; rr: Bangtan Sonyeondan), 
    (em inglês um acrônimo de Beyond The Scene) é um grupo sul-coreano estreado pela Big Hit Entertainment em 2013.
    Esse grupo, tipicamente de K-Pop, é composto por sete membros: Jin, Suga, J-Hope, RM, Jimin, V e Jungkook.",
];

# receber a requisição com o valor enviado 
/*if (isset($_GET['msg']) ) {
    # converter todo o texto para caixa baixa 
    $msg = strtolower(($_GET['msg']));
    $bot->hears($msg, function (Bot $botty){
        global $msg;
        global $questions;

        # perguntas genéricas 
        // Generics questions
        $generics = ['oi','olá','ola','bom dia', 'boa tarde', 'boa noite'];
            
        if(in_array($msg, $generics)){
            //mostra a resposta no chat
            $botty->reply('olá. Em que posso te ajudar?');
        
        //se não encontrou, então vai procurar na lista de questions
        }elseif($botty->ask($msg, $questions)==""){
            $botty->reply('Desculpa. não entendi a pergunta.');
        //se encontrou uma chave que coincide com a pergunta
        }else{
            $botty->reply($botty->ask($msg, $questions));
        };
    });
}*/

if(isset($_GET['msg'])){
    $msg = strtolower(($_GET['msg']));

    // processa a requisição e utiliza o motor do bot para ler o valor
    $bot->hears($msg, function (Bot $botty){
        global $msg;
        global $questions;

        // Generics questions
        $generics = ['oi','olá','ola','bom dia', 'boa tarde'];

        if(in_array($msg, $generics)){
            //mostra a resposta no chat
            $botty->reply('olá. Em que posso te ajudar?');

        //se não encontrou, então vai procurar na lista de questions
        }elseif($botty->ask($msg, $questions)==""){
            $botty->reply('Desculpa. não entendi a pergunta.');
        //se encontrou uma chave que coincide com a pergunta
        }else{
            $botty->reply($botty->ask($msg, $questions));
        };
    });
}