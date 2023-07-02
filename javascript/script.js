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
