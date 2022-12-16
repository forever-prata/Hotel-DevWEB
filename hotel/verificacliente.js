const form = document.querySelector("#cadU");

form.onsubmit = e => {

    //pega valores
    var nome = document.querySelector("#nome").value;
    var email = document.querySelector("#floatingEmail").value;
    var cpf = document.querySelector("#cpf").value;
    var telefone = document.querySelector("#telefone").value;

    //Valida
    if (nome === ""){
        e.preventDefault(); 
        document.getElementById("msg").innerHTML = "<p>Informe um Nome</p>"
        return;
    }else{
        if (nome.length < 2){
            e.preventDefault();
            document.getElementById("msg").innerHTML = "<p>Nome Inválido</p>" 
            return;
        }
    }

    if (email === ""){
        e.preventDefault(); 
        document.getElementById("msg").innerHTML = "<p>Informe um Email</p>"
        return;
    }

    if (cpf === ""){
        e.preventDefault(); 
        document.getElementById("msg").innerHTML = "<p>Informe um CPF</p>"
        return;
    }else{
        if (cpf.length < 11){
            e.preventDefault();
            document.getElementById("msg").innerHTML = "<p>CPF Inválido</p>" 
            return;
        }
    }

    if (telefone === ""){
        e.preventDefault(); 
        document.getElementById("msg").innerHTML = "<p>Informe um Telefone</p>"
        return;
    }else{
        if (telefone.length < 10){
            e.preventDefault();
            document.getElementById("msg").innerHTML = "<p>Telefone Inválido</p>" 
            return;
        }
    }

}