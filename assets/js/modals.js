function deleteItem(type,titre,text,autreGet){
    swal({
        title: titre,
        text: text,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "index.php?page="+type+"_delete"+autreGet;
            }
        });
}


