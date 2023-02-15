$('.db').click(function (){
    var id= $(this).attr('id');
    $.ajax({
        url:'dbGeneraleInfo.php?dbId='+id,
        success:function(data){
            $('#content-card').html(data);
        }
    })
})
$('#new-db').click(function (){
    $.ajax({
        url:'addDb.php',
        success:function(data){
            $('#content-card').html(data);
        }
    })
})

function ajouter(){
    $('#creer-db').click(function (){
        var nom=$('#db_name').val();
        if (nom != ''){
            $.ajax({
                type: 'POST',
                url: 'storeDb.php',
                data: {dbNom:nom},
                dataType: 'json'
            }).done(function(data){
                if (data==-1){
                    $('#db-error').html('la base de données avec le nom '+nom+' est deja exist !');
                }
                else if(data==0){
                    $('#db-error').html('erreur survenu a lhors de creation svp essayez dans qq secondes !');
                }
                else {
                    window.location='index.php?dbId='+data;
                }

            })
        }
        else {
            $('#db-error').html('le champ Nom est obligatoire !');
        }
    })
}

$('.edit-db').click(function (){
    var id = $(this).attr('id');
    $.ajax({
        url:'editDb.php?dbId='+id,
        success:function(data){
            $('#content-card').html(data);
        }
    })
})

function modifier(oldNom,id){
    $('#edit-db').click(function (){
        var nom=$('#db_name_edit').val();
        if (nom != oldNom && nom!= ''){
            $.ajax({
                type: 'POST',
                url: 'updateDb.php',
                data: {dbId:id,dbNom:nom},
                dataType: 'json'
            }).done(function(data){
                if (data==-1){
                    $('#db-error').html('la base de données avec le nom '+nom+' est deja exist !');
                }
                else if(data==0){
                    $('#db-error').html('erreur survenu a lhors de modification svp essayez dans qq secondes !');
                }
                else {
                    window.location='index.php?dbId='+data;
                }

            })
        }
        else if(nom == ''){
            $('#db-error').html('le champ Nom est obligatoire !');
        }
        else {
            $('#db-error').html('le champ Nom est le meme !');
        }
    })
}


$('.delete-db').click(function (){
    var id = $(this).attr('id');
    $.ajax({
        url:'deleteDb.php?dbId='+id,
        success:function(data){
            if (data==0){
                $('#db-error').html('erreur');
            }
            else {
                window.location='index.php';
            }            }
    })
})
