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
        var addRow='<tr><td><select class="form-control" name="users_id[]" id="users_id"><option value="0" selected="true" disabled="True">Select Farmer</      option>@foreach ($users as $key=>$p)<option value="{{$key}}">{{$p}}</option>@endforeach</select></td>' +
                    '<td><input type="text" class="form-control" name="planned_hectares[]" value="" /></td>' +
                    '<td><input type="text" class="form-control" name="planned_num_farmers[]" value="" /></td>' +
                    '<td><input type="text" class="form-control" name="planned_qty[]" value="" /></td>' +
                    '<td><input type="button" class="btn btn-danger remove" value="x"></td></tr>';
        $('tbody').append(addRow);
    }

    $('.resultbody1').delegate('.remove', 'click', function () {
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