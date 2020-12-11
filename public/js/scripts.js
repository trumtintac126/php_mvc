$("#work-table").on('click', '.del', (function(){
    if (!confirm("Do you want to delete?")){
        return false;
    }
}));
