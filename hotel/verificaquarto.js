const form = document.querySelector("#cadQ");

form.onsubmit = e => {

    //pega valores
    var andar = document.querySelector("#andar").value;
    var capacidade = document.querySelector("#capacidade").value;

    //Valida

    if (andar === ""){
        e.preventDefault(); 
        document.getElementById("msg").innerHTML = "<p>Informe o Andar do Quarto</p>"
        return;
    }else{
        if (andar <= 0 || andar > 100){
            e.preventDefault();
            document.getElementById("msg").innerHTML = "<p>Informe um Andar Válido</p>" 
            return;
        }
    }

    if (capacidade === ""){
        e.preventDefault(); 
        document.getElementById("msg").innerHTML = "<p>Informe A Capacidade do Quarto</p>"
        return;
    }else{
        if (capacidade <= 0 || capacidade > 5){
            e.preventDefault();
            document.getElementById("msg").innerHTML = "<p>Informe uma Capacidade Válida</p>" 
            return;
        }
    }
}