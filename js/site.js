//Open edit user page 
$('.openBtn').on('click',function(){
	var id = $(this).attr('id');
    $('.modal-body').load('getContent.php?id='+id,function(){
        $('#myModal').modal({show:true});
    });
});


