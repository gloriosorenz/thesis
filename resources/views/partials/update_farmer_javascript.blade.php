<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
<script type='text/javascript'>
$(document).ready(function () {
    // --------------------------------------------------------------------------------------------------------------------------------------------------------

     // Add Product (Update)
     $('.addRow3').on('click',function(){
        addRow();
    });
    function addRow()
    {
        var addRow='<tr><td><select class="form-control" name="rice_farmers_id[]" id="rice_farmers_id"><option value="0" selected="true" disabled="True">Select Farmer</option>@foreach ($rice_farmers as $key=>$p)<option value="{{$key}}">{{$p}}</option>@endforeach</select></td>' +
                    '<td><select class="form-control" name="products_id[]" id="products_id"><option value="0" selected="true" disabled="True">-Select Product-</option>@foreach ($products as $key=>$p)<option value="{{$key}}">{{$p}}</option>@endforeach</select></td>' +
                    '<td><input type="text" class="form-control" name="orig_quantity[]" value="" /></td>' +
                    '<td><input type="text" class="form-control" name="curr_quantity[]" value="" /></td>' +
                    '<td><input type="text" class="form-control" name="price[]" value="" /></td>' +
                    '<td><input type="button" class="btn btn-danger remove" value="x"></td></tr>';
        $('.resultbody3').append(addRow);
    }

    $('.resultbody3').delegate('.remove', 'click', function () {
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