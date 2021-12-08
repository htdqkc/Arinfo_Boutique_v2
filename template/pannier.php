<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="list-group" id="dPannier" >
  

               

                
                </ul>
            </div>
        </div>
    </div>
</div>
<script>
    function load(target, url) {
    var r = new XMLHttpRequest();
    r.open("GET", url, true);
    r.onreadystatechange = function () {
        if (r.readyState != 4 || r.status != 200) return;
        if(target == "none"){

        } else {
            target.innerHTML =  r.responseText;
        }
    };
    r.send();
}
   function LoadPannier(){
    load(document.getElementById('dPannier'), 'data.php?display=PannierJson');
   };
        
   function ChangeCountPannier(id){
    var count = document.getElementById('upd'+id).value;
    load('none', 'data.php?display=AddBasket&id=' + id + '&count=' + count);
    LoadPannier();
    UpdatePannierCount();
    }
   LoadPannier();
</script>