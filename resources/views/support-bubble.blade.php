<script>
    (function(d,t) {
        var BASE_URL="https://support.learnkit.dev";
        var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src=BASE_URL+"/packs/js/sdk.js";
        g.defer = true;
        g.async = true;
        s.parentNode.insertBefore(g,s);
        g.onload=function(){
            window.chatwootSDK.run({
                websiteToken: 'TJKtn4A7GuPHguMYWshSokjw',
                baseUrl: BASE_URL
            })
        }
    })(document,"script");
</script>
