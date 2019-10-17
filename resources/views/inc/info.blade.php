<div class="alert alert-info" style='cursor:pointer;'>
    {!! session('info') !!}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<script>
document.querySelector(".alert-info").addEventListener("click",e=>{e.target.parentElement.removeChild(e.target)});
</script>