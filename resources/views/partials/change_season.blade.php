@extends('layouts.app')
<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>

<script type="text/javascript">
// Change Room JS
    $("#change_season").change(function(){
    var change = $("#change_season").val();
    if(change == "2"){
        $("#couple1").hide();
        $("#fam1").hide();
        $("#pfam1").hide();
        $("#quad1").fadeIn(2000);
        $("#couple2").hide();
        $("#fam2").hide();
        $("#pfam2").hide();
        $("#quad2").fadeIn(2000);
    }else if(change == "3"){
        $("#couple1").hide();
        $("#quad1").hide();
        $("#pfam1").hide();
        $("#fam1").fadeIn(2000);
        $("#couple2").hide();
        $("#quad2").hide();
        $("#pfam2").hide();
        $("#fam2").fadeIn(2000);
    }else if(change == "4"){
        $("#couple1").hide();
        $("#quad1").hide();
        $("#fam1").hide();
        $("#pfam1").fadeIn(2000);
        $("#couple2").hide();
        $("#quad2").hide();
        $("#fam2").hide();
        $("#pfam2").fadeIn(2000);
    }
    else{
        $("#pfam1").hide();
        $("#quad1").hide();
        $("#fam1").hide();
        $("#couple1").fadeIn(2000);
        $("#pfam2").hide();
        $("#quad2").hide();
        $("#fam2").hide();
        $("#couple2").fadeIn(2000);
    }
});

</script>