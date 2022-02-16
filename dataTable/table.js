$(document).ready(function(){

    $("#example").DataTable({


        "language":{
            "lengthMenu": "mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando 0 al 0 de un total de 0 registros",
            "infoFiltered": "(Filtrando de un total de _MAX_ registros)",
            "sSearch": "Buscar",
            "oPaginate":{
                "sFirts" : "Primero",
                "sLast" : "Último",
                "sNext" : "Sig..",
                "sPrevious" : "Ant..",
            },
            "sProcessing": "Procesando...",
        
        }

    }); 
});
