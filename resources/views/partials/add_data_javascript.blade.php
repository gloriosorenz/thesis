<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
<script type='text/javascript'>
$(document).ready(function () {
    // $('tbody').delegate('')
    // Add Farmer (Create)
    $('.addRow').on('click',function(){
        addRow();
    });
    function addRow()
    {
        var addRow='<tr><td><input type="text" class="form-control" name="crop[]" value=""/></td>' +
                    '<td><input type="text" class="form-control" name="crop_stage[]" value=""/></td>' +
                    '<td><input type="text" class="form-control" name="production[]" value=""/></td>' +
                    '<td><input type="text" class="form-control" name="animal[]" value=""/></td>' +
                    '<td><input type="text" class="form-control" name="animal_head[]" value=""/></td>' +
                    '<td><input type="text" class="form-control" name="fish[]" value=""/></td>' +
                    '<td><input type="text" class="form-control" name="area[]" value=""/></td>' +
                    '<td><input type="text" class="form-control" name="fish_pieces[]" value=""/></td>' +
                    '<td><input type="button" class="btn btn-danger remove" value="x"></td></tr>';
        $('tbody').append(addRow);
    }

    $('.resultbody').delegate('.remove', 'click', function () {
        var l=$('tbody tr').length;
        if(l==1)
        {
            alert('You can not remove last one');
        }else{
            $(this).parent().parent().remove();
        }
    });

});
</script>