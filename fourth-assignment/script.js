var array = ["steve", "jone", "muse", "sara","jason"];

function speak(name){
    if(name.charAt(0) === 'j' || name.charAt(0) === 'J'){
        console.log("Goodbye  "+name);
    }
    else{
        console.log("Hello  "+name);
    }
}

for(var i = 0; i < array.length;i++){
    speak(array[i]);
}

