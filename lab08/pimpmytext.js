function hello(){
    var x =document.getElementById("Text");
    var size = 12;
    var increasing = setInterval(function(){
        var max = 24;
        size = size + 2;
        x.style.fontSize = size+"pt";
        console.log(size)
        if(size === max){
            clearInterval(increasing);
        }
    },300)
}

function bling(){
    var x = document.getElementById("Text");
    x.style.textDecoration="underline";
    x.style.color="green";
    var y = document.getElementsByTagName("BODY")[0];
    document.body.style.backgroundImage = 'url("https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/8/hundred.jpg")'
}

function snoopi(){
    document.getElementById("Text").value = "Hello"
}

function pig(){
    var text = document.getElementById("Text").value;
    var list = text.split(" ")
    var vowel = ['a','e','i','o','u']
    for(var i = 0;i<list.length;i++){
        var char = list[i].split("");
        while(!vowel.includes(char[i].charAt(0))){
            var vow = char[0];
            char.shift();
            char.push(vow);
        }
        list[i] = char.join("") + "ay";
    }
    document.getElementById("Text").value = list.join(" ");
}

function Malkovitch(){
    var sent = document.getElementById("Text").value
    var list = sent.split(" ")
    for(var i = 0;i<list.length;i++){
        if(list[i].length >= 5){
            list[i] = "Malkovitch";
        }
    }
    document.getElementById("Text").value = list.join('')
    
}