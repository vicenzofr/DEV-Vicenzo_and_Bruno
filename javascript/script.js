function Insert(num){

     var numero= document.getElementById('result').innerHTML;
     document.getElementById('result').innerHTML = numero + num;
}
function limpar() {
    document.getElementById('result').innerHTML="";
}
function Volta(){
    var result = document.getElementById('result').innerHTML;
    document.getElementById('result').innerHTML= result.substring(0,result.length-1);
}
function Calcular(){
    var result = document.getElementById('result').innerHTML;
    if(result){
        document.getElementById('result').innerHTML=eval(result)
    }else{
        document.getElementById('result').innerHTML="Nada,Burro!"
    }
}


// function MostrarHistórico (){
//            var historicoText = "Histórico:\n";
//             for (var i = 0; i < historico.length; i++) {
//                 historicoText += historico[i] + "\n";
//             }
//             alert(historicoText);
// }


// function MostrarHistorico() {
//     var historicoText = "Histórico:\n";
//     for (var i = 0; i < historico.length; i++) {
//         historicoText += historico[i] + "\n";
//     }
//     alert(historicoText);
// }

// function AtualizarHistorico() {
//     var historicoDiv = document.getElementById('historicoDiv');
//     var historicoText = "Histórico:<br>";
//     for (var i = 0; i < historico.length; i++) {
//         historicoText += historico[i] + "<br>";
//     }
//     historicoDiv.innerHTML = historicoText;
// }