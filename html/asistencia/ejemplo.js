$(document).ready(function(){
 $("select[name=color1]").change(function(){
            alert($('select[name=color1]').val());
            $('input[name=valor1]').val($(this).val());
        });
 $("select[name=mio]").change(function(){
            alert("funcionando");

        });
});
