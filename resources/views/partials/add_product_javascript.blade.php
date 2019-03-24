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
        var addRow= '<div class="row mb-4"><div class="col-md-4">' +
                    '<select class="form-control" name="users_id[]" id="users_id">' +
                    '<option value="0" selected="true" disabled="True">Select Farmer</option>' +
                    '@foreach ($users as $key=>$p)<option value="{{$key}}">{{$p}}</option>@endforeach</select></div>' +
                    '<div class="col-md-4"><input type="button" class="btn btn-danger remove" value="x"></div></div>' +
                    '<table class="table table-bordered">' +
                    '<thead><tr><th>Product</th><th>Quantity</th><th>Price</th><th>Harvest Date</th></tr></thead>' +
                    '<tbody>@foreach ($products as $product)<tr>' +
                    '<td><input type="text" class="form-control" name="product_type" value="{{$product->type}}" disabled/><input name="products_id[]" type="hidden" value="{{$product->id}}"></td>' +
                    '<td><input type="text" class="form-control" name="orig_quantity[]" value=""/></td>' +
                    '<td><input type="text" class="form-control" name="price[]" value=""/></td>' +
                    '<td>{{ Form::date('harvest_date[]', \Carbon\Carbon::now(), ['class' => 'datepicker form-control','id'=>'harvest_date[]'])}}</td>' +
                    '</tr>@endforeach</tbody></table>';
        $('.card-body').append(addRow);
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