@push('scripts')
<script>
let filters = {}
let filter_used = false;
function loadTable () {
    const tBody = document.getElementsByTagName('table')[0].tBodies[0]
    // Clean table
    Array.from(tBody.children).map(e => e.remove())
    // Load data from api
    $.ajax({
        url: `${location.pathname}/?json`,
        type: 'get',
        data: filters,
        error: console.error,
        success: data => {
            tBody.innerHTML = data
            let render = $(tBody).find('.getRender');
            if(render.length > 0){
                let paginations = $(tBody).find('.getRender .pagination').html();
                $(tBody).find('.getRender').remove();
                $(".pagination").html(paginations);
            }
        }
    })
}

Array.from(document.getElementsByTagName('input')).forEach(e => {
    e.onchange = () => {
        if(e.value === filters[e.name] || e.hasAttribute('disable-filter')) return
        if (e.value){
            filters[e.name] = e.value
        }else{
            delete filters[e.name]
            filter_used = false;
        }
        loadTable()
    }
})

Array.from(document.getElementsByTagName('select')).forEach(e => {
    e.onchange = () => {
        if(e.value === filters[e.name]) return
        if (e.value) filters[e.name] = e.value
        else delete filters[e.name]
        filter_used = true
        setTimeout(loadTable,200);
    }
})
</script>
@endpush