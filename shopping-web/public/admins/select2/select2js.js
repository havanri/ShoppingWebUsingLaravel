$(function(){
    $("#SelectTags").select2({
        tags: true,
        tokenSeparators: [',']
    });
    $("#SelectCategory").select2({
        placeholder: "Select a state",
        allowClear: true
    });
    $("#InputRole").select2({
        tags: true,
        tokenSeparators: [',']
    });
});
