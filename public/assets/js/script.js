

$(document).ready(function() {
    $.validator.addMethod("definedVal", function(value) {
        let statut = ["en attente", "approuvé", "rejeter"];
        return statut.includes(value);
    }, '- valeur n\'est pas définit');
    
    $.validator.addMethod('extensionF', function(value, element, param) {
    
        let extension = ["jpg", "png", "doc", "docx"];
        let fileextension = element.files[0].name.split(".").pop();
        return extension.includes(fileextension);
    }, '- le fichier doit etre jpeg, png, doc ou docx');
    
    $.validator.addMethod('filesize', function(value, element, param) {
        console.log(element.files[0].size);
        return (element.files[0].size <= param) ;
    }, '- la taile ne doit pas depasser 1Mo');
    
    $.validator.addMethod('obligatoire', function(value, element, param) {
        console.log(value);
        console.log(element);
        console.log(param);
        return false;
    }, '- la taile ne doit pas depasser 1Mo');

    $("#form").validate({
        rules : {
            titre : {
                required : true,
                maxlength: 60,

            },
            // file : {
            //     extensionF: true,
            //     filesize : 1048576,
            // },
            message : {
                required: true,
                maxlength: 300,

            },
            statut : {
                required : true,
                definedVal : true
            },
        },
        messages : {
            titre : {
                required : '- Champ obligatoire.',
                maxlength : '- Max est 60 Caractere',
            },
            // file : {
            //     extensionF : '- le fichier doit etre jpeg, png, doc ou docx',
            //     filesize : '- la taile ne doit pas depasser 1 Mo',
            // },
            message : {
                required: '- Champ obligatoire.',
                maxlength : '- Max est 300 Caractere',
            },
            statut : {
                required: '- Champ obligatoire.',
                definedVal : '- Valeur n\'est pas définit.',
            },
        }
    });
});


