<script>
function logout(){
    $.post(
        '/login',
        {
            '_token': "<?php echo csrf_token(); ?>",
            'action': "logout"
        },
        function(data){
            window.location.replace('/login');
        },
        'json'
    );
}
function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}
function isNullOrEmpty(x){
    return x === null || x === '' || x === ' ';
}
</script>