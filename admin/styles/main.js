$(document).ready(function () {

    $("#articleID").change(function (e) {
        if (this.value != "new" && this.value != "default") 
        {
            $('input[name="nom"]').prop('readOnly', true);
            $("#nom").val($("#articleID :selected").text());
        }
        else
        {
            if (this.value == "new")
            {
                $('input[name="add"]').val("TRUE");
                $('input[name="nom"]').prop('readOnly', false);
            }
            $("#nom").val("");
        }
    });
    
});